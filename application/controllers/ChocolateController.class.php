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
            $view->title = "A-Chong-co | View";
            if (empty($i)) {
                $view->chocolates = $this->model->getChocolateNames();
                $view->content_file = CHOCOLATE_PATH . 'viewall.php';
            } else {
                $view->chocolate = $this->model->selectByPk($i);
                $view->choco_id = $i;
                $view->content_file = CHOCOLATE_PATH . 'view.php';
            }
            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }
}
