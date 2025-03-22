<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Details - ICT STORE MANAGEMENT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        header {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Delivery Details</h1>
    </header>
    <div class="container">
        <form action="buynow.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Delivery Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>

            <!-- Hidden input to send product_id -->
            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_GET['product_id']); ?>">

            <input type="submit" value="Confirm Delivery">
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
</body>
</html>
