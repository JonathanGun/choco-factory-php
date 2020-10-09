<?php

class ChocolateController extends Controller
{
    public function search()
    {
        require_once VIEW_PATH . "ChocolateView.class.php";
        $view = new ChocolateView();
        $view->title = "A-Chong-co | Search";
        $view->content_file = CHOCOLATE_PATH . 'search.php';
        echo $view->render('master.inc');
    }

    public function add()
    {
        require_once VIEW_PATH . "ChocolateView.class.php";
        $view = new ChocolateView();
        $view->title = "A-Chong-co | Add New Chocolate";
        $view->content_file = CHOCOLATE_PATH . 'add.php';
        echo $view->render('master.inc');
    }

    public function view($i)
    {
        require_once VIEW_PATH . "ChocolateView.class.php";
        $view = new ChocolateView();
        $view->title = "A-Chong-co | View";
        if (empty($i)) {
            $view->content_file = CHOCOLATE_PATH . 'viewall.php';
        } else {
            $view->choco_id = $i;
            $view->content_file = CHOCOLATE_PATH . 'view.php';
        }
        echo $view->render('master.inc');
    }
}
