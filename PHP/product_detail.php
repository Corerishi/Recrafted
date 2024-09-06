<?php
// Start session
session_start();

// Retrieve the product_id from the URL and save it in session
if (isset($_GET['product_id'])) {
    $_SESSION['product_id'] = $_GET['product_id'];
}

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReCrafted</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="header">
        <a href="index.php"><img src="img/ReCrafted_Final-removebg1.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="watch.html">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="cart.html"><img style="width: 25px;" src="img/shopping-bag.png"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="prodetails" class="section-p1">
        <?php
        // Use the product_id from the session
        if (isset($_SESSION['product_id'])) {
            $product_id = $_SESSION['product_id'];

            // Prepare and bind the SQL statement
            $select_query = "SELECT * FROM shop WHERE product_id = ?";
            $stmt = $conn->prepare($select_query);
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result_query = $stmt->get_result();

            // Fetch the product data
            while ($row = $result_query->fetch_assoc()) {
                $product_name = $row['product_name'];
                $price = $row['price'];
                $category = $row['category'];
                $image = $row['image'];
                $product_desc = $row['product_desc'];

                echo "
                <div class='single-pro-image'>
                    <img src='$image' width='100%' id='MainImg' alt=''>
                </div>

                <div class='single-pro-details'>
                    <h6>$category</h6>
                    <h4>$product_name</h4>
                    <h2>$$price</h2>
                    <form id='add-to-cart-form' action='add_to_cart.php' method='POST'>
                        <input type='number' name='quantity' value='1' min='1' max='10'>
                        <input type='hidden' name='product_id' value='$product_id'>
                        <button type='submit' class='cart-button'>Add To Cart</button>
                    </form>
                    <h4>Product Details</h4>
                    <span>$product_desc</span>
                </div>
                ";
            }
            $stmt->close();
        } else {
            echo "Product not found.";
        }
        ?>
    </section>
</body>
</html>
