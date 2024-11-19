<?php
include_once 'Product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    $product = new Product();
    if ($product->update($id, $product_name, $category, $quantity, $price, $supplier)) {
        echo "Product updated successfully!";
    } else {
        echo "Failed to update product.";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = new Product();
    $prod = $product->read();
    $prod = array_filter($prod, fn($p) => $p['id'] == $id);
    $prod = reset($prod);
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $prod['id'] ?>"><br>
    Product Name: <input type="text" name="product_name" value="<?= $prod['product_name'] ?>"><br>
    Category: <input type="text" name="category" value="<?= $prod['category'] ?>"><br>
    Quantity: <input type="number" name="quantity" value="<?= $prod['quantity'] ?>"><br>
    Price: <input type="text" name="price" value="<?= $prod['price'] ?>"><br>
    Supplier: <input type="text" name="supplier" value="<?= $prod['supplier'] ?>"><br>
    <input type="submit" value="Update Product">
</form>
