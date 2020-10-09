<?php

class IndexController
{
    public function index()
    {
        require_once VIEW_PATH . "IndexView.class.php";
        $view = new IndexView();
        $view->title = "A-Chong-co | Dashboard";
        $view->content_file = HTML_PATH . 'dashboard.php';
        echo $view->render('master.inc');
    }
}
