<?php
include_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_id = $_POST["room_id"];
    $name = sanitizeInput($_POST["name"]);
    $contact = sanitizeInput($_POST["contact"]);
    $email = sanitizeInput($_POST["email"]);
    $address = sanitizeInput($_POST["address"]);
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Handle file upload (selfie picture)
    $upload_directory = "uploads/"; // Change this to your desired directory

    // Check if a file was uploaded
    if (isset($_FILES["selfie"]) && $_FILES["selfie"]["error"] == UPLOAD_ERR_OK) {
        $selfie_file = $upload_directory . basename($_FILES["selfie"]["name"]);

        if (move_uploaded_file($_FILES["selfie"]["tmp_name"], $selfie_file)) {
            // File uploaded successfully, continue with the database insertion
            // Ensure you've established a database connection

            // Sanitize data before inserting into the database
            $name = sanitizeInput($name);
            $contact = sanitizeInput($contact);
            $email = sanitizeInput($email);
            $address = sanitizeInput($address);
            $selfie_file = sanitizeInput($selfie_file);

            // Create the SQL insert query
            $sql = "INSERT INTO reservations (room_id, name, contact, email, address, selfie_file)
                    VALUES ('$room_id', '$name', '$contact', '$email', '$address', '$selfie_file')";

            // Perform the database insertion
            if ($con->query($sql) === TRUE) {
                echo "Reservation successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload the selfie picture.";
        }
    } else {
        echo "No selfie picture was uploaded.";
    }

    // Close the database connection
    $con->close();
}

function sanitizeInput($input) {
    // Perform any necessary sanitization here
    // For example, you can use functions like mysqli_real_escape_string or htmlspecialchars
    $input = htmlspecialchars($input);
    return $input;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Reservation</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your CSS and JavaScript links here if needed -->
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Room Reservation</h1>

        <?php
        // Check if a room ID is provided in the URL
        if (isset($_GET['ROOM'])) {
            $roomID = $_GET['ROOM'];

            // Reservation form
            ?>
            <form method="post" class="mt-3" enctype="multipart/form-data">
                <input type="hidden" name="room_id" value="<?php echo $roomID; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="contact">Contact Number:</label>
                    <input type="text" class="form-control" id="contact" name="contact" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="form-group">
                    <label for="selfie">Selfie Picture (Upload):</label>
                    <input type="file" class="form-control-file" id="selfie" name="selfie" required>
                </div>

                <button type="submit" class="btn btn-primary">Reserve</button>
            </form>
            <?php
        }
        ?>

    </div>

    <!-- Add Bootstrap JS and jQuery if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add your JavaScript code here if needed -->
</body>
</html>
