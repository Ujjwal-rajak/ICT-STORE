
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as User - ICT STORE MANAGEMENT</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; color: #333; }
        header { background-color: #333; color: #fff; padding: 10px 20px; text-align: center; }
        nav { margin: 20px 0; text-align: center; }
        nav a { margin: 0 15px; text-decoration: none; color: #333; font-weight: bold; }
        .container { width: 80%; margin: 0 auto; }
        .footer { background-color: #333; color: #fff; text-align: center; padding: 10px 0; position: fixed; width: 100%; bottom: 0; }
        form { margin: 20px 0; }
        form input { display: block; width: 100%; margin: 10px 0; padding: 10px; font-size: 16px; }
    </style>
</head>
<body>
    <header>
        <h1>Register as a User</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
            <a href="cart.php">Cart</a>
            <a href="userid.php">User ID</a>
            <a href="register-user.php">Register as User</a>
            <a href="register-admin.php">Register as Admin</a>
        </nav>
    </header>
    <div class="container">
        <h2>User Registration</h2>
        <form action="user_register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Register">
            <a href="./index.php">Home</a>
            <a href="./login.php">login</a>
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Computer Store. All rights reserved.</p>
    </footer>
</body>
</html>
