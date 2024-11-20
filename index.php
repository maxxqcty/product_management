<?php
// Include the DB class
include './php/DB.php';

// Create a DB instance
$db = new DB();
$conn = $db->conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare and execute SQL query
        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Fetch the hashed password
            $stmt->bind_result($password_hash);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $password_hash)) {
                echo "Logged in successfully!";
                // Set session or redirect
                session_start();
                $_SESSION['username'] = $username;
                header("Location: ./php/welcome.php");
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User does not exist.";
        }
        $stmt->close();
    }
}

// Close the database connection (optional)
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>

    <div class="container">
        <div class="login-container">
            <!-- Left Side: Login Form -->
            <div class="left-side">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <!-- Login Form -->
                        <form method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-custom" name="login">Login</button>
                        </form>
                        <div class="link">
                            <p>Don't have an account? <a href="./php/register.php">Register here</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Welcome Message -->
            <div class="right-side">
                <div class="welcome-message">
                    <h1>Welcome to Our Shop!<h1>
                        
                    <p>Your one-stop destination for the best products, unbeatable prices, and an unforgettable shopping experience!</p>
                    <p>Enjoy exploring and managing the products!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Your Company. All Rights Reserved.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>