<?php
// Include your database connection here
include "includes/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["room_id"])) {
    $room_id = $_POST["room_id"];
    $dateTimeNow = date("Y-m-d H:i:s");
    
    // Update the room's status to "approved" in the database
    $sql = "UPDATE reservations SET status = 'approved' WHERE id = $room_id";
    
    if (mysqli_query($conn, $sql)) {
        // Room approved successfully
        echo "Room approved";
    } else {
        // Error approving the room
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Invalid request
    echo "Invalid request";
}
?>
