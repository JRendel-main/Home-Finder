<style>
    .carousel-item {
    height: 65vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    }

    .carousel-caption {
        font-size: 1.5rem;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-family: 'Roboto', sans-serif;
        text-shadow: 2px 2px 4px #000000;
        bottom: 220px;
        /* Change the color */
    }

    .slider-range {
        width: 100%;
    
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active"
            style="background-image: url('images/apart1.jpg')">
            <div class="carousel-caption">
                <h5>Welcome to Home Finder</h5>
                <p>Discover your ideal home away from home with our student-friendly apartment and dormitory finder.</p>
            </div>
        </div>
        <div class="carousel-item"
            style="background-image: url('images/apart2.jpg')">
            <div class="carousel-caption">
                <h5>Find the Perfect Space</h5>
                <p>Explore a variety of housing options tailored to meet the needs and preferences of students like you.</p>
            </div>
        </div>
        <div class="carousel-item"
            style="background-image: url('images/apart3.jpg')">
            <div class="carousel-caption">
                <h5>Your Student Living Experience</h5>
                <p>Make your college life memorable by choosing the right place to live. Home Finder is here to help you.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

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
                <div class="col-md-2 offset-md-2 mr-3">
                    <h4>Price Range (PHP)</h4>
                    <div class="row">
                        <div class="input-group">
                            <div class="slider-range"></div>
                        </div>
                        <div class="input-group mt-2">
                            <input type text" class="form-control form-control max" id="maxPrice">
                        </div>
                    </div>
                </div>

                <!-- Add the checkboxes for apartment type selection -->
                <div class="col-md-3">
                    <h4>Apartment Type</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="apartmentTypes[]" id="boardingType"
                            value="apartment">
                        <label class="form-check-label" for="boardingType">
                            Boarding House
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="apartmentTypes[]" id="bedspaceType"
                            value="transient">
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
                        $type_option = $row['type_option'];
                        $near = $row['near'];
                        $id = $row['id'];

                        // get all ratings in ratings table
                        $sql = "SELECT * FROM ratings WHERE establishment_id = '$id'";
                        $result2 = mysqli_query($conn, $sql);
                        $count2 = mysqli_num_rows($result2);

                        $total = 0;
                        $average = 0;

                        if ($count2 > 0) {
                            while ($row2 = mysqli_fetch_array($result2)) {
                                $ratings = $row2['ratings'];
                                $total += $ratings;
                            }

                            $average = $total / $count2;
                            // put to badge pill
                            $average = '<span class="badge badge-warning"><i class="fa fa-star"></i> ' . $average . ' / 5</span>';

                        } else {
                            $average = '<span class="badge badge-secondary"><i class="fa fa-star"></i> No Ratings yet</span>';
                        }

                        if ($type == 'short-term') {
                            $type = 'Short Term';
                        } else if ($type == 'long-term') {
                            $type = 'Long Term';
                        } else if ($type == 'short-long-term') {
                            $type = 'Short and Long Term';
                        } else {
                            $type = 'N/A';
                        }

                        if ($type_option == 'transient') {
                            $type_option = 'Transient';
                        } else if ($type_option == 'apartment') {
                            $type_option = 'Apartment';
                        } else if ($type_option == 'dormitory') {
                            $type_option = 'Dormitory';
                        } else if ($type_option == 'bedspace') {
                            $type_option = 'Bedspace';
                        } else if ($type_option == 'boarding') {
                            $type_option = 'Boarding House';
                        } else {
                            $type_option = 'N/A';
                        }

                        if ($near == 'yes') {
                            $near = '<span class="badge badge-success">Near Universities</span>';
                        } else {
                            $near = '';
                        }

                        // convert the price to int
                        $price = intval($price);

                        $id = $row['id']; // Assuming 'id' is the primary key column in your database
                        ?>
                        <div class="col-md-3 mb-4 apartment" style="min-height: 300px;">
                            <!-- Add the 'apartment' class here and set a fixed min-height -->
                            <div class="card apartment">
                                <img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>"
                                    style="height: 200px;">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- For name here -->
                                        <div class="col-12">
                                            <h4 class="card-title name">
                                                <?php echo $name; ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Add icon here -->
                                            <i class="fa fa-building"></i>
                                            <?php echo $type; ?>
                                        </div>
                                        <div class="col-md-6">
                                            <!--Add for type_option here with icon -->
                                            <i class="fa fa-users"></i>
                                            <div class="type">
                                                <?php echo $type_option; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 address">
                                            <!-- Add icon here -->
                                            <i class="fa fa-map-marker"></i>
                                            <?php echo $address; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Add the price here -->
                                            ₱</i>
                                            <?php echo $price; ?> / month
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Add span badge indicate is near univs or not -->
                                            <?php echo $near; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- display the ratings here use star-->
                                        <div class="col-12" id="rating">
                                            <?php echo $average ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="viewRooms.php?id=<?php echo $id; ?>" class="btn btn-block btn-success">View
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

    <!-- Add modal for user name  -->


</div>