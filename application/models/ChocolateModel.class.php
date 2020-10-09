<?php
class ChocolateModel extends Model
{
    public function __construct()
    {
        parent::__construct("Chocolate");
    }

    public function getChocolates($substr = '')
    {
        $sql = "select * from $this->table";
        if ($substr) {
            $sql = $sql . " WHERE Name LIKE '%$substr%' OR ChocoID='$substr'";
        }
        $choco = $this->db->getAll($sql);
        return $choco;
    }

    public function getChocolateNames($substr = '')
    {
        $sql = "select ChocoID, Name from $this->table";
        if ($substr) {
            $sql = $sql . " WHERE Name LIKE '%$substr%' OR ChocoID='$substr'";
        }
        $chocoName = $this->db->getAll($sql);
        return $chocoName;
    }

    public function getMostSoldChocolates($n = 10)
    {
        $sql = "select * from $this->table ORDER BY Sold DESC LIMIT $n";
        $choco = $this->db->getAll($sql);
        return $choco;
    }
}
