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
$account_query = "SELECT * FROM account_establishment WHERE email = ?";
$account_stmt = $con->prepare($account_query);
$account_stmt->bind_param("s", $userEmail);
$account_stmt->execute();
$account_result = $account_stmt->get_result();

// Fetch and display records from the rooms table for the logged-in user
$rooms_query = "SELECT rooms.* FROM rooms
                INNER JOIN account_establishment ON rooms.establishment_id = account_establishment.id
                WHERE account_establishment.email = ?";

$rooms_stmt = $con->prepare($rooms_query);
$rooms_stmt->bind_param("s", $userEmail);
$rooms_stmt->execute();
$rooms_result = $rooms_stmt->get_result();
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
                    <a class="nav-link" href="reservation-list.php">List of Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="maps.php">Maps</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto"> <!-- Add ml-auto to this ul element -->
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-primary">Logout</a> <!-- Add a logout button to end the session -->
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Welcome, Home Owner!</h1>
        <p>Here are your account establishment records:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Cover Photo</th>
                    <th>Price</th>
                    <!-- Add other table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $account_result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <img src="<?php echo $row['cover_photo']; ?>" alt="Cover Photo" width="100" class="img-thumbnail">
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                        </td>
                        <!-- Add other table data as needed -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-4">
        <h1>Rooms</h1>
        <p>Here are your room records:</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Availability</th>
                    <th>Update Availability</th>
                    <!-- Add other table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <?php while ($room = $rooms_result->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <img src="<?php echo $room['image_path']; ?>" alt="Cover Photo" width="100" class="img-thumbnail">
                        </td>
                        <td><?php echo $room['availability']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                                <select name="new_availability">
                                    <option value="Available">Available</option>
                                    <option value="Not Available">Not Available</option>
                                </select>
                                <input type="submit" name="update_availability" value="Update">
                            </form>
                        </td>
                        <!-- Add other table data as needed -->
                    </tr>
                <?php } ?>

                <?php
                    // Handle form submission for updating room availability
                    if (isset($_POST['update_availability'])) {
                        $room_id = $_POST['room_id'];
                        $new_availability = $_POST['new_availability'];

                        // Perform the database update here, e.g., using a prepared statement
                        $update_query = "UPDATE rooms SET availability = ? WHERE room_id = ?";
                        $update_stmt = $con->prepare($update_query);
                        $update_stmt->bind_param("si", $new_availability, $room_id);
                        $update_stmt->execute();
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Include Bootstrap JS and any other scripts here -->
</body>
</html>
