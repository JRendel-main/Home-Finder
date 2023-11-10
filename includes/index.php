<style>
    .content-wrapper {
        min-height: 100vh;
    }

    .content {
        padding-top: 100px;
    }

    .searcbar {
        border-radius: 0;
    }

    .min {
        border-radius: 0;
    }

    .max {
        border-radius: 0;
    }

    .slider-range {
        width: 100%;


    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Search For Apartment</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form>
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg searchbar"
                                placeholder="Enter keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-2 offset-md-2">
                    <h4>Price Range (PHP)</h4>
                    <div class="row">
                        <div class="input-group">
                            <div class="slider-range"></div>
                        </div>
                        <div class="input-group mt-2">
                            <label for="minPrice">Min</label>
                            <label for="maxPrice">Max</label>
                            <input type="text" class="form-control form-control min" id="minPrice">
                            <input type text" class="form-control form-control max" id="maxPrice">
                            <button class="btn btn-danger reset-btn">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- Add the checkboxes for apartment type selection -->
                <div class="col-md-2">
                    <h4>Apartment Type</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="apartmentTypes[]" id="boardingType"
                            value="boarding">
                        <label class="form-check-label" for="boardingType">
                            Boarding House
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="apartmentTypes[]" id="bedspaceType"
                            value="bedspace">
                        <label class="form-check-label" for="bedspaceType">
                            Bedspace
                        </label>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row mt-2 border-0">
                <?php

                $result = mysqli_query($conn, "SELECT * FROM account_establishment WHERE status = 'approved'");
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row['cover_photo'];
                        $price = $row['price'];
                        $name = $row['name'];
                        $address = $row['address'];
                        $type = $row['type'];

                        if ($type == 'boarding_house') {
                            $type = 'Boarding';
                        } else if ($type == 'bedspace') {
                            $type = 'Bedspace';
                        } else {
                            $type = 'Unknown';
                        }
                        $id = $row['id']; // Assuming 'id' is the primary key column in your database
                        ?>
                        <div class="col-md-3 mb-4 apartment" style="min-height: 300px;">
                            <!-- Add the 'apartment' class here and set a fixed min-height -->
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>"
                                    style="height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title"><small>
                                            <?php echo $name; ?>
                                        </small></h5>
                                    <p class="card-text">
                                        <?php echo $address; ?>
                                    </p>
                                    <p class="card-p">
                                        PHP
                                        <?php echo $price; ?> per Month
                                    </p>
                                    <!-- Add here the type -->
                                    <p class="card-p">
                                        Type: <b><?php echo $type; ?></b>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="viewRooms.php?id=<?php echo $id; ?>" class="btn btn-lg btn-outline-primary">View
                                        Apartment</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <!-- Add this modal structure at the end of your HTML body -->
    <div class="modal fade" id="apartmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apartment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display apartment details, room list, availability, and owner's name here -->
                    <div id="apartmentDetails"></div>
                </div>
            </div>
        </div>
    </div>


</div>