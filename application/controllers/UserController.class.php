<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = $this->userModel;
    }

    public function history()
    {
        if ($this->checkCredential()) {
            require_once VIEW_PATH . "UserView.class.php";
            $view = new UserView();
            $view->title = "A-Chong-co | History";
            $view->content_file = USER_PATH . 'history.php';
            echo $view->render('master.inc');
        } else {
            header('Location: /user/login/');
            die();
        }
    }

    public function login()
    {
        $this->logoutUtil();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            if ($username && $password) {
                $sha1 = sha1($username . $password . SALT);
                $id = $this->model->validate($sha1);
                if ($id) {
                    $this->loginUtil($id, $sha1);
                }
            }
        }
        // GET or invalid POST (redirect to login)
        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | Login";
        $view->content_file = USER_PATH . 'login.php';
        echo $view->render('master.inc');
    }

    public function register()
    {
        $this->logoutUtil();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            $unique = !$this->model->exists($username, $password, $email);
            if ($unique && $username && $password && $email) {
                $sha1 = sha1($username . $password . SALT);
                $id = $this->model->insert(array("Username" => $username, "Password" => $password, "Email" => $email));
                $this->loginUtil($id, $sha1);
            }
        }
        // GET or invalid POST (redirect to register)
        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | Register";
        $view->content_file = USER_PATH . 'register.php';
        echo $view->render('master.inc');
    }

    public function loginUtil($id, $sha1)
    {
        parent::loginUtil($id, $sha1);
        header('Location: /');
        die();
    }
}
