<?php

// Include your database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrafted";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if not logged in
    header('Location: login5.php');
    exit;
}

// Process the form when it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    
    // Retrieve form data
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $country = $conn->real_escape_string($_POST['country']);
    $zip_code = $conn->real_escape_string($_POST['zip_code']);
    
    // Insert into billing_detail table
    $insertBillingQuery = "INSERT INTO billing_detail (user_id, full_name, email, address, city, state, country, zip_code) 
                           VALUES ('$user_id', '$full_name', '$email', '$address', '$city', '$state', '$country', '$zip_code')";
    
    if ($conn->query($insertBillingQuery)) {
        // Retrieve the inserted billing detail ID
        $billing_detail_id = $conn->insert_id;
        
        // Retrieve cart items for the user
        $getCartItemsQuery = "SELECT * FROM cart WHERE user_id = '$user_id'";
        $cartItemsResult = $conn->query($getCartItemsQuery);
        
        if ($cartItemsResult->num_rows > 0) {
            // Insert each cart item as an order
            while ($cartItem = $cartItemsResult->fetch_assoc()) {
                $product_id = $cartItem['product_id'];
                $product_name = $cartItem['product_name'];
                $quantity = $cartItem['quantity'];
                $price = $cartItem['price'];
                $total = $cartItem['total'];
                
                // Insert the cart item as an order
                $insertOrderQuery = "INSERT INTO orders (user_id, product_id, product_name, quantity, price, total) 
                                    VALUES ('$user_id', '$product_id', '$product_name', '$quantity', '$price', '$total')";
                
                if (!$conn->query($insertOrderQuery)) {
                    echo "Error inserting order: " . $conn->error;
                }
            }
            
            // Delete cart items for the user
            $clearCartQuery = "DELETE FROM cart WHERE user_id = '$user_id'";
            if (!$conn->query($clearCartQuery)) {
                echo "Error clearing cart: " . $conn->error;
            } else {
                header('Location: index.php');
                exit;
            }
        } else {
            echo "No items in the cart to process.";
        }
    } else {
        echo "Error inserting billing detail: " . $conn->error;
    }
}

// Close the connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReCrafted.com</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="img">

        <link rel="stylesheet" href="style.css">
    </head>

    <body>


<footer class="section-p1">
            <div class="col">
        
                <h4> Contact </h4>
                <p><strong>Address:</strong> 2GP3+GR5, Nalagadderanahalli, Peenya, Bengaluru, Karnataka 560073</p>
                <p><strong>Phone:</strong> 98XXXXXXX/ 99XXXXXXX</p>
                <p><strong>Hours:</strong> 10:00 - 17:00, Mon - Sat </p>
                <div class="follow">
                    <h4>Follow Us</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest-p"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <h4> About </h4>
                <a href="about.html">About us</a>
                <a href="#">Privacy Policy </a>
                <a href="#">Terms & conditions</a>
                <a href="contact.php">Contact Us</a>
            </div>

            <div class="col">
                <h4> My Account </h4>
                <a href="login5.php">Sign in</a>
                <a href="cart.php">View Cart </a>
                <a href="#">Help</a>
            
            </div>
            <div class="col install">
                <h4>Install App</h4>
                <p> From App Store or Google Play</p>
                    <div class="row">
                        <img src="img/pay/app.jpg" alt="">
                        <img src="img/pay/play.jpg" alt="">
                    </div>

                    
            </div>
    
                    <div class="copyright">
                        <p> @2024, ReCrafted Project</p>

                        
            
            </div>
        </footer>
</body>
</html