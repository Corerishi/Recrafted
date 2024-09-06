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
            <li><a class="active" href="watch.html">Shop</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="cart.php"><img style="width: 25px;" src="img/shopping-bag.png"></i></a></li>
        </ul>
    </div>
</section>
<section id="product1" class="section-p1">
    <h2>Bags</h2>
    <p>New Collection</p>
    <div class="pro-container">
        <?php
        $select_query = "SELECT * FROM shop where  category='bag'";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $price = $row['price'];
            $category = $row['category'];
            $image = $row['image'];
        ?>
        <a href="product_detail.php?product_id=<?php echo $product_id; ?>">
        <div class="pro">
            <div class='des'>
                <img src='<?php echo $image; ?>' alt="">
                <div class="des">
                    <span><?php echo $category; ?></span>
                    <h5><?php echo $product_name; ?></h5>
                    <h4><?php echo $price; ?></h4>
                    <a href="product_detail.php?product_id=<?php echo $product_id; ?>"><i class='fal fa-shopping-cart cart'></i></a>
                </div>
            </div>
        </div></a>
        <?php } ?>
    </div>
</section>

<footer class="section-p1">
    <div class="col">
        <h4>Contact</h4>
        <p><strong>Address:</strong> 2GP3+GR5, Nalagadderanahalli, Peenya, Bengaluru, Karnataka 560073</p>
        <p><strong>Phone:</strong> 98XXXXXXX/ 99XXXXXXX</p>
        <p><strong>Hours:</strong> 10:00 - 17:00, Mon - Sat</p>
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
        <h4>About</h4>
        <a href="#">About us</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Terms & conditions</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="col">
        <h4>My Account</h4>
        <a href="#">Sign in</a>
        <a href="#">View Cart</a>
        <a href="#">Help</a>
    </div>
    <div class="col install">
        <h4>Install App</h4>
        <p>From App Store or Google Play</p>
        <div class="row">
            <img src="img/pay/app.jpg" alt="">
            <img src="img/pay/play.jpg" alt="">
        </div>
    </div>
    <div class="copyright">
        <p>@2024, ReCrafted Project</p>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
