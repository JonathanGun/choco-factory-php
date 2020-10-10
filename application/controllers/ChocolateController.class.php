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
            // TODO save uploaded image
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
