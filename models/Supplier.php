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
}