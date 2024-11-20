<?php
include_once 'DB.php';

class Product {
    private $db;
    private $table = 'products';

    public function __construct() {
        $this->db = new DB();
    }

    // CREATE - Add a new product with an image
    public function create($product_name, $category, $quantity, $price, $supplier, $image) {
        // Prepare the SQL statement to insert product details including the image
        $stmt = $this->db->conn->prepare("INSERT INTO $this->table (product_name, category, quantity, price, supplier, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssidsb", $product_name, $category, $quantity, $price, $supplier, $image);
        $stmt->send_long_data(5, $image); // Use this for BLOB data (for the image)

        // Execute the statement and return whether the insert was successful
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // READ - Get all products including their images
    public function read() {
        // Query to fetch all products
        $result = $this->db->conn->query("SELECT * FROM $this->table");

        // Fetch all the products as an associative array
        $products = $result->fetch_all(MYSQLI_ASSOC);

        // Convert image data from binary to base64 for displaying in HTML
        foreach ($products as &$prod) {
            // If there is an image, encode it to base64 for HTML display
            if ($prod['image']) {
                $prod['image'] = base64_encode($prod['image']);
            } else {
                $prod['image'] = null; // No image available
            }
        }

        return $products;
    }

    // UPDATE - Update product details (excluding the image)
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
