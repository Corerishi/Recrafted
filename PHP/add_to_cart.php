<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login5.php');
    exit;
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve product_id from session
if (!isset($_SESSION['product_id'])) {
    echo "Product ID not found in session.";
    exit;
}

$product_id = $_SESSION['product_id'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrafted";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted with a quantity
if (isset($_POST['quantity']) && is_numeric($_POST['quantity'])) {
    $quantity = (int) $_POST['quantity'];
} else {
    echo "Invalid quantity.";
    exit;
}

// Retrieve product details from the shop table
$query = "SELECT product_name, price FROM shop WHERE product_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->bind_result($product_name, $price);
$stmt->fetch();
$stmt->close();

// If product details are found
if ($product_name && $price) {
    // Check if the product is already in the cart
    $check_query = "SELECT quantity FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $stmt->bind_result($current_quantity);
    $stmt->fetch();
    $stmt->close();

    if ($current_quantity !== null) {
        // If the product is already in the cart, update the quantity
        $new_quantity = $current_quantity + $quantity;
        $update_query = "UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("iii", $new_quantity, $user_id, $product_id);
        $stmt->execute();
        $stmt->close();

        $_SESSION['success_message'] = "Item quantity updated in the cart successfully.";
    } else {
        // If the product is not in the cart, insert a new item into the cart
        $insert_query = "INSERT INTO cart (user_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("iisdi", $user_id, $product_id, $product_name, $price, $quantity);
        $stmt->execute();
        $stmt->close();

        $_SESSION['success_message'] = "Item added to cart successfully.";
    }

    // Redirect back to the shop page or cart page
    header('Location: cart.php');
    exit;
} else {
    echo "Product not found.";
}

// Close the connection
$conn->close();
?>
