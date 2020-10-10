<?php
class Controller
{
    public function __construct()
    {
        require_once MODEL_PATH . DS . "UserModel.class.php";
        require_once MODEL_PATH . DS . "ChocolateModel.class.php";
        require_once MODEL_PATH . DS . "TransactionModel.class.php";
        $this->userModel = new UserModel();
        $this->chocolateModel = new ChocolateModel();
        $this->transactionModel = new TransactionModel();
    }

    public function authenticate()
    {
        if (!$this->authenticateUtil()) {
            header('Location: /user/login/');
            die();
        }
    }

    public function authenticateUtil()
    {
        if (isset($_COOKIE['loginfo'])) {
            $sha1 = $_COOKIE['loginfo'];
            $id = $this->userModel->validate($sha1);
            if ($id) {
                $this->loginUtil($id, $sha1);
                return true;
            } else {
                $this->logoutUtil();
            }
        }
        return false;
    }

    public function filterMethod($allowedMethods)
    {
        if (!in_array($_SERVER['REQUEST_METHOD'], $allowedMethods)) {
            include ERROR_PATH . '405.php';
            die();
        }
    }

    public function loginUtil($id, $sha1)
    {
        if (session_id() != '') {
            session_destroy();
        }
        session_start();
        $user = $this->userModel->selectByPk($id);
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["issuperuser"] = $user["IsSuperuser"];
        $_SESSION["username"] = $user["Username"];
        setcookie('loginfo', $sha1, time() + 60 * 60 * 24, '/'); // 1 day expire
    }

    public function logoutUtil()
    {
        $_SESSION["loggedin"] = false;
        $_SESSION["id"] = null;
        $_SESSION["issuperuser"] = false;
        $_SESSION["username"] = null;
        unset($_COOKIE['loginfo']);
        setcookie('loginfo', null, -1, '/');
        if (session_id() != '') {
            session_destroy();
        }
    }
}
