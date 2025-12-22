<?php
class StockMovement {
    private $conn;
    private $table = "stock_movements";

    public $id;
    public $product_id;
    public $movement_type;
    public $quantity;
    public $reference;
    public $notes;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

      public function read() {
        $query = "SELECT sm.*, p.name as product_name 
                  FROM " . $this->table . " sm
                  LEFT JOIN products p ON sm.product_id = p.id
                  ORDER BY sm.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>