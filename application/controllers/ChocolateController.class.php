<?php

class ChocolateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        require VIEW_PATH . "ChocolateView.class.php";
        $this->model = $this->chocolateModel;
        $this->requestClient = new SoapClient("http://localhost:8080/request/?wsdl");
        $this->recipeClient = new SoapClient("http://localhost:8080/recipe/?wsdl");
    }

    public function search($search_query)
    {
        $this->authenticate();
        $this->filterMethod(array('GET'));

        $search_query = urldecode($search_query);
        echo (new ChocolateView(
            'search.php',
            'Search',
            array(
                "chocolates" => $this->model->getChocolates($search_query, 0, $this->model->numRows("Name LIKE '%$search_query%'")), // retrieve all, pagination on client side
                "queryString" => $search_query,
                "page" => 1,
            )
        ))->render();
    }

    public function add()
    {
        $this->authenticate();
        $this->filterMethod(array('POST', 'GET'));
        $this->authorize($superuser = true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            $id = $this->model->insert(array(
                "Name" => $name,
                "Price" => $price,
                "Description" => $description,
                "Stock" => 0,
            ));

            if ($id) {
                $this->saveImage($id);

                $data = array(
                    "chocoid" => $id,
                    "name" => $name,
                    "price" => $baseprice,
                    "ids" => $ingredientid,
                    "amounts" => $ingredientamount,
                );
                $newId = $this->recipeClient->addRecipe($data)->return;

                if ($newId >= 0) {
                    $this->restockUtil($id, $stock);

                    header("Location: /chocolate/view/$id");
                    die();
                }
            }
            echo "invalid add chocolate";
            header("Location: /chocolate/add/");
            die();
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo (new ChocolateView(
                'create.php',
                'Add New Chocolate',
                array()
            ))->render();
        }
    }

    private function saveImage($id)
    {
        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            file_put_contents("log.txt", "Upload failed with error code " . $_FILES['file']['error']);
            die();
        }

        $info = getimagesize($_FILES['image']['tmp_name']);
        if ($info === false) {
            file_put_contents("log.txt", "Unable to determine image type of uploaded file");
            die();
        }

        if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {
            file_put_contents("log.txt", "Not a gif/jpeg/png");
            die();
        }

        $info = pathinfo($_FILES['image']['name']);
        $target = UPLOAD_PATH . "choco$id.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    public function view($i)
    {
        $this->authenticate();
        $this->filterMethod(array('GET'));

        echo (new ChocolateView(
            'read.php',
            'Details',
            array(
                "chocolate" => $this->model->selectByPk($i),
            )
        ))->render();
    }

    public function buy($i)
    {
        $this->authenticate();
        $this->filterMethod(array('POST', 'GET'));
        $this->authorize($superuser = false);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            if ($this->model->reduceChocolateAmount($i, $amount) === false) {
                header("Location: /chocolate/buy/$i/");
                die();
            }
            $this->transactionModel->addTransaction($_SESSION['id'], $i, $amount, $address);

            require_once VIEW_PATH . "ChocolateView.class.php";
            echo (new ChocolateView(
                'updatesuccess.php',
                'Buy Success',
                array(
                    "chocolate" => $this->model->selectByPk($i),
                    "amount" => $amount,
                )
            ))->render();

        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            echo (new ChocolateView(
                'update.php',
                'Buy',
                array(
                    "chocolate" => $this->model->selectByPk($i),
                )
            ))->render();
        }
    }

    public function restock($i)
    {
        $this->authenticate();
        $this->filterMethod(array('POST', 'GET'));
        $this->authorize($superuser = true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            if ($amount) {
                $this->restockUtil($i, $amount);
            } else {
                echo "invalid add stock";
                header("Location: /chocolate/restock/$i/");
                die();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            echo (new ChocolateView(
                'update.php',
                'Stock',
                array(
                    'chocolate' => $this->model->selectByPk($i),
                )
            ))->render();
        }
    }

    private function restockUtil($id, $amount)
    {
        $data = array(
            'chocoid' => $id,
            'amount' => $amount,
        );
        $result = $this->requestClient->addRequest($data)->return;

        if ($result > 0) {
            file_put_contents("pending.txt", $result . "\n", FILE_APPEND);

            require_once VIEW_PATH . "ChocolateView.class.php";
            echo (new ChocolateView(
                'updatesuccess.php',
                'Add Stock',
                array(
                    'chocolate' => $this->model->selectByPk($id),
                    "amount" => $amount,
                )
            ))->render();
        }
    }

    public function stock($id)
    {
        $this->filterMethod(array('GET'));
        echo $this->model->selectByPk($id)["Stock"];
    }
}
