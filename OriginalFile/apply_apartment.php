<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Finder</title>
  <link rel="stylesheet" href="./fonts/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

  <style type="text/css">
    /* Reset some default styles */
    body, h1, h2, h3, p {
      margin: 0;
      padding: 0;
    }

    /* Basic styling */
    body {
      font-family: Arial, sans-serif;
      background-image: url('g6.jpg'); /* Set your background image URL here */
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
    }

    /* Container */
    .con {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Right side (form) */
    .right {
      flex: 1;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
      position: relative; /* Add this */
    }

    /* Form styling */
    form {
      display: grid;
      gap: 20px;
      margin-top: 5px;
    }

    /* Input fields */
    input {
      border: none;
      border-bottom: 1px solid #ddd;
      padding: 8px;
      width: 100%;
    }

    /* Submit button */
    .button {
      background-color: blue;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    /* Signup text */
    .signup {
      text-align: center;
      font-size: 14px;
      margin-top: 20px;
    }

    /* Links */
    a {
      color: #ff5a5f;
      text-decoration: none;
    }

    /* Password toggle button */
    #password-toggle {
      background: none;
      border: none;
      cursor: pointer;
      outline: none;
    }

    /* Password toggle button icon */
    #password-toggle i {
      font-size: 16px;
      color: #333;
      margin-left: 5px;
    }

    /* Password field visibility */
    #password {
      border-right: none;
      border-radius: 4px 0 0 4px;
    }

    /* Toggle button position */
    #password-toggle {
      border-left: none;
      border-radius: 0 4px 4px 0;
    }
    
    /* URL and address form styling */
    .url-form, .address-form {
      margin-top: 20px;
    }

    label {
      font-weight: bold;
    }

    /* Move the image inside the form */
    .image {
      max-width: 100%;
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
    }
  </style>
  <script>
    function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var passwordToggle = document.getElementById("password-toggle");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggle.textContent = "Hide Password";
      } else {
        passwordField.type = "password";
        passwordToggle.textContent = "Show Password";
      }
    }
  </script>
</head>
<body>
<div class="con">
  <div class="right">
    <form method="post" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
      <p>Apply <span class="bld">Apartment</span></p>

      <!-- Move the image inside the form -->
      <img class="image" src="homefinderlogo2.png">

      <div class="uname">
        <span class="icon"><i class="">Email</i></span>
        <input type="text" name="email" placeholder="Email" required>
      </div>

      <div class="uname">
        <span class="icon"><i class="">Password</i></span>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <button type="button" onclick="togglePasswordVisibility()" id="password-toggle">
          <i class="far fa-eye"></i> <!-- Eye icon for show password -->
        </button>
      </div>

      <div class="uname"> <span class="icon"><i class="">Name</i></span>
        <input type="text" name="name" placeholder=" Name" required>
      </div>

      <div class="uname"> <span class="icon"><i class="">Price</i></span>
        <input type="number" name="price" placeholder="Price" required>
      </div>


      <div class="address-form">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" placeholder="Address" required>
      </div>

      <div class="address-form">
        <label for="address">Map Link:</label>
        <input type="text" name="map" id="map" placeholder="Map Link" required>
      </div>

      <div class="uname"> <span class="icon"><i class="">Image</i></span>
        <input type="file" name="cover_photo" accept="image/*" required> <!-- File upload input -->
      </div>

      <input type="submit" name="button" class="button">

      <span class="signup">Already have an account
        <a href="login.php">login</a> ?</span>
    </form>
  </div>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details
    $db_host = "localhost"; // Replace with your database host
    $db_user = "root"; // Replace with your database username
    $db_password = ""; // Replace with your database password
    $db_name = "home_finder1_db"; // Replace with your database name

    // Create a connection to the database
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize and retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_DEFAULT);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $map = mysqli_real_escape_string($conn, $_POST["map"]);

    // Handle file upload
    $target_dir = "uploads/"; // Set your upload directory
    $target_file = $target_dir . basename($_FILES["cover_photo"]["name"]);

    if (move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $target_file)) {
        // File uploaded successfully
    } else {
        echo "Error uploading file.";
    }

    // Insert data into the database
    $status = "pending"; // Default status
    // Corrected SQL query for inserting data into the database
    $sql = "INSERT INTO account_establishment (email, password, name, address, map, cover_photo, price, status) 
        VALUES ('$email', '$password', '$name', '$address', '$map', '$target_file', '$price', '$status')";


    if (mysqli_query($conn, $sql)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


</body>
</html>
