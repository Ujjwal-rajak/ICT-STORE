<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ICT STORE MANAGEMENT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        nav {
            margin: 20px 0;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transform: translateY(10px);
            transition: transform 0.3s ease-in-out;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form input {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f9f9f9;
            transition: box-shadow 0.3s ease-in-out, background 0.3s ease-in-out;
            outline: none;
        }
        form input:focus {
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
            border-color: #28a745;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        input[type="submit"]:active {
            background-color: #1e7e34;
            transform: translateY(1px);
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Login</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
            <a href="cart.php">Cart</a>
            <a href="userid.php">User ID</a>
        </nav>
    </header>
    <div class="container">
        <h2>Please Log In</h2>
        <?php if (!empty($user_err)): ?>
            <div class="error">
                <p><?php echo $user_err; ?></p>
            </div>
        <?php endif; ?>
        <form action="login_backend.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Log In">
    <a href="./index.php">Home</a>
    <a href="./user_registration.php">new user</a>
</form>

    </div>
    <footer class="footer">
        <p>&copy; 2024 Computer Store. All rights reserved.</p>
    </footer>
</body>
</html>
