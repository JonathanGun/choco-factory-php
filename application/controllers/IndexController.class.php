<?php

class IndexController extends Controller
{
    public function index()
    {
        $this->authenticate();
        $this->filterMethod(array('GET'));

        require_once VIEW_PATH . "IndexView.class.php";
        $view = new IndexView();
        $view->title = "A-Chong-co | Dashboard";
        $view->content_file = HTML_PATH . 'dashboard.php';
        $view->chocolates = $this->chocolateModel->getMostSoldChocolates(10);
        echo $view->render('master.php');
    }
}
