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
    public function checkCredential()
    {
        if (isset($_COOKIE[LOGIN_COOKIE])) {
            $sha1 = $_COOKIE[LOGIN_COOKIE];
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
    public function loginUtil($id, $sha1)
    {
        session_destroy();
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $this->userModel->selectByPk($id)["Username"];
        setcookie(LOGIN_COOKIE, $sha1, time() + 60 * 60 * 24, '/'); // 1 day expire
    }

    public function logoutUtil()
    {
        $_SESSION["loggedin"] = false;
        $_SESSION["id"] = null;
        $_SESSION["username"] = null;
        unset($_COOKIE[LOGIN_COOKIE]);
    }
}
