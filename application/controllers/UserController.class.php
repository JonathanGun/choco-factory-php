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
        $this->authenticate();
        $this->filterMethod(array('GET'));

        require_once VIEW_PATH . "UserView.class.php";
        $view = new UserView();
        $view->title = "A-Chong-co | History";
        $view->transactions = $this->transactionModel->getTransactions($_SESSION['id'], 10);
        $view->content_file = USER_PATH . 'history.php';
        echo $view->render('master.php');
    }

    public function logout()
    {
        $this->logoutUtil();
        header('Location: /user/login/');
        die();
    }

    public function login($errorMsg = '')
    {
        if ($this->authenticateUtil()) {
            header('Location: /');
            die();
        }

        $this->filterMethod(array('POST', 'GET'));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            if ($username && $password) {
                $sha1 = sha1($username . $password . SALT);
                $id = $this->model->validate($sha1);
                if ($id) {
                    $this->loginUtil($id, $sha1);
                    header('Location: /');
                    die();
                } else {
                    echo "invalid login!";
                    header('Location: /user/login/');
                    die();
                }
            } else {
                echo "login info cant be empty";
                header('Location: /user/login/');
                die();
            }
        } else {
            require_once VIEW_PATH . "UserView.class.php";
            $view = new UserView();
            $view->title = "A-Chong-co | Login";
            $view->content_file = USER_PATH . 'login.php';
            echo $view->render('master.php');
        }
    }

    public function register()
    {
        if ($this->authenticateUtil()) {
            header('Location: /');
            die();
        }

        $this->filterMethod(array('POST', 'GET'));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            $unique = !$this->model->exists($username, $email);
            if ($unique && $username && $password && $email) {
                $sha1 = sha1($username . $password . SALT);
                $id = $this->model->insert(array("Username" => $username, "Password" => $password, "Email" => $email));
                $this->loginUtil($id, $sha1);
                header('Location: /');
                die();
            } else {
                echo "invalid register!";
                header('Location: /user/register/');
                die();
            }
        } else {
            require_once VIEW_PATH . "UserView.class.php";
            $view = new UserView();
            $view->title = "A-Chong-co | Register";
            $view->content_file = USER_PATH . 'register.php';
            echo $view->render('master.php');
        }
    }
}
