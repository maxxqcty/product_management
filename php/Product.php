<?php
include_once 'DB.php';

class Product {
    private $db;
    private $table = 'products';

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE - Add a new product
    public function create($product_name, $category, $quantity, $price, $supplier) {
        $stmt = $this->db->conn->prepare("INSERT INTO $this->table (product_name, category, quantity, price, supplier) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssids", $product_name, $category, $quantity, $price, $supplier);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // READ - Get all products
    public function read() {
        $result = $this->db->conn->query("SELECT * FROM $this->table");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // UPDATE - Update a product by id
    public function update($id, $product_name, $category, $quantity, $price, $supplier) {
        $stmt = $this->db->conn->prepare("UPDATE $this->table SET product_name=?, category=?, quantity=?, price=?, supplier=? WHERE id=?");
        $stmt->bind_param("ssidsi", $product_name, $category, $quantity, $price, $supplier, $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // DELETE - Delete a product by id
    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM $this->table WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}
?>
