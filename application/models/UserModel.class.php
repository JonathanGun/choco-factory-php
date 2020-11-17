<?php
// application/models/UserModel.class.php
class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct("User");
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM $this->table";
        $users = $this->db->getAll($sql);
        return $users;
    }

    public function isSuperUser($name, $pass)
    {
        $sql = "SELECT IsSuperuser FROM $this->table WHERE '$name'=`Username` AND '$pass'=`Password`";
        return $this->db->getOne($sql);
    }

    // return UserID if valid else return false
    public function validate($sha1)
    {
        $sql = "SELECT UserID FROM $this->table WHERE '$sha1'=`SHA1`";
        return $this->db->getOne($sql);
    }

    public function exists($username)
    {
        $sql = "SELECT COUNT(UserID) FROM $this->table WHERE '$username'=`Username`";
        return ($this->db->getOne($sql)) > 0;
    }
}
