<?php
session_start();

// Check if the user is logged in (has an active session)
if (!isset($_SESSION['id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php"); // Replace with the actual login page filename
    exit();
}

// Include your database connection here
include "includes/conn.php";

// Get the email of the logged-in user
$id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_name = $_POST['room_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $max_tenant = $_POST['max_tenant'];
    $features = $_POST['features'];

    // Upload room image
    $uploadDirectory = "uploads/";
    $targetFile = $uploadDirectory . basename($_FILES["room_image"]["name"]);

    if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully, now insert data into the database
        $sql = "INSERT INTO rooms (room_name, description, price, image_path, max, features, establishment_id)
                VALUES ('$room_name', '$description', '$price', '$targetFile', '$max_tenant', '$features', $id)";
        
        if (mysqli_query($conn, $sql)) {
            // Room added successfully
            header("Location: roomlist.php"); // Redirect to the room list page
            exit();
        } else {
            // Error inserting data into the database
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Error uploading the image
        echo "Error uploading image.";
    }
}
?>
