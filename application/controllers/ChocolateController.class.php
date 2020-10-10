<?php

class ChocolateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->chocolateModel;
    }

    public function search()
    {
        $this->authenticate();
        $this->filterMethod(array('POST', 'GET'));

        $substr = $_POST["choco_search"] ?? '';
        if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Search";
            $view->content_file = CHOCOLATE_PATH . 'search.php';
            $view->chocolates = $this->model->getChocolates($substr);
            // TODO: pagination
            echo $view->render('master.php');
        }
    }

    public function add()
    {
        $this->authenticate();
        $this->filterMethod(array('POST', 'GET'));
        $this->authorize($superuser = true);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            $id = $this->model->insert(array("Name" => $name, "Price" => $price, "Description" => $description, "Stock" => $stock));
            $this->saveImage($id);
            if ($id) {
                header("Location: /chocolate/view/$id");
                die();
            } else {
                echo "invalid add chocolate";
                header("Location: /chocolate/add/");
                die();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Add New Chocolate";
            $view->content_file = CHOCOLATE_PATH . 'create.php';
            echo $view->render('master.php');
        }
    }

    private function saveImage($id)
    {
        print_r($_FILES);
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

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Details";
            $view->chocolate = $this->model->selectByPk($i);
            $view->content_file = CHOCOLATE_PATH . 'read.php';
            echo $view->render('master.php');
        }
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
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Buy Success";
            $view->chocolate = $this->model->selectByPk($i);
            $view->amount = $amount;
            $view->content_file = CHOCOLATE_PATH . 'updatesuccess.php';
            echo $view->render('master.php');

        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Buy";
            $view->chocolate = $this->model->selectByPk($i);
            $view->content_file = CHOCOLATE_PATH . 'update.php';
            echo $view->render('master.php');
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
                $this->model->addChocolateAmount($i, $amount);

                require_once VIEW_PATH . "ChocolateView.class.php";
                $view = new ChocolateView();
                $view->title = "A-Chong-co | Add Stock";
                $view->chocolate = $this->model->selectByPk($i);
                $view->content_file = CHOCOLATE_PATH . 'updatesuccess.php';
                echo $view->render('master.php');
            } else {
                echo "invalid add stock";
                header("Location: /chocolate/restock/$i/");
                die();
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Add Stock";
            $view->chocolate = $this->model->selectByPk($i);
            $view->content_file = CHOCOLATE_PATH . 'update.php';
            echo $view->render('master.php');
        }
    }
}
