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

// OPTIONAL: Run once to make sure 'size' column exists
$conn->query("ALTER TABLE womens ADD COLUMN IF NOT EXISTS size VARCHAR(10)");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_name = htmlspecialchars($_POST["service"]);
    $size = htmlspecialchars($_POST["size"]);
    $info = htmlspecialchars($_POST["info"]);
    $price = $_POST["price"];

    $service_image = $_FILES["car_image"]["name"];
    $image_tmp = $_FILES["car_image"]["tmp_name"];
    $image_type = $_FILES["car_image"]["type"];

    // Validate image type
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
    if (!in_array($image_type, $allowed_types)) {
        die("Only JPG, JPEG, and PNG files are allowed.");
    }

    // Upload directory
    $target_dir = "Uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($service_image);
    move_uploaded_file($image_tmp, $target_file);

    // Insert using prepared statement
    $stmt = $conn->prepare("INSERT INTO womens (service_name, service_image, size, info, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $service_name, $service_image, $size, $info, $price);

    if ($stmt->execute()) {
        echo "<script>
            alert('Service added successfully');
            window.location='women\'s_view.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Cloths - Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .admin-dashboard {
            max-width: 500px;
            margin: auto;
            padding: 20px;
        }

        .car-form {
            display: flex;
            flex-direction: column;
        }

        .input-field {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="#" class="logo"> <span>Country</span>Made</a>
    <nav class="navbar">
        <a href="admindashboard.php">Home</a>
        <div class="dropdown">
            <a href="#">men's</a>
            <div class="dropdown-content">
                <ul>
                    <li><a href="add_salecar.php">Add Cloths</a></li>
                   <!--- <li><a href="manage_salecar.php">Manage Cloths</a></li>--->
                    <!--<li><a href="view_booking.php">View Bookings</a></li>-->
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">Women's</a>
            <div class="dropdown-content">
                <ul>
                    <li><a href="add_service.php">Add Cloths</a></li>
                   <!-- <li><a href="manage_service.php">Manage Cloths</a></li>
                    <li><a href="view_booking.php">View Bookings</a></li>-->
                </ul>
            </div>
        </div>
        <!--<div class="dropdown">
            <a href="#">Rental Cars</a>
            <div class="dropdown-content">
                <ul>
                    <li><a href="add_car.php">Add Cloths</a></li>
                    <li><a href="manage_car.php">Manage Cloths</a></li>
                    <li><a href="view_booking.php">View Bookings</a></li>
                </ul>
            </div>
        </div>-->
        <a href="#reviews">Reviews</a>
    </nav>
    <div id="login-btn">
        <a href="logout.php"><button class="btn">Logout</button></a>
        <i class="far fa-user"></i>
    </div>
</header>

<section class="home">
    <div class="admin-dashboard">
        <form action="" method="post" class="car-form" enctype="multipart/form-data">
            <h1 style="font-size:30px;">Add Cloths</h1>
            <input type="text" name="service" placeholder="Model name" class="input-field" required>
            <input type="file" name="car_image" accept="image/*" class="input-field" required>
            <select name="size" class="input-field" required>
                <option value="">Select Size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XLL">XLL</option>
                <option value="XLLL">XLLL</option>
            </select>
            <input type="text" name="info" placeholder="Info" class="input-field" required>
            <input type="number" name="price" placeholder="Price ( ₹ )" class="input-field" required>
            <input type="submit" value="Add Service" class="btn">
        </form>
    </div>
</section>

<section class="footer" id="footer">
    <div class="box-container">
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#"><i class="fas fa-arrow-right"></i> Home</a>
            <a href="#"><i class="fas fa-arrow-right"></i> men's</a>
            <a href="#"><i class="fas fa-arrow-right"></i> Women's</a>
            <a href="#"><i class="fas fa-arrow-right"></i> Featured</a>
            <a href="#"><i class="fas fa-arrow-right"></i> Reviews</a>
            <a href="#"><i class="fas fa-arrow-right"></i> Contact</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="#"><i class="fas fa-phone"></i> +123-456-7890</a>
            <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
            <a href="#"><i class="fas fa-envelope"></i> hellofreewebsitecode@gmail.com</a>
            <a href="#"><i class="fas fa-map-marker-alt"></i> City - Country - 000000</a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a>
            <a href="#"><i class="fab fa-pinterest"></i> Pinterest</a>
        </div>
    </div>
    <div class="credit">All Rights Reserved From 2015 By Country Made</div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
