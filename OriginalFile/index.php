<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home Finder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="home.css">

  <style>
    /* Add CSS for the price range input */
    .price-filter {
      width: 20%;
    }
  </style>
  
  <header>
    <img class="logo" src="homefinderlogo2.png" alt="Logo">
    <form class="form">
      <input type="text" name="" id="search-item" placeholder="search all apartments" oninput="searchApartments()">
      <i class="search-icon">🔍</i>
    </form>
    <!-- Price Range Input -->
    <!-- Label for the Price Range Input -->
<input type="range" class="price-filter" id="priceRange" min="500" max="10000" step="100" oninput="updatePriceLabel()" list="priceList">
<span id="priceLabel">Price: 0 PHP</span>

<datalist id="priceList">
  <option value="1000"></option>
  <hr class="strong-line">
  <option value="1500"></option>
  <hr class="strong-line">
  <option value="2000"></option>
  <hr class="strong-line">
  <option value="2500"></option>
  <hr class="strong-line">
  <option value="3000"></option>
  <hr class="strong-line">
  <option value="3500"></option>
  <hr class="strong-line">
  <option value="4000"></option>
  <hr class="strong-line">
  <option value="4500"></option>
  <hr class="strong-line">
  <option value="5000"></option>
  <hr class="strong-line">
  <option value="5500"></option>
  <hr class="strong-line">
  <option value="6000"></option>
  <hr class="strong-line">
  <option value="6500"></option>
  <hr class="strong-line">
  <option value="7000"></option>
  <hr class="strong-line">
  <option value="7500"></option>
  <hr class="strong-line">
  <option value="8000"></option>
  <hr class="strong-line">
  <option value="8500"></option>
  <hr class="strong-line">
  <option value="9000"></option>
  <hr class="strong-line">
  <option value="9500"></option>
  <hr class="strong-line">
  <option value="10000"></option>
  <!-- You can continue this pattern or add more specific values as needed -->
</datalist>



     <button class="btn btn-primary" onclick="showAllApartments()">Show All Apartments</button>
    <!-- Your existing header content -->
    <div class="menu-container">
      <input type="checkbox" id="toggleMenu">
      <label for = "toggleMenu" class="hamburger">&#9776;</label>
      <nav class="menu">
        <!-- ... Your existing menu items ... -->
        <a href="login.php" class="btn btn-primary" id="loginBtn">Login</a>
        <a href="apply_apartment.php" class="btn btn-secondary" id="signupBtn">Apply Apartment</a>
        <a href="logout.php" class="btn btn-secondary" id="logout">Logout</a>
      </nav>
    </div>
  </header>
</head>
<body>
  <div class="" id="apartment-container">
    <div class="row" id="apartment-list">
      <!-- PHP code for rendering apartments (unchanged) -->
      <?php
      include 'connection.php';

      $result = mysqli_query($con, "SELECT * FROM account_establishment WHERE status = 'approved'");
      $count = mysqli_num_rows($result);

      if ($count > 0) {
          while ($row = mysqli_fetch_array($result)) {
              $image = $row['cover_photo'];
              $price = $row['price'];
              $name = $row['name'];
              $address = $row['address'];
              $id = $row['id']; // Assuming 'id' is the primary key column in your database

              // Check if the URL is valid
             
                  ?>
                  <div class="col-md-3 mb-4 apartment" style="min-height: 300px;"> <!-- Add the 'apartment' class here and set a fixed min-height -->
                      <div class="card" id='<?php echo $row['id']?>' onclick="tryajax(this.id)">
                          <img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" style="height: 200px;">
                          <div class="card-body">
                              <h5 class="card-title"><small><?php echo $name; ?></small></h5>
                              <p class="card-text"><?php echo $address; ?></p>
                              <p class="card-p"><?php echo $price; ?></p>
                          </div>
                      </div>
                  </div>
                  <?php
              }
          }
      ?>
    </div>
  </div>
  <script type="text/javascript">
        function tryajax(id){
            
            window.location.href='owner.php?GGWP=' + id;

            // $.post('dynamic.php', {id:id}, function(){
            // });
        }
    </script>

  <script>
    function searchApartments() {
      // Get the search input value
      const searchInput = document.getElementById("search-item").value.toLowerCase();
      const apartments = document.getElementsByClassName("apartment"); // Select by the 'apartment' class

      // Loop through apartments and hide/show them based on the search query
      for (let i = 0; i < apartments.length; i++) {
        const apartmentName = apartments[i].getElementsByClassName("card-title")[0].innerText.toLowerCase();

        if (apartmentName.includes(searchInput)) {
          apartments[i].style.display = "block";
        } else {
          apartments[i].style.display = "none";
        }
      }
    }

    function updatePriceLabel() {
      const priceRange = document.getElementById("priceRange").value;
      const priceLabel = document.getElementById("priceLabel");
      priceLabel.innerText = "Price: " + priceRange + " PHP";
    }

  function filterByPrice() {
    const priceRange = document.getElementById("priceRange").value;
    const apartments = document.getElementsByClassName("apartment");

    for (let i = 0; i < apartments.length; i++) {
      const apartmentPrice = parseFloat(apartments[i].getElementsByClassName("card-p")[0].innerText);

      if (apartmentPrice == priceRange) {
        apartments[i].style.display = "block";
      } else {
        apartments[i].style.display = "none";
      }
    }
  }

  // Add an event listener to the price range input to update the filter automatically
  document.getElementById("priceRange").addEventListener("input", filterByPrice);

  // Initial filter when the page loads
  filterByPrice();

  function showAllApartments() {
      // Reset the price range input to its default value if needed
      document.getElementById("priceRange").value = 0;
      // Show all apartments
      const apartments = document.getElementsByClassName("apartment");
      for (let i = 0; i < apartments.length; i++) {
        apartments[i].style.display = "block";
      }
      // Update the price label text to "Price: 0 PHP" (or adjust it as needed)
      updatePriceLabel();
    }

    // Call the showAllApartments function to display all apartments by default
    showAllApartments();

  </script>

</body>
</html>