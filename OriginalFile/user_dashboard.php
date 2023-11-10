<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Finder Super_Admin</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style type="text/css">
        /* =========== Google Fonts ============ */
@import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

/* =============== Globals ============== */
* {
  font-family: "Ubuntu", sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

:root {
  --blue: #2a2185;
  --white: #fff;
  --gray: #f5f5f5;
  --black1: #222;
  --black2: #999;
}

body {
  min-height: 100vh;
  overflow-x: hidden;
}

.container {
  position: relative;
  width: 100%;
}

/* =============== Navigation ================ */
.navigation {
  position: fixed;
  width: 300px;
  height: 100%;
  background: var(--blue);
  border-left: 10px solid var(--blue);
  transition: 0.5s;
  overflow: hidden;
}
.navigation.active {
  width: 80px;
}

.navigation ul {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

.navigation ul li {
  position: relative;
  width: 100%;
  list-style: none;
  border-top-left-radius: 30px;
  border-bottom-left-radius: 30px;
}

.navigation ul li:hover,
.navigation ul li.hovered {
  background-color: var(--white);
}

.navigation ul li:nth-child(1) {
  margin-bottom: 40px;
  pointer-events: none;
}

.navigation ul li a {
  position: relative;
  display: block;
  width: 100%;
  display: flex;
  text-decoration: none;
  color: var(--white);
}
.navigation ul li:hover a,
.navigation ul li.hovered a {
  color: var(--blue);
}

.navigation ul li a .icon {
  position: relative;
  display: block;
  min-width: 60px;
  height: 60px;
  line-height: 75px;
  text-align: center;
}
.navigation ul li a .icon ion-icon {
  font-size: 1.75rem;
}

.navigation ul li a .title {
  position: relative;
  display: block;
  padding: 0 10px;
  height: 60px;
  line-height: 60px;
  text-align: start;
  white-space: nowrap;
}

/* --------- curve outside ---------- */
.navigation ul li:hover a::before,
.navigation ul li.hovered a::before {
  content: "";
  position: absolute;
  right: 0;
  top: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px 35px 0 10px var(--white);
  pointer-events: none;
}
.navigation ul li:hover a::after,
.navigation ul li.hovered a::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -50px;
  width: 50px;
  height: 50px;
  background-color: transparent;
  border-radius: 50%;
  box-shadow: 35px -35px 0 10px var(--white);
  pointer-events: none;
}

/* ===================== Main ===================== */
.main {
  position: absolute;
  width: calc(100% - 300px);
  left: 300px;
  min-height: 100vh;
  background: var(--white);
  transition: 0.5s;
}
.main.active {
  width: calc(100% - 80px);
  left: 80px;
}

.topbar {
  width: 100%;
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 10px;
}

.toggle {
  position: relative;
  width: 60px;
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2.5rem;
  cursor: pointer;
}

.search {
  position: relative;
  width: 400px;
  margin: 0 10px;
}

.search label {
  position: relative;
  width: 100%;
}

.search label input {
  width: 100%;
  height: 40px;
  border-radius: 40px;
  padding: 5px 20px;
  padding-left: 35px;
  font-size: 18px;
  outline: none;
  border: 1px solid var(--black2);
}

.search label ion-icon {
  position: absolute;
  top: 0;
  left: 10px;
  font-size: 1.2rem;
}

.user {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
  cursor: pointer;
}

.user img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* ======================= Cards ====================== */
.cardBox {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 30px;
}

.cardBox .card {
  position: relative;
  background: var(--white);
  padding: 30px;
  border-radius: 20px;
  display: flex;
  justify-content: space-between;
  cursor: pointer;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
  position: relative;
  font-weight: 500;
  font-size: 2.5rem;
  color: var(--blue);
}

.cardBox .card .cardName {
  color: var(--black2);
  font-size: 1.1rem;
  margin-top: 5px;
}

.cardBox .card .iconBx {
  font-size: 3.5rem;
  color: var(--black2);
}

.cardBox .card:hover {
  background: var(--blue);
}
.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
  color: var(--white);
}

/* ================== Order Details List ============== */
.details {
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 2fr 1fr;
  grid-gap: 30px;
  /* margin-top: 10px; */
}

.details .recentOrders {
  position: relative;
  display: grid;
  min-height: 500px;
  background: var(--white);
  padding: 20px;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}

.details .cardHeader {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
}
.cardHeader h2 {
  font-weight: 600;
  color: var(--blue);
}
.cardHeader .btn {
  position: relative;
  padding: 5px 10px;
  background: var(--blue);
  text-decoration: none;
  color: var(--white);
  border-radius: 6px;
}

.details table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}
.details table thead td {
  font-weight: 600;
}
.details .recentOrders table tr {
  color: var(--black1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.details .recentOrders table tr:last-child {
  border-bottom: none;
}
.details .recentOrders table tbody tr:hover {
  background: var(--blue);
  color: var(--white);
}
.details .recentOrders table tr td {
  padding: 10px;
}
.details .recentOrders table tr td:last-child {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(2) {
  text-align: end;
}
.details .recentOrders table tr td:nth-child(3) {
  text-align: center;
}
.status.delivered {
  padding: 2px 4px;
  background: #8de02c;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.pending {
  padding: 2px 4px;
  background: #e9b10a;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.return {
  padding: 2px 4px;
  background: #f00;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}
.status.inProgress {
  padding: 2px 4px;
  background: #1795ce;
  color: var(--white);
  border-radius: 4px;
  font-size: 14px;
  font-weight: 500;
}

.recentCustomers {
  position: relative;
  display: grid;
  min-height: 500px;
  padding: 20px;
  background: var(--white);
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
}
.recentCustomers .imgBx {
  position: relative;
  width: 40px;
  height: 40px;
  border-radius: 50px;
  overflow: hidden;
}
.recentCustomers .imgBx img {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.recentCustomers table tr td {
  padding: 12px 10px;
}
.recentCustomers table tr td h4 {
  font-size: 16px;
  font-weight: 500;
  line-height: 1.2rem;
}
.recentCustomers table tr td h4 span {
  font-size: 14px;
  color: var(--black2);
}
.recentCustomers table tr:hover {
  background: var(--blue);
  color: var(--white);
}
.recentCustomers table tr:hover td h4 span {
  color: var(--white);
}

/* ====================== Responsive Design ========================== */
@media (max-width: 991px) {
  .navigation {
    left: -300px;
  }
  .navigation.active {
    width: 300px;
    left: 0;
  }
  .main {
    width: 100%;
    left: 0;
  }
  .main.active {
    left: 300px;
  }
  .cardBox {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .details {
    grid-template-columns: 1fr;
  }
  .recentOrders {
    overflow-x: auto;
  }
  .status.inProgress {
    white-space: nowrap;
  }
}

@media (max-width: 480px) {
  .cardBox {
    grid-template-columns: repeat(1, 1fr);
  }
  .cardHeader h2 {
    font-size: 20px;
  }
  .user {
    min-width: 40px;
  }
  .navigation {
    width: 100%;
    left: -100%;
    z-index: 1000;
  }
  .navigation.active {
    width: 100%;
    left: 0;
  }
  .toggle {
    z-index: 10001;
  }
  .main.active .toggle {
    color: #fff;
    position: fixed;
    right: 0;
    left: initial;
  }
}

    </style>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Home Finder</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <?php
// Include your database connection file (e.g., 'connection.php')
include 'connection.php';

// Check if an action is specified (update, delete, or change status)
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'update') {
        // Handle update action
        if (isset($_POST['update'])) {
            // Get the updated values from the form
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];

            // Perform the update query (adjust based on your database structure)
            $updateQuery = "UPDATE account_establishment SET name='$name', price='$price' WHERE id=$id";
            if (mysqli_query($con, $updateQuery)) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . mysqli_error($con);
            }
        }

        // Display a form to update the selected record
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($con, "SELECT * FROM account_establishment WHERE id=$id");
            if ($row = mysqli_fetch_array($result)) {
                echo '<form method="post">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<label for="name">Name:</label>';
                echo '<input type="text" id="name" name="name" value="' . $row['name'] . '"><br>';
                echo '<label for="price">Price:</label>';
                echo '<input type="text" id="price" name="price" value="' . $row['price'] . '"><br>';
                echo '<input type="submit" name="update" value="Update">';
                echo '</form>';
            }
        }
    } elseif ($action === 'delete') {
        // Handle delete action
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Perform the delete query (adjust based on your database structure)
            $deleteQuery = "DELETE FROM account_establishment WHERE id=$id";
            if (mysqli_query($con, $deleteQuery)) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . mysqli_error($con);
            }
        }
    } elseif ($action === 'changestatus') {
        // Handle change status action
        if (isset($_GET['id']) && isset($_GET['status'])) {
            $id = $_GET['id'];
            $newStatus = $_GET['status'];

            // Perform the update query to change status
            $updateStatusQuery = "UPDATE account_establishment SET status='$newStatus' WHERE id=$id";
            if (mysqli_query($con, $updateStatusQuery)) {
                echo "Status changed successfully.";
            } else {
                echo "Error changing status: " . mysqli_error($con);
            }
        }
    }
}

// Query the database for all records in the 'account_establishment' table
$result = mysqli_query($con, "SELECT * FROM account_establishment");

// Check if there are any matching records
if (mysqli_num_rows($result) > 0) {
    echo '<html>
            <head>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    img {
                        max-width: 100px;
                    }
                    label {
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>';
    
    echo '<table>';
    echo '<tr><th>Name</th><th>Cover Photo</th><th>Price</th><th>Status</th><th>Actions</th></tr>';

    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['cover_photo'];
        $price = $row['price'];
        $status = $row['status'];

        // Output the record details in a table row
        echo '<tr>';
        echo '<td>' . $name . '</td>';
        echo '<td><img src="' . $image . '" alt="Cover Photo"></td>';
        echo '<td>' . $price . '</td>';
        echo '<td>' . $status . '</td>';
        echo '<td>';
        echo '<a href="?action=update&id=' . $id . '">Update</a> ';
        echo '<a href="?action=delete&id=' . $id . '">Delete</a> ';
        
        // Add buttons to change status
        echo '<a href="?action=changestatus&id=' . $id . '&status=approved">Approve</a> ';
        echo '<a href="?action=changestatus&id=' . $id . '&status=pending">Pending</a> ';
        echo '<a href="?action=changestatus&id=' . $id . '&status=denied">Deny</a>';
        
        echo '</td>';
        echo '</tr>';
    }

    echo '</table></body></html>';
} else {
    echo 'No records found.';
}

// Close the database connection
mysqli_close($con);
?>


                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
        // add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

    </script>
</body>

</html>
