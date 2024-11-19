<?php
include_once 'Product.php';

$product = new Product();
$products = $product->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom Styling for Background and Table -->
    <link rel="stylesheet" href="../styles/read.css">
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create_product.php">Create New Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="read_products.php">View All Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container table-container">
        <h2 class="text-center mb-4">All Products</h2>

        <!-- Products Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="color: black;">Product Name</th>
                    <th style="color: black;">Category</th>
                    <th style="color: black;">Quantity</th>
                    <th style="color: black;">Price</th>
                    <th style="color: black;">Supplier</th>
                    <th style="color: black;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $prod) {
                    echo "<tr>
                            <td>{$prod['product_name']}</td>
                            <td>{$prod['category']}</td>
                            <td>{$prod['quantity']}</td>
                            <td>{$prod['price']}</td>
                            <td>{$prod['supplier']}</td>
                            <td>
                              <a href='update_product.php?id={$prod['id']}' class='btn btn-outline-primary btn-sm'>
    <i class='bi bi-pencil'></i> Update
</a>
<a href='delete_product.php?id={$prod['id']}' class='btn btn-outline-dark btn-sm'>
    <i class='bi bi-trash'></i> Delete
</a>

                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>