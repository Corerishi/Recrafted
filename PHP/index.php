
<?php
// Start the session
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


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrafted";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
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

        <section id="header">
            <a href="index.php"><img src="img/ReCrafted_Final-removebg1.png" class="logo" alt=""></a>

            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.php">Home</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropbtn">Shop <i class="fas fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <ul>
                        <a href="watch.php">Watches</a>
                        <a href="bag.php">Bags</a>
                        </ul>
                    </div>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="cart.php"><img style="width: 25px;" src="img/shopping-bag.png"></i></a></li>
                </ul>
            </div>
        </section>

        <section id="hero">
            <h4>EXCITING OFFERS!</h4>
            <h2 style="color: #fff;">Super Value Brands</h2>
            <h1>On all products</h1>
            <p style="color: #fff;">Save more with coupons & up to 70% off!</p>
            <a style="text-decoration: none;
            color: #4ebfb7;" href="./watch.php"><h3 text-align="left">Shop Now</h3></a>
        </section>


        <section id="product1" class="section-p1">
            <h2>Featured Products</h2>
            <p>New Collection</p>
            <a style="text-decoration: none;
            color: black;" href="./watch.php"><h3 text-align="left"> Watches</h3></a>
            <div class="pro-container">
                <div class="pro">
                    <img src="https://cdn4.ethoswatches.com/the-watch-guide/wp-content/uploads/2020/04/50-great-watches-buy-2020-21-end-year-luxury-watches-mens-timepiece-iconic-pieces-top-50-best-prices-corum-golden-bridge-SPECIAL-men-2.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro" id="beforeshoe">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div>
            <a style="text-decoration: none;
            color: black;" href="./bag.php"><h3 text-align="left">Bags</h3></a>
            <div class="pro-container">
                <div class="pro">
                    <img src="https://cdn4.ethoswatches.com/the-watch-guide/wp-content/uploads/2020/04/50-great-watches-buy-2020-21-end-year-luxury-watches-mens-timepiece-iconic-pieces-top-50-best-prices-corum-golden-bridge-SPECIAL-men-2.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
                <div class="pro" id="beforeshoe">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Atronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div>
        </section>
        <section id="signup" class="section-p1">
            <div class="sign up ban">
                <h4> Sign up If you haven't already!</h4>
                <p>Click the <span> Sign up button </span> to get started.</p>
        </div>
        <div class="form">
            <input type="text"  placeholder="Your Email Address">
            <div><button><a style="text-decoration: none;
            color: #fff;
            font-weight: 700;
            font-size: 16px;" href="./signup5.php">Sign Up</a></button></div>
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
        
    </body>

</html>