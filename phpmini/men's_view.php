<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeans";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cars from the database
$sql = "SELECT * FROM carsale";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cloths</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="CSS/style.css">
<style>
        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px; /* Adjust font size as needed */

        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td a {
            color: #007bff;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        .btn-edit {
            background-color: #28a745;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit:hover, .btn-delete:hover {
            opacity: 0.8;
        }
        .wishlist-btn {
    background: none;
    border: none;
    font-size: 16px;
    color: #007bff;
    cursor: pointer;
}

.wishlist-btn:hover {
    color: red;
}

    </style>
</head>
<body>
<header class="header">

<div id="menu-btn" class="fas fa-bars"></div>

<a href="#" class="logo"> <span>Country</span>Made</a>

<nav class="navbar">
    <a href="dashboard.php">Home</a>
    <!-- <div class="dropdown">
            <a href="">Usedcars</a>
            <div class="dropdown-content">
               <ul><li> <a href="add_salecar.php">Add Car</a></li>
               <li> <a href="manage_salecar.php">Manage Cars</a></li>
                <li><a href="view_request.php">View Requests</a></li>
</ul>
            </div>
        </div>   -->
        <a href="men's_view.php">Men's</a>
        <a href="women's_view.php">Women's </a>
        <!--<a href="kid's_view.php"> Kid's </a>-->
        <a href="user_wishlist.php">My Wishlist </a>

    <!-- <div class="dropdown">
            <a href="">services</a>
            <div class="dropdown-content">
               <ul><li> <a href="add_service.php">Add Service</a></li>
               <li> <a href="manage_service.php">Manage Service</a></li>
                <li><a href="view_srequest.php">View Requests</a></li>
</ul>
            </div>
        </div> 
    <div class="dropdown">
            <a href="">Rental Cars</a>
            <div class="dropdown-content">
               <ul><li> <a href="add_car.php">Add Car</a></li>
               <li> <a href="manage_car.php">Manage Cars</a></li>
                <li><a href="view_booking.php">View Bookings</a></li>
</ul>
            </div>
        </div>     -->
    <a href="add_review.php">reviews</a>
</nav>


<div id="login-btn">
   <a href="logout.php"><button class="btn">Logout</button></a>
    <i class="far fa-user"></i>
</div>

</header>
<section class="home">
    <div class="admin-dashboard">
        <h1>Cloths For Sale</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Cloth model</th>
                    <th>Brand</th>
                    <th>Size</th>
                    <th>Info</th>
                    <th>Price </th>
                    <th>Action</th> 
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td width='250px'><img  src='Uploads/" . $row["car_image"] . "'></td>";
                    echo "<td>" . $row["car_name"] . "</td>";
                    echo "<td>" . $row["brand"] . "</td>";
                    echo "<td>" . $row["fuel_type"] . "</td>";
                    echo "<td>" . $row["info"] . "</td>";
                    echo "<td> &#8377 " . $row["price"] . "</td>";
                    echo "<td>
        <form method='POST' action='add_wishlist.php' style='display:inline;'>
            <input type='hidden' name='cloth_id' value='" . $row["id"] . "'>
            <button type='submit' name='add_wishlist' class='wishlist-btn'>🤍 Add to Wishlist</button>
        </form>
      </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No cars found</td></tr>";
            }
            ?>
        </tbody>
        </table>
    </div>
</section>
<footer class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Men's</a>
            <a href="#">Women's</a>
            <a href="#">Featured</a>
            <a href="#">Reviews</a>
            <a href="#">Contact</a>
        </div>
        <div class="box">
            <h3>Contact Info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">+111-222-3333</a>
            <a href="#">hellofreewebsitecode@gmail.com</a>
            <a href="#">City - Country - 000000</a>
        </div>
        <div class="box">
            <h3>Follow Us</h3>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
            <a href="#">Linkedin</a>
            <a href="#">Pinterest</a>
        </div>
    </div>
    <div class="credit">All Rights Reserved From 2015 By Country Made</div>
</footer>
</body>
</html>

<?php
$conn->close(); 
?>
