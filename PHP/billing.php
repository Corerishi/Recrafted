<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if not logged in
    header('Location: login5.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="checkstyle.css">

</head>
<body>

<div class="container">

    <form action="checkout.php" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>Full Name:</span>
                    <input type="text" name="full_name" placeholder="John Doe" required>
                </div>
                <div class="inputBox">
                    <span>Email:</span>
                    <input type="email" name="email" placeholder="example@example.com" required>
                </div>
                <div class="inputBox">
                    <span>Address:</span>
                    <input type="text" name="address" placeholder="Room - Street - Locality" required>
                </div>
                <div class="inputBox">
                    <span>City:</span>
                    <input type="text" name="city" placeholder="Mumbai" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>State:</span>
                        <input type="text" name="state" placeholder="New Delhi" required>
                    </div>

                    <div class="inputBox">
                        <span>Country:</span>
                        <input type="text" name="country" placeholder="India" required>
                    </div>
                    <div class="inputBox">
                        <span>ZIP Code:</span>
                        <input type="text" name="zip_code" placeholder="123456" required>
                    </div>
                </div>

            </div>

        </div>

        <input type="submit" value="Proceed to Checkout" class="submit-btn">

    </form>

</div>
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
</html>
