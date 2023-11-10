<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modal_room_id = $_POST["modal_room_id"];
    $name = sanitizeInput($_POST["name"]);
    $contact = sanitizeInput($_POST["contact"]);
    $email = sanitizeInput($_POST["email"]);
    $address = sanitizeInput($_POST["address"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        handleError("Invalid email format");
    }

    // Handle file upload (selfie picture)
    $upload_directory = "uploads/";

    if (isset($_FILES["selfie"]) && $_FILES["selfie"]["error"] == UPLOAD_ERR_OK) {
        $selfie_file = $upload_directory . basename($_FILES["selfie"]["name"]);

        if (move_uploaded_file($_FILES["selfie"]["tmp_name"], $selfie_file)) {
            // File uploaded successfully, continue with the database insertion

            // Handle file upload (valid ID)
            $valid_id_directory = "uploads/valid_id/";
            if (!is_dir($valid_id_directory)) {
                mkdir($valid_id_directory, 0755, true);
            }

            if (isset($_FILES["valid_id"]) && $_FILES["valid_id"]["error"] == UPLOAD_ERR_OK) {
                $valid_id_file = $valid_id_directory . basename($_FILES["valid_id"]["name"]);

                if (move_uploaded_file($_FILES["valid_id"]["tmp_name"], $valid_id_file)) {
                    // Valid ID uploaded successfully, continue with the database insertion

                    // Add the valid ID file directory to the database
                    $sql = "INSERT INTO reservations (room_id, name, contact, email, address, selfie_file, valid_id_file)
                            VALUES ('$modal_room_id', '$name', '$contact', '$email', '$address', '$selfie_file', '$valid_id_file')";

                    if ($conn->query($sql) === TRUE) {
                        showSuccessMessage("Your reservation has been submitted.");
                    } else {
                        handleError("Error: " . $sql . "<br>" . $conn->error);
                    }
                } else {
                    handleError("Failed to upload the valid ID.");
                }
            } else {
                handleError("No valid ID was uploaded.");
            }
        } else {
            handleError("Failed to upload the selfie picture.");
        }
    } else {
        handleError("No selfie picture was uploaded.");
    }
}

function sanitizeInput($input) {
    // Perform any necessary sanitization here
    $input = htmlspecialchars($input);
    return $input;
}

function handleError($errorMessage) {
    ?>
    <script>
        swal.fire({
            title: "Error: <?php echo $errorMessage; ?>",
            icon: "error",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        });
    </script>
    <?php
}

function showSuccessMessage($message) {
    ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "<?php echo $message; ?>",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "index.php";
            }
        });
    </script>
    <?php
}
?>


<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4 mt-2">Apartment Details</h2>
            <hr />
            <div class="row">
                <h3 class="text-center display-5">Available Rooms:</h3>
            </div>
            <div class="row">
                <?php
                $id = $_GET['id'];
                $result = mysqli_query($conn, "SELECT * FROM rooms WHERE establishment_id = $id");

                $sql = ("SELECT contact FROM account_establishment WHERE id = $id");
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_array($result2);
                $contact = $row2['contact'];

                $row = mysqli_fetch_array($result);
                if ($row) {
                    while ($row = mysqli_fetch_array($result)) {
                        // check how many reservations are there for this room
                        $room_id = $row['room_id'];
                        $max = $row['max'];

                        // count the number of reservations for this room
                        $result2 = mysqli_query($conn, "SELECT * FROM reservations WHERE room_id = $room_id AND status = 'Approved'");
                        $row2 = mysqli_fetch_array($result2);
                        // count the number of reservations for this room
                        $count = mysqli_num_rows($result2);
                        $slots_left = $max - $count;

                        // set button text depending on slots left
                        if ($slots_left > 0) {
                            $button = '<a href="#" class="btn btn-primary" onclick="setRoomId(' . $room_id . ')" data-toggle="modal" data-target="#applyModal">Available ('.$slots_left.'/'.$max.')</a>';
                        } else {
                            $button = '<button class="btn btn-danger" disabled>Full</button>';
                        }
                        echo '<div class="col-md-3 mb-4">';
                        echo '<div class="card">';
                        echo '<div class="img-wrapper">';
                        echo '<img src="' . $row['image_path'] . '" class="card-img-top" alt="Room Image">';
                        echo '</div>';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['room_name'] . '</h5>';
                        echo '<p class="card-text">' . $row['max'] . ' Slots</p>';
                        echo '<p class="card-text">Features: Wifi, Cabinet, Labahan</p>';
                        echo $button;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'No rooms yet';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Add this modal structure at the end of your HTML body -->
<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applyModalLabel">Apply for Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Place your form here -->
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" id="modal_room_id" name="modal_room_id" value="">
                    <div class="form-group">
                        <label for="name">Contact Number of Owner:</label>
                        <!-- Add a read only input that copyable when clicked -->
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $contact; ?>" readonly>
                        <small id="contactHelp" class="form-text text-muted"><i>Click to copy.</i></small>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact Number:</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                        <small id="contactHelp" class="form-text text-muted"><i>Make sure you enter valid number.</i></small>
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
                        <label for="selfie">Selfie Picture with ID (Upload):</label>
                        <input type="file" class="form-control-file" id="selfie" name="selfie" required>
                    </div>

                    <div class="form-group">
                        <label for="selfie">Picture of Valid ID (Upload):</label>
                        <input type="file" class="form-control-file" id="valid_id" name="valid_id" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Reserve</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function setRoomId(roomId) {
        document.getElementById('modal_room_id').value = roomId;
    }
</script>


<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .img-wrapper {
        overflow: hidden;
        border-radius: 8px 8px 0 0;
        height: 200px; /* Adjust the height as needed */
    }

    .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card:hover .img-wrapper img {
        transform: scale(1.1);
    }
    .card-body {
        padding: 1rem;
    }
    .card-title {
        font-size: 1.25rem;
        font-weight: 500;
    }
    .modal-content {
        border-radius: 10px;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>
