<?php
session_start();

// Check if the user is logged in (has an active session)
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php"); // Replace with the actual login page filename
    exit();
}

// Include your database connection here
include "connection.php";

// Get the email of the logged-in user
$userEmail = $_SESSION['email'];

// Fetch and display records from the account_establishment table for the logged-in user
$query = "SELECT * FROM account_establishment WHERE email = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

// Your HTML code to display the records
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Owner Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include any necessary stylesheets and meta tags here -->
</head>
<body>
    <!-- Create a Bootstrap navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home_owner.php">Home Owner Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservations.php">List of Reservations</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Form to upload room images -->
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <h2>Add Room Images</h2>
            <div class="form-group">
                <label for="image">Choose an image:</label>
                <input type="file" name="image" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="room_id">Select Room:</label>
                <select name="room_id" class="form-control" required>
                    <!-- Populate this select box with room data from your database -->
                    <option value="1">Room 1</option>
                    <option value="2">Room 2</option>
                    <option value="3">Room 3</option>
                    <option value="4">Room 4</option>
                    <option value="5">Room 5</option>
                    <option value="6">Room 6</option>
                    <option value="7">Room 7</option>
                    <!-- Add more options for other rooms -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Upload Image</button>
        </form>
    </div>
    <!-- Include Bootstrap JS and any other scripts here -->
</body>
</html>
