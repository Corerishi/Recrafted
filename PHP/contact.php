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

$message = ""; // Initialize an empty message variable

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Perform SQL query
    $sql = "INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";
    if ($conn->query($sql) === TRUE) {
        // Close connection
        $conn->close();
       
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReCrafted</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="custom.css"> <!-- Add custom CSS file -->
</head>

<body>
    <section id="header">
        <a href="#"><img src="img/ReCrafted_Final-removebg1.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="watch.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
                <li><a href="cart.php"><img style="width: 25px;" src="img/shopping-bag.png"></a></li>
            </ul>
        </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>Contact us</h2>
        <p>We would love to hear from you...!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class=" container">
            <div class="address">
                <span>REACH OUT TO US</span>
                <br>
                <h2>Visit us at our primary location or contact us</h2>
                <br>
                <h3>Head Office</h3>
                <ul>
                    <li>
                        <i class="fal fa-map"></i>
                        <p>2GP3+GR5, Nalagadderanahalli, Peenya, Bengaluru, Karnataka 560073</p>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <p>contact@example.com</p>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i>
                        <p>contact@example.com</p>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <p>Monday to Saturday 9:00am to 5:00pm</p>
                    </li>
                </ul>
            </div>
            <div class="map map-box" id="map">
                <iframe class="map-image"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.9906382905406!2d77.50203447602381!3d13.036267713455334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d0a40ad5761%3A0xe5a58bef32d6e1b7!2sChrist%20University%20Yeshwanthpur%20Campus!5e0!3m2!1sen!2sin!4v1711872248481!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <section id="form-details">
        <form action="" method="POST" onsubmit="return submitForm()">
            <span>LEAVE A MESSAGE</span>
            <h2> We Would love to hear from you</h2>
            <input type="text" name="name" placeholder="Your Name">
            <input type="text" name="email" placeholder="Email Address">
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button type="submit" class="normal"> Submit</button>
        </form> 
    

    </section>

    <section id="signup" class="section-p1">
        <div class="sign-up ban">
            <h4>Sign up If you haven't already!</h4>
            <p>Click the <span>Sign up button</span> to get started.</p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your Email Address">
            <div><button><a style="text-decoration: none; color: #fff; font-weight: 700; font-size: 16px;"
                        href="signup5.php">Sign Up</a></button></div>   
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
            <a href="about.html">About us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & conditions</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="login5.php">Sign in</a>
            <a href="cart.php">View Cart</a>
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

    <script>
        function submitForm() {
            alert("Form submitted successfully!");
            return true; // You can also return false to prevent the form from submitting
        }
    </script>
</body>

</html>
