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
      public function create() {
        $query = "INSERT INTO " . $this->table . "
                  SET product_id = :product_id,
                      movement_type = :movement_type,
                      quantity = :quantity,
                      reference = :reference,
                      notes = :notes,
                      created_at = NOW()";

        $stmt = $this->conn->prepare($query);

        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->movement_type = htmlspecialchars(strip_tags($this->movement_type));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->reference = htmlspecialchars(strip_tags($this->reference));
        $this->notes = htmlspecialchars(strip_tags($this->notes));

        $stmt->bindParam(':product_id', $this->product_id);
        $stmt->bindParam(':movement_type', $this->movement_type);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':reference', $this->reference);
        $stmt->bindParam(':notes', $this->notes);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

}
?>