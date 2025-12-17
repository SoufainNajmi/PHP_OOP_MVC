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
    
     public function read() {
        $query = "SELECT p.*, c.name as category_name, s.name as supplier_name 
                  FROM " . $this->table . " p
                  LEFT JOIN categories c ON p.category_id = c.id
                  LEFT JOIN suppliers s ON p.supplier_id = s.id
                  ORDER BY p.created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->name = $row['name'];
            $this->description = $row['description'];
            $this->price = $row['price'];
            $this->quantity = $row['quantity'];
            $this->category_id = $row['category_id'];
            $this->supplier_id = $row['supplier_id'];
            $this->min_stock = $row['min_stock'];
            $this->max_stock = $row['max_stock'];
            return true;
        }
        return false;
    }
}
?>