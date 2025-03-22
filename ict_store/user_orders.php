<?php
// Start session
session_start();

// Include the database connection
$host = 'localhost'; // Database host
$user = 'root'; // Your MySQL username
$password = ''; // Your MySQL password (leave empty if using root)
$dbname = 'ict_store'; // Database name

// Create a new mysqli connection
$dbc = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

// Fetch the user's email from the session
$email = $_SESSION['email']; // Ensure this is set when the user logs in

// Fetch the user's orders based on their email
$orderSql = "SELECT order_id, product_id, quantity, delivery_address, order_date 
             FROM orders 
             WHERE email = ?";
$orderStmt = $dbc->prepare($orderSql);
$orderStmt->bind_param("s", $email);
$orderStmt->execute();
$orderResult = $orderStmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: 700;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .no-orders {
            text-align: center;
            color: #777;
            font-style: italic;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Orders</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Delivery Address</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orderResult->num_rows > 0): ?>
                    <?php while ($order = $orderResult->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo $order['product_id']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php echo $order['delivery_address']; ?></td>
                            <td><?php echo $order['order_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="no-orders">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php
    // Close database connection
    $orderStmt->close();
    $dbc->close();
    ?>
</body>
</html>
