<?php
session_start(); // Start the PHP session

include_once 'connection.php';

// Function to update the status
if (isset($_POST['approve'])) {
    $reservationId = $_POST['reservation_id'];
    $updateSql = "UPDATE reservations SET status = 'Approved' WHERE id = $reservationId";
    if ($con->query($updateSql) === TRUE) {
        // Status updated successfully
    } else {
        // Error updating status
    }
}

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your CSS and JavaScript links here if needed -->
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

    <div class="container mt-4">';

// Fetch all "Pending" reservations
$sqlPending = "SELECT * FROM reservations WHERE status = 'Pending'";
$resultPending = $con->query($sqlPending);

if ($resultPending->num_rows > 0) {
    // Display "Pending" reservations
    echo "<h1 class='mb-4'>Pending Reservations</h1>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>Name</th><th>Contact</th><th>Email</th><th>Address</th><th>Status</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    while ($row = $resultPending->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='reservation_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='approve' class='btn btn-primary'>Approve</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div>No pending reservations found.</div>";
}

// Fetch all "Approved" reservations
$sqlApproved = "SELECT * FROM reservations WHERE status = 'Approved'";
$resultApproved = $con->query($sqlApproved);

if ($resultApproved->num_rows > 0) {
    // Display "Approved" reservations
    echo "<h1 class='mb-4'>Approved Reservations</h1>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>Name</th><th>Contact</th><th>Email</th><th>Address</th><th>Status</th><th>Action</th></tr></thead>";
    echo "<tbody>";

    while ($row = $resultApproved->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['contact'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='reservation_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' name='approve' class='btn btn-primary'>Approve</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<div>No approved reservations found.</div>";
}

echo '</div>
</body>
</html>';
// Close the database connection
$con->close();
?>
