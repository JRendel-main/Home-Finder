<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HomeFinder | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Home</b>Finder</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register your apartment</p>
                <?php
                include 'includes/conn.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sanitize and retrieve form data
                    $email = mysqli_real_escape_string($conn, $_POST["email"]);
                    $password = password_hash(mysqli_real_escape_string($conn, $_POST["password"]), PASSWORD_DEFAULT);
                    $name = mysqli_real_escape_string($conn, $_POST["fullname"]);
                    $price = mysqli_real_escape_string($conn, $_POST["starting_price"]);
                    $address = mysqli_real_escape_string($conn, $_POST["address"]);
                    $map = mysqli_real_escape_string($conn, $_POST["map"]);
                    $contact = mysqli_real_escape_string($conn, $_POST["contact"]);
                    $type = mysqli_real_escape_string($conn, $_POST["type"]);
                    $payment_details = mysqli_real_escape_string($conn, $_POST["payment_details"]);

                    // Handle file upload for "Image of apartment"
                    $target_dir = "uploads/"; // Set your upload directory
                    $target_file_cover = $target_dir . basename($_FILES["cover_photo"]["name"]);

                    if (move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $target_file_cover)) {
                        // File uploaded successfully
                    } else {
                        echo "<div class='alert alert-danger'>Error uploading 'Image of apartment' file.</div>";
                    }

                    // Handle file upload for "Permit"
                    $target_file_permit = $target_dir . basename($_FILES["permit_file"]["name"]);

                    if (move_uploaded_file($_FILES["permit_file"]["tmp_name"], $target_file_permit)) {
                        // File uploaded successfully
                    } else {
                        echo "<div class='alert alert-danger'>Error uploading 'Permit' file.</div>";
                    }

                    // Insert data into the database
                    $status = "pending"; // Default status
                    $sql = "INSERT INTO account_establishment (email, password, name, address, map, cover_photo, permit_file, price, status, contact, payment_details) 
        VALUES ('$email', '$password', '$name', '$address', '$map', '$target_file_cover', '$target_file_permit', '$price', '$status', '$contact', '$payment_details')";

                    if (mysqli_query($conn, $sql)) {
                        echo "<div class='alert alert-success'>Data inserted successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error inserting data.</div>";
                    }

                    // Close the database connection
                    mysqli_close($conn);
                }
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="fullname" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Contact number -->
                        <input type="text" class="form-control" placeholder="Contact number" name="contact" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" name="conf_password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Starting price of apartment -->
                        <input type="text" class="form-control" placeholder="Starting price of apartment"
                            name="starting_price" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Payment Details textarea-->
                    <div class="input-group mb-3">
                        <textarea class="form-control" placeholder="Payment Details eg. GCASH - 09********* M.R" name="payment_details" required
                            rows="3"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-check-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!--google map link -->
                        <input type="text" class="form-control" placeholder="Google Map Link" name="map" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Address of apartment -->
                        <input type="text" class="form-control" placeholder="Address of apartment" name="address"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marked-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Type of Apartment -->
                        <select class="form-control" name="type" required>
                            <option value="" disabled selected hidden>Type of Apartment</option>
                            <option value="boarding_house">Boarding House</option>
                            <option value="bedspace">Bedspace</option>
                        </select>
                    </div>
                    <small class="text-muted">Upload permit document</small>
                    <div class="input-group mb-3">
                        <!-- Permit document -->
                        <input type="file" class="form-control" placeholder="Permit document" name="permit_file"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-file"></span>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Upload image of apartment</small>
                    <div class="input-group mb-3">
                        <!-- Image of apartment -->
                        <input type="file" class="form-control" placeholder="Image of apartment" name="cover_photo"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-image"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn btn-outline-success btn-block">Register</button>
                    </div>
                    <!-- /.col -->
            </div>
            </form>
            <a href="login.php" class="text-center">I already have a account!</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>

    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>