<?php
include('common.php');
$email = $_SESSION['email'];
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Prepare and execute the delete statement securely
    $sql = "DELETE FROM cart WHERE product_id = ? and email = ?";
    $stmt = $dbc->prepare($sql);
    $stmt->bind_param("is", $product_id, $email); // Assuming product_id is an integer

    if ($stmt->execute()) {
        $_SESSION['message'] = "Product removed from cart- successfully.";
    } else {
        $_SESSION['message'] = "Error removing product: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
    $dbc->close();  // Close the database connection

    // Redirect to cart.php
    header("Location: cart.php");
    exit(); // Always exit after a redirect
} else {
    echo "Invalid request";
}
?>
