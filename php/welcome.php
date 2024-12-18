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
    <style>
        body {
            background-image: url(../assets/gold.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            color: #333;
            font-family: 'Arial', sans-serif;
        }
h1{

    color: #ff80ab;
}
        .navbar {
            background-color: #f50057;
            /* Bold Pink for navbar */
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd54f !important;
            /* Hover effect with a contrasting color */
        }

        .btn-primary {
            background-color: #ff4081;
            /* Pink buttons */
            border-color: #ff4081;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff80ab;
            /* Light pink on hover */
            border-color: #ff80ab;
            transform: translateY(-3px);
        }

        .btn-info {
            background-color: #4caf50;
            /* Green color for secondary actions */
            border-color: #4caf50;
            transition: all 0.3s ease;
        }

        .btn-info:hover {
            background-color: #66bb6a;
            /* Light green on hover */
            border-color: #66bb6a;
            transform: translateY(-3px);
        }

        .logout {
            color: red;
            font-weight: bolder;
            background-color: #ff80ab;
            /* Pink color */
            border-color: #ff4081;
            transition: all 0.3s ease;
        }

        .logout:hover {
            background-color: #ff80ab;
            /* Lighter pink on hover */
            border-color: #ff80ab;
            transform: translateY(-3px);
        }

        .list-group-item {
            background-color: #ff80ab;
            /* Light pink background for list items */
            color: #fff;
            border-radius: 8px;
            padding: 15px;
            font-size: 18px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .list-group-item:hover {
            background-color: #ff4081;
            /* Darker pink on hover */
            cursor: pointer;
        }

        .container {
            margin-top: 80px;
            text-align: center;
        }

        .container h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .container p {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 40px;
        }

        .navbar-toggler-icon {
            background-color: #ffd54f;
        }

        .btn,
        .nav-link {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Home</a>
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
    <div class="container">
        <h1>Welcome to Our Shop!</h1>
        <p class="lead">Your one-stop destination for the best products, unbeatable prices, and an unforgettable shopping experience!</p>

        <ul class="list-group">
            <li class="list-group-item">
                <a href="create_product.php" class="btn btn-primary w-100">Create New Product</a>
            </li>
            <li class="list-group-item">
                <a href="read_products.php" class="btn btn-info w-100">View All Products</a>
            </li>
            <li class="list-group-item">
                <a href="../index.php" class="logout btn-info w-50">Log out</a>
            </li>
        </ul>
    </div>

    <!-- Bootstrap JS (optional, for any interactivity such as dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>