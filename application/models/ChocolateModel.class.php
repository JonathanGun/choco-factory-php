<?php
class ChocolateModel extends Model
{
    public function __construct()
    {
        parent::__construct("Chocolate");
    }

    public function getChocolates($substr = '', $offset = 0, $limit = CHOCOLATES_PER_PAGE)
    {
        return $this->pageRows($offset, $limit, $substr ? "Name LIKE '%$substr%'" : '', 'Sold');
    }

    public function getMostSoldChocolates($n = DASHBOARD_ITEMS)
    {
        $sql = "select * from $this->table ORDER BY Sold DESC LIMIT $n";
        return $this->db->getAll($sql);
    }

    public function addChocolateAmount($id, $n)
    {
        $choco = $this->selectByPk($id);
        $this->updateChocolateAmount($id, $choco["Stock"] + $n, $choco["Sold"]);
    }

    public function reduceChocolateAmount($id, $n)
    {
        $choco = $this->selectByPk($id);
        if ($choco["Stock"] < $n) {
            return false;
        } else {
            $this->updateChocolateAmount($id, $choco["Stock"] - $n, $choco["Sold"] + $n);
            return true;
        }
    }
    public function updateChocolateAmount($id, $stock, $sold)
    {
        $this->update(array("ChocoID" => $id, "Stock" => $stock, "Sold" => $sold));
    }
}
