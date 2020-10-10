<?php
// application/models/UserModel.class.php
class TransactionModel extends Model
{
    public function __construct()
    {
        parent::__construct("Transaction");
    }

    public function getTransactions($id, $n = 10)
    {
        $sql = "SELECT ChocoID,Name,Amount,Date,Price,Address FROM `Transaction` JOIN `Chocolate` USING (ChocoID) WHERE `UserID`='$id' ORDER BY Date DESC";
        if ($n >= 0) {
            $sql = $sql . " LIMIT $n";
        }
        $transactions = $this->db->getAll($sql);
        return $transactions;
    }
}
