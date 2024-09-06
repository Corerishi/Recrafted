<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recrafted";

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists in the database
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Username or email already exists
        echo "<script>alert('Username or email already in use.');</script>";
        $stmt->close();
        return;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and execute the statement to insert data into the user table
    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
    
    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        // Execute the statement
        if ($stmt->execute()) {
            // User registered successfully
            echo "<script>alert('User registered successfully!'); window.location.href='login5.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>ReCrafted</title>
      <link rel="stylesheet" href="./style5.css">
   </head>
   <body style="background-image: url('bg.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
      <div class="wrapper">
         <div class="title">
            REGISTER
         </div>
         <form action="" method="POST" onsubmit="return validateForm()">
            <div class="field">
                <input type="text" name="username" required>
                <label>UserName</label>
            </div>
            <div class="field">
                <input type="text" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="REGISTER">
            </div>
            <div class="signup-link">
                Already a member? <a href="./login5.php">Log In</a>
            </div>
        </form>
        
      </div>



      <script>
function validateForm() {
    // Get form fields
    var username = document.forms[0]["username"].value;
    var email = document.forms[0]["email"].value;
    var password = document.forms[0]["password"].value;

    // Check if username is empty
    if (username === "") {
        alert("Username is required.");
        return false;
    }

    // Check if email is empty
    if (email === "") {
        alert("Email is required.");
        return false;
    } else {
        // Check if email is valid (simple validation)
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }
    }

    // Check if password is empty
    if (password === "") {
        alert("Password is required.");
        return false;
    }

    // Password validation rules
    var minLength = 8; // Minimum length of the password
    var maxLength = 20; // Maximum length of the password
    var hasUpperCase = /[A-Z]/.test(password); // Check for uppercase letter
    var hasLowerCase = /[a-z]/.test(password); // Check for lowercase letter
    var hasNumber = /\d/.test(password); // Check for a number
    var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password); // Check for special character

    // Check if password meets the criteria
    if (password.length < minLength) {
        alert("Password must be at least " + minLength + " characters long.");
        return false;
    }

    if (password.length > maxLength) {
        alert("Password must not exceed " + maxLength + " characters.");
        return false;
    }

    if (!hasUpperCase) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }

    if (!hasLowerCase) {
        alert("Password must contain at least one lowercase letter.");
        return false;
    }

    if (!hasNumber) {
        alert("Password must contain at least one number.");
        return false;
    }

    if (!hasSpecialChar) {
        alert("Password must contain at least one special character (e.g., !@#$%^&*()).");
        return false;
    }

    // If all validations pass, return true to submit the form
    return true;
}
</script>


   </body>
</html>