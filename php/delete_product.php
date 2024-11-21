<?php
include_once 'Product.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = new Product();
    if ($product->delete($id)) {
        header("Location: read_products.php"); // Replace with the desired page
    } else {
        echo "Failed to delete product.";
    }
}
