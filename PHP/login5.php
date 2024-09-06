<?php
// Start the session
session_start();

// Database connection
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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    if (isset($_POST['emailOrusername']) && isset($_POST['password'])) {
        $emailOrusername = $_POST['emailOrusername'];
        $password = $_POST['password'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? OR username = ?");
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ss", $emailOrusername, $emailOrusername);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if user exists
            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Verify the provided password with the stored hashed password
                if (password_verify($password, $user['password'])) {
                    // Authentication successful
                    $user_id = $user['user_id']; // Get the user ID from the user array

                    // Store the user ID in a session variable
                    $_SESSION['user_id'] = $user_id;

                    // Redirect to the desired page
                    header('Location: index.php');
                    exit;
                } else {
                    // Incorrect password
                    echo "<script>alert('Incorrect password.');</script>";
                }
            } else {
                // User not found
                echo "<script>alert('User not found.');</script>";
            }

            // Close the statement
            $stmt->close();
        } else {
            // SQL statement preparation error
            echo "<script>alert('Database error: unable to prepare statement.');</script>";
        }
    } else {
        // Missing form data
        echo "<script>alert('Invalid form submission. Please try again.');</script>";
    }

    // Close the connection
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>ReCrafted</title>
      <link rel="stylesheet" href="./style5.css">
   </head>
   <body style="background-image: url('bg.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

      <div class="wrapper" >
         <div class="title">
            Login
         </div>
         <form action="" method="POST" onsubmit="return validateLoginForm()">
            <div class="field">
               <input type="text" name="emailOrusername" required>
               <label>Email Address / Username</label>
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
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="./signup5.php">Signup now</a>
            </div>
         </form>
      </div>


<script>
function validateLoginForm() {
    var form = document.forms[0];
    var emailOrUsername = form['emailOrUsername'].value;
    var password = form['password'].value;

    if (emailOrUsername === '') {
        alert('Email Address / Username is required.');
        return false;
    }
    
    if (password === '') {
        alert('Password is required.');
        return false;
    }
    
    // If all fields are filled in, allow form submission
    return true;
}
</script>


   </body>
</html>