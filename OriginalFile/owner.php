<?php
// Include your database connection here
include "connection.php";

// Check if the 'GGWP' parameter exists in the URL
if (isset($_GET['GGWP'])) {
    $ownerId = $_GET['GGWP'];

    // Prepare and execute a query to fetch rooms owned by the owner
    $queryRooms = "SELECT * FROM rooms WHERE establishment_id = ?";
    $stmtRooms = $con->prepare($queryRooms);
    $stmtRooms->bind_param("i", $ownerId);
    $stmtRooms->execute();
    $resultRooms = $stmtRooms->get_result();

    // Prepare and execute a query to fetch the map for the owner
    $queryOwner = "SELECT map FROM account_establishment WHERE id = ?";
    $stmtOwner = $con->prepare($queryOwner);
    $stmtOwner->bind_param("i", $ownerId);
    $stmtOwner->execute();
    $resultOwner = $stmtOwner->get_result();

    if ($resultOwner->num_rows > 0) {
        $rowOwner = $resultOwner->fetch_assoc();
        $map = $rowOwner['map'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rooms Owned by the Owner</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include any necessary stylesheets and meta tags here -->
</head>
<body>
    <div class="container">
    <h1>Rooms Owned by the Owner</h1><br><br>

    <div class="row">
        <?php
        // Check if any rooms were found
        if ($resultRooms->num_rows > 0) {
            while ($rowRooms = $resultRooms->fetch_assoc()) {
                // Display room details
                $roomName = $rowRooms['room_name'];
                $imagePath = $rowRooms['image_path'];

        ?>
        <div class="col-md-3 mb-4 apartment" style="min-height: 300px;">
            <div class="card" id='<?php echo $rowRooms['establishment_id']?>' onclick="tryajax(this.id)">
                <img class="card-img-top" src="<?= $imagePath ?>" alt="<?= $roomName ?>" style="height: 300px;">
                <div class="card-body">
                    <h5 class="card-title"><small><?= $roomName ?></small></h5>
                </div>
            </div>
        </div>
        <?php
        }
        } else {
            echo '<div class="col-12 text-center">No rooms found for this owner.</div>';
        }
        ?>

    </div>

    <div class="row">
        <div class="col-md-6">
            <?php
            if (isset($map)) {
            ?>
            <!-- Display the map stored in the database using an iframe -->
            <h2>Map Here:</h2>
            <?php
            echo $map;
            ?>

            <?php
            } else {
                echo '<div class="text-center">No map available for this owner.</div>';
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function tryajax(establishment_id){
        window.location.href = 'reservation.php?ROOM=' + establishment_id; // Change 'id' to 'establishment_id'
    }
</script>



    <!-- Include Bootstrap JS and any other scripts here -->
</body>
</html>
<?php
} else {
    echo "Invalid request. Please select an owner.";
}
?>
