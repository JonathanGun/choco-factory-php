<?php
// application/models/UserModel.class.php
class TransactionModel extends Model
{
    public function __construct()
    {
        parent::__construct("Transaction");
    }

    public function getTransactions($id)
    {
        return $this->customPageRows("UserID='$id'");
    }

    public function addTransaction($userid, $chocoid, $amount, $address)
    {
        $this->insert(array("UserID" => $userid, "ChocoID" => $chocoid, "Amount" => $amount, "Address" => $address));
    }

    private function custompageRows($where = '')
    {
        $sql = "select * from {$this->table} JOIN `Chocolate` USING (ChocoID) where $where";
        return $this->db->getAll($sql);
    }
}
