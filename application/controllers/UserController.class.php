<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        require VIEW_PATH . "UserView.class.php";
        $this->model = $this->userModel;
    }

    public function history()
    {
        $this->authenticate();
        $this->filterMethod(array('GET'));

        echo (new UserView(
            'history.php',
            'History',
            array(
                'transactions' => $this->transactionModel->getTransactions($_SESSION['id'], TRANSACTIONS_PER_PAGE),
            )
        ))->render();
    }

    public function logout()
    {
        $this->logoutUtil();
        header('Location: /user/login/');
        die();
    }

    public function login()
    {
        // if already loggedin
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
            echo (new UserView(
                'login.php',
                'Login',
                array()
            ))->render();
        }
    }

    public function register()
    {
        // if already logged in
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
                $id = $this->model->insert(array(
                    "Username" => $username,
                    "Password" => $password,
                    "Email" => $email,
                ));
                $this->loginUtil($id, $sha1);
                header('Location: /');
                die();
            } else {
                // invalid register
                header('Location: /user/register/');
                die();
            }
        } else {
            echo (new UserView(
                'register.php',
                'Register',
                array()
            ))->render();
        }
    }
}
