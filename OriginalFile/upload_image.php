<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Owner Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include SweetAlert2 script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include any necessary stylesheets and meta tags here -->
</head>
<body>
<!-- Rest of your PHP and HTML code remains the same -->
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

// Handle image upload
if (isset($_POST['room_id']) && isset($_FILES['image'])) {
    $room_id = $_POST['room_id'];
    $image = $_FILES['image'];

    // Check if the uploaded file is an image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        // Handle invalid file type (not an image)
        echo "Invalid file type. Please upload an image.";
    } else {
        // Define the directory where images will be stored
        $upload_directory = "images/"; // Create a directory called "images" in your project

        // Generate a unique filename for the uploaded image
        $unique_filename = uniqid() . '_' . $image['name'];

        // Move the uploaded file to the destination directory
        $destination_path = $upload_directory . $unique_filename;
        if (move_uploaded_file($image['tmp_name'], $destination_path)) {
            // Fetch the "id" of the establishment based on the user's email
            $select_query = "SELECT id FROM account_establishment WHERE email = ?";
            $select_stmt = $con->prepare($select_query);
            $select_stmt->bind_param("s", $userEmail);
            $select_stmt->execute();
            $select_result = $select_stmt->get_result();

            if ($select_result->num_rows > 0) {
                $row = $select_result->fetch_assoc();
                $establishment_id = $row['id'];

                // Insert image information into the "rooms" table
                $insert_query = "INSERT INTO rooms (establishment_id, image_path) VALUES (?, ?)";
                $insert_stmt = $con->prepare($insert_query);
                $insert_stmt->bind_param("is", $establishment_id, $destination_path);

                if ($insert_stmt->execute()) {
                    // Image uploaded and database updated successfully
                    echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Image Uploaded',
                            text: 'Your image has been uploaded successfully!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'rooms.php'; // Redirect to rooms.php
                            }
                        });
                    </script>";
                } else {
                    // Database insertion error
                    echo "Error: Unable to insert image information into the database.";
                }
            } else {
                echo "Error: User's establishment not found.";
            }
        } else {
            // File upload error
            echo "Error: Unable to upload the file.";
        }
    }
}

// The rest of your code (HTML and any other logic) goes here.
?>
</body>
</html>
