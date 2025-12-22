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
}
?>