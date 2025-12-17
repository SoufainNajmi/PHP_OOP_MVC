<?php
class produit{

    private $conn;
    private $table = "products";

    public $id;
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $category_id;
    public $supplier_id;
    public $min_stock;
    public $max_stock;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }
}
?>