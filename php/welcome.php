<?php
// Include the necessary files for database connection and CRUD operations
include_once 'Product.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for Pink Palette and Vibrant Background -->
    <link rel="stylesheet" href="../styles/welcome.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
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

    <!-- Main Content -->
    <div class="container text-center">
        <h1>Welcome to the Product Management System</h1>
        <p class="lead">Manage your products easily with the options below.</p>


        <ul class="list-group">
            <li class="list-group-item">
                <a href="create_product.php" class="btn btn-primary w-100">Create New Product</a>
            </li>
            <li class="list-group-item">
                <a href="read_products.php" class="btn btn-info w-100">View All Products</a>
            </li>
        </ul>
    </div>

    <!-- Bootstrap JS (optional, for any interactivity such as dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>