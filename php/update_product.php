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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Styling -->
    <style>
        body {
            background-color: #ff4081;
        }

        .navbar {
            background-color: #e91e63;
        }

        .navbar a {
            color: white;
        }

        .navbar a:hover {
            color: #ffc107;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container .form-label {
            font-weight: bold;
        }

        .input-group-text {
            background-color: #e91e63;
            color: white;
        }

        .btn-primary {
            background-color: #e91e63;
            border-color: #e91e63;
        }

        .btn-primary:hover {
            background-color: #c2185b;
            border-color: #c2185b;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_product.php">Create New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="read_products.php">View All Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form-container">
        <h2 class="text-center">Update Product</h2>

        <!-- Product Update Form -->
        <form method="POST">
            <input type="hidden" name="id" value="<?= $prod['id'] ?>">

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $prod['product_name'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                    <input type="text" class="form-control" id="category" name="category" value="<?= $prod['category'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $prod['quantity'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                    <input type="text" class="form-control" id="price" name="price" value="<?= $prod['price'] ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="supplier" class="form-label">Supplier</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="supplier" name="supplier" value="<?= $prod['supplier'] ?>" required>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>