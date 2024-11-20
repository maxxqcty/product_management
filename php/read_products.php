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
    <style>
        .table-container {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .table td {
            text-align: center;
        }

        .navbar-nav .nav-link.active {
            font-weight: bold;
        }

        .btn {
            padding: 0.4rem 1rem;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Product Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="welcome.php">Home</a>
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
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Product Picture</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Supplier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $prod) {
                    echo "<tr>";
                    // Display the image if available
                    echo "<td>";
                    if ($prod['image']) {
                        echo "<img src='data:image/jpeg;base64,{$prod['image']}' alt='Product Image'>";
                    } else {
                        echo "No Image";
                    }
                    echo "</td>";

                    // Product details
                    echo "<td>{$prod['product_name']}</td>";
                    echo "<td>{$prod['category']}</td>";
                    echo "<td>{$prod['quantity']}</td>";
                    echo "<td>{$prod['price']}</td>";
                    echo "<td>{$prod['supplier']}</td>";

                    // Action buttons
                    echo "<td>
                        <a href='update_product.php?id={$prod['id']}' class='btn btn-outline-primary btn-sm'>
                            <i class='bi bi-pencil'></i> Update
                        </a>
                        <a href='delete_product.php?id={$prod['id']}' class='btn btn-outline-danger btn-sm'>
                            <i class='bi bi-trash'></i> Delete
                        </a>
                    </td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>