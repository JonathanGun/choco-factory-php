<?php
class ChocolateModel extends Model
{
    public function getChocolate()
    {
        $sql = "select * from $this->table";
        $users = $this->db->getAll($sql);
        return $users;
    }
}
