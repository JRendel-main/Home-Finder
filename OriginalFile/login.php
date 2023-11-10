<?php
session_start();
include "connection.php";

// Define a function to handle login
function login($email, $password) {
    global $con; // Access the database connection

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM account_establishment WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Store user's email in the session
        $_SESSION['email'] = $user['email'];
        header("Location: home_owner.php");
        exit();
    } else {
        echo '<script>alert("Invalid username or password")</script>';
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'];

    // Call the login function
    login($email, $password);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="./fonts/css/all.css">
    <!-- Include other stylesheets and meta tags here -->
    <style>
    /* Your CSS styles here */
/* Reset some default styles */
body, h1, h2, h3, p {
  margin: 0;
  padding: 0;
}

/* Basic styling */
body {
  font-family: Arial, sans-serif;
}

.con {
  display: flex;
  flex-direction: column; /* Change flex direction to column */
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f7f7f7;
}

.left {
  padding: 20px;
}

.image {
  max-width: 100%;
}

.right {
  flex: 1;
  padding: 20px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  width: 400px; /* Adjust the width as needed */
  text-align: center; /* Center the content in the right section */
}

form {
  display: grid;
  gap: 20px;
  margin-top: 5px; /* Add margin to create space between the image and form */
}

input {
  border: none;
  border-bottom: 1px solid #ddd;
  padding: 8px;
  width: 100%;
}

.button {
  background-color: blue;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.signup {
  text-align: center; /* Center the signup text */
  font-size: 14px;
  margin-top: 20px; /* Add margin to create space between button and signup text */
}

a {
  color: #ff5a5f;
  text-decoration: none;
}
    </style>
</head>
<body>
<div class="con">
    <div class="left">
        <img class="image" src="homefinderlogo2.png">
    </div>
    <div class="right">
        <form method="post">
            <p>Login to <span class="bld">Home Finder</span></p>
            <div class="uname">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="uname">
                <span class="icon"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" placeholder="Enter your Password" required>
            </div>
            <input type="submit" name="button" class="button" value="Login">
            <span class="signup">Don't have an account? <a href="signupuser.php">Signup</a></span>
        </form>
    </div>
</div>
<!-- Include any scripts here -->
</body>
</html>
