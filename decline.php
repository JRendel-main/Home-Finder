<?php
// Include your database connection here
include "includes/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["room_id"])) {
    $room_id = $_POST["room_id"];
    
    // Update the room's status to "declined" in the database
    $sql = "UPDATE reservations SET status = 'Denied' WHERE id = $room_id AND status = 'pending'";
    
    if (mysqli_query($conn, $sql)) {
        // Room declined successfully
        echo "Room declined";
    } else {
        // Error declining the room
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Invalid request
    echo "Invalid request";
}
?>
