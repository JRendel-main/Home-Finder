<?php
// Include your database connection file
include "includes/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tenant_id"])) {
    // Sanitize and retrieve the tenant ID from the POST data
    $tenantId = filter_var($_POST["tenant_id"], FILTER_SANITIZE_NUMBER_INT);

    // Perform the SQL query to remove the tenant
    $sql = "DELETE FROM reservations WHERE id = $tenantId";
    if (mysqli_query($conn, $sql)) {
        // Tenant removal was successful
        echo "Tenant removed successfully";
    } else {
        // Tenant removal failed
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Invalid request or missing tenant ID
    echo "Invalid request or missing tenant ID";
}

// Close the database connection
mysqli_close($conn);
?>
