<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["apartmentImage"]) && $_FILES["apartmentImage"]["error"] == 0) {
        $targetDir = "uploads/"; // Specify the target directory where you want to save the uploaded image
        $targetFile = $targetDir . basename($_FILES["apartmentImage"]["name"]);

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "File already exists.";
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["apartmentImage"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["apartmentImage"]["name"])) . " has been uploaded.";
                // 
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

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

                <form action="index.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Starting price of apartment -->
                        <input type="text" class="form-control" placeholder="Starting price of apartment">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-money-bill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <!-- Address / google map link -->
                        <input type="text" class="form-control" placeholder="Address / Google Map link">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Upload Apartment Image</label>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-lg btn-outline-success btn-block">Register</button>
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