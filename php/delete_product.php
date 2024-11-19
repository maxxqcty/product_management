<?php
include_once 'Product.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = new Product();
    if ($product->delete($id)) {
        echo "Product deleted successfully!";
    } else {
        echo "Failed to delete product.";
    }
}
?>
