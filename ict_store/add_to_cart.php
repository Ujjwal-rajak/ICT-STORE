<?php
include 'common.php'; // Include your database connection

if (!$dbc) {
    die("Cannot connect: " . mysqli_connect_error());
}

// Get values from the query string
$product_name = $_GET['product_name'];
$product_id = $_GET['product_id'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];
$email = $_GET['email']; // Ensure this is validated and sanitized

// Check if the product already exists in the cart for the user
$checkSql = "SELECT quantity FROM cart WHERE product_id = ? AND email = ?";
$checkStmt = $dbc->prepare($checkSql);
$checkStmt->bind_param("is", $product_id, $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    // Product exists, fetch current quantity
    $checkStmt->bind_result($current_quantity);
    $checkStmt->fetch();
    
    // Calculate new quantity
    $new_quantity = $current_quantity + 1; // Increment quantity by 1

    // Update the quantity in the cart
    $updateSql = "UPDATE cart SET quantity = ? WHERE product_id = ?";
    $updateStmt = $dbc->prepare($updateSql);
    $updateStmt->bind_param("ii", $new_quantity, $product_id); // "ii" for integer types

    if ($updateStmt->execute()) {
        echo "Product quantity updated successfully.";
    } else {
        echo "Error updating quantity: " . $updateStmt->error;
    }

    
    $updateStmt->close();
} else {
    // Product doesn't exist, insert new record
    $insertSql = "INSERT INTO cart (product_id, product_name, quantity, price, email) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $dbc->prepare($insertSql);
    $insertStmt->bind_param("isids", $product_id, $product_name, $quantity, $price, $email);
    
    if ($insertStmt->execute()) {
        echo "Product added to cart successfully.";
    } else {
        echo "Error: " . $insertStmt->error;
    }
    
    $insertStmt->close();
}

$checkStmt->close();
$dbc->close();

// Redirect to the cart page
header("Location: cart.php");
exit();
?>
