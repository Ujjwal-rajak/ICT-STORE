<?php
include('common.php');

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $delivery_address = $_POST['address'];
    $product_id = $_POST['product_id'];
    $quantity = 1;
    $orderStmt = $dbc->prepare("INSERT INTO orders (email, product_id, quantity, delivery_address, order_date) VALUES (?, ?, ?, ?, NOW())");
    $orderStmt->bind_param("siis", $email, $product_id, $quantity, $delivery_address);
    if (!$orderStmt->execute()) {
        echo "<script>alert('Error placing order for product ID: $product_id');</script>";
    }
    echo "<script>alert('Order placed successfully!'); window.location.href='thankyou.php';</script>";
}

$orderStmt->close();

$dbc->close();
?>