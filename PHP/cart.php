<?php


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
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Now you can use the user_id in this page
} else {
    // Redirect the user to the login page if not logged in
    header('Location: login5.php');
    exit;
}

$sum_query = "SELECT SUM(total) as cart_subtotal FROM cart WHERE user_id = ?";
$stmt = $conn->prepare($sum_query);

// Check if the statement was prepared successfully
if ($stmt) {
    // Bind the user_id parameter
    $stmt->bind_param("i", $user_id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Get the result
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            // Calculate cart subtotal and total
            $cart_subtotal = $row['cart_subtotal'];
        }
    } else {
        // Log error message (you may want to log this error)
        echo "Error executing SUM query: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Log error message (you may want to log this error)
    echo "Error preparing statement: " . $conn->error;
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
            <a href="#"><img src="img/ReCrafted_Final-removebg1.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="watch.php">Shop</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a class="active" href="cart.php"><img style="width: 25px;" src="img/shopping-bag.png"></i></a></li>
                </ul>
            </div>
        </section>

        <section id="page-header">
            
            <h2>#cart</h2>
            
            <p>Save more with coupons & up to 70% off!</p>
            
        </section>

        <section id="cart" class="section-p1">
            <table width="100%" >
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_query = "SELECT cart.*, shop.image FROM cart INNER JOIN shop ON cart.product_id = shop.product_id WHERE cart.user_id = $user_id";
                    $select_result = mysqli_query($conn, $select_query);
                while ($row = mysqli_fetch_assoc($select_result)) {
                    $product_name = $row['product_name'];
                    $product_id =$row['product_id']; 
                    $quantity = $row['quantity'];
                    $price = $row['price'];
                    $total = $row['total'];
                    $p_img = $row['image'];
                    echo"
                    <tr>
                        <td>
                            <a href='delete_cart_item.php?product_id=$product_id'>
                                <i class='far fa-times-circle' style='color: black;'></i>
                            </a>
                        </td>
                        <td><img src='$p_img' alt=''></td>
                        <td>$product_name</td>
                        <td>$price</td>
                        <td>$quantity</td>
                        <td>$total</td>
                    </tr>";}?>
                </tbody>
            </table>
        </section>


        <section id="cart-add" class="section-p1">
            <div id="coupon">
                <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="signup">Apply Coupon</button>
                </div>
            </div>
            <div id="subtotal">
                <h3>Cart Total</h3>
                <table>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td><?php echo number_format($cart_subtotal, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Free</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong><?php echo number_format($cart_subtotal, 2); ?></strong></td>
                    </tr>
                </table>
                <form action="billing.php" method="post">
                    <button class="signup">Proceed to Checkout</button>
                </form>
            </div>
        </section>

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

        <script src="script.js"></script>

    </body>

</html>