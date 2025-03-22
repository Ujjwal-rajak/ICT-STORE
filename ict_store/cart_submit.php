<?php
include('common.php');

$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $delivery_address = $_POST['address'];
    $phone = $_POST['phone'];

    $cartSql = "SELECT product_id, quantity FROM cart WHERE email = ?";
    $cartStmt = $dbc->prepare($cartSql);
    $cartStmt->bind_param("s", $email); 
    $cartStmt->execute();
    $cartResult = $cartStmt->get_result();

    if ($cartResult->num_rows > 0) {
        $orderStmt = $dbc->prepare("INSERT INTO orders (email, product_id, quantity, delivery_address, order_date) VALUES (?, ?, ?, ?, NOW())");

        while ($row = $cartResult->fetch_assoc()) {
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];

            $orderStmt->bind_param("siis", $email, $product_id, $quantity, $delivery_address);
            
            if (!$orderStmt->execute()) {
                echo "<script>alert('Error placing order for product ID: $product_id');</script>";
            }
        }

        $clearCartSql = "DELETE FROM cart WHERE email = ?";
        $clearCartStmt = $dbc->prepare($clearCartSql);
        $clearCartStmt->bind_param("s", $email);
        $clearCartStmt->execute();

        echo "<script>alert('Order placed successfully!'); window.location.href='thankyou.php';</script>";
    }

    $orderStmt->close();
    $cartStmt->close();
    $clearCartStmt->close();
}

$dbc->close();
?>
