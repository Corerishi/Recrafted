<?php
// Include the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrafted";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session to access user ID
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login5.php');
    exit;
}
$user_id = $_SESSION['user_id'];

// Get the product_id from the query parameters
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Prepare the DELETE query
    $delete_query = "DELETE FROM cart WHERE product_id = ? AND user_id = ?";
    $stmt = $conn->prepare($delete_query);

    // Check if the statement was prepared successfully
    if ($stmt) {
        // Bind the parameters (product_id and user_id)
        $stmt->bind_param("ii", $product_id, $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            // Deletion successful
            // Redirect back to the cart page
            header('Location: cart.php');
        } else {
            // Log error message (you may want to log this error)
            echo "Error executing DELETE query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Log error message (you may want to log this error)
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
