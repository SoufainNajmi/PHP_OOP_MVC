<?php
class Supplier {
    private $conn;
    private $table = "suppliers";

    public $id;
    public $name;
    public $contact;
    public $email;
    public $phone;
    public $address;
    public $created_at;

    public function __construct($db) {
        $this->conn = $db;
    }

     public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

     public function create() {
        $query = "INSERT INTO " . $this->table . "
                  SET name = :name,
                      contact = :contact,
                      email = :email,
                      phone = :phone,
                      address = :address,
                      created_at = NOW()";

        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->contact = htmlspecialchars(strip_tags($this->contact));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':contact', $this->contact);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}