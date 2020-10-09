<?php

class UserController extends Controller
{
    public function history()
    {
        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | History";
        $view->content_file = USER_PATH . 'history.php';
        echo $view->render('master.inc');
    }

    public function login()
    {
        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | Login";
        $view->content_file = USER_PATH . 'login.php';
        echo $view->render('master.inc');
    }

    public function register()
    {
        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | Register";
        $view->content_file = USER_PATH . 'register.php';
        echo $view->render('master.inc');
    }
}
