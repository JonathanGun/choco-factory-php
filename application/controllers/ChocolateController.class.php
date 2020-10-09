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
        $substr = $_POST["choco_search"] ?? '';
        if ($this->checkCredential()) {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Search";
            $view->content_file = CHOCOLATE_PATH . 'search.php';
            $view->chocolates = $this->model->getChocolates($substr);
            // TODO: pagination

            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }

    public function add()
    {
        if ($this->checkCredential()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                extract($_POST);
                $id = $this->model->insert(array("Name" => $name, "Price" => $price, "Description" => $description, "Stock" => $stock));
                echo $id;
                if ($id) {
                    header("Location: /chocolate/view/$id");
                    die();
                }
            }
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Add New Chocolate";
            $view->content_file = CHOCOLATE_PATH . 'add.php';
            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }

    public function view($i)
    {
        if ($this->checkCredential()) {
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Details";
            $view->chocolate = $this->model->selectByPk($i);
            $view->choco_id = $i;
            $view->content_file = CHOCOLATE_PATH . 'view.php';
            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }

    public function buy($i)
    {
        if ($this->checkCredential()) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                extract($_POST);
                echo $amount;
                // TODO reduce chocolate on buy
                // Add to transaction
                header("Location: /chocolate/buysuccess/$id");
                die();
            }
            require_once VIEW_PATH . "ChocolateView.class.php";
            $view = new ChocolateView();
            $view->title = "A-Chong-co | Buy";
            $view->chocolate = $this->model->selectByPk($i);
            $view->choco_id = $i;
            $view->content_file = CHOCOLATE_PATH . 'buy.php';
            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }
}
