<?php
// Create Database and Table (run_once.php)

$conn = new mysqli("localhost", "root", "", "");

$sql = "CREATE DATABASE IF NOT EXISTS product_management";
$conn->query($sql);

$conn->select_db("product_management");

$sql = "
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    quantity INT,
    price DECIMAL(10, 2),
    supplier VARCHAR(255)
)";
$conn->query($sql);

echo "Database and Table created successfully!";
?>
