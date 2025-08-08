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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST["car_name"];
    $car_image = $_FILES["car_image"]["name"];
    $brand = $_POST["brand"];
    $price_per_day = $_POST["price"];
    $fuel = $_POST["fuel_type"];
    $info = $_POST["info"];

    // Upload image
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($car_image);

    if (move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file)) {
        // Insert into database
        $sql = "INSERT INTO carsale (car_name, car_image, brand, fuel_type, info, price)
                VALUES ('$car_name', '$car_image', '$brand', '$fuel', '$info', '$price_per_day')";

        if ($conn->query($sql) === TRUE) {
            echo '
                <h2 style="text-align:center; color:green;">Car/Cloth added successfully!</h2>
                <div style="text-align:center; margin-top:20px;">
                    <video width="640" height="360" controls autoplay>
                        <source src="videos/success.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            ';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Image upload failed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Cloth</title>
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
        .btn {
            padding: 10px;
            background-color: #13b1cd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0e91a3;
        }
		
    </style>
</head>
<body>
<nav class="navbar">
        <a href="admindashboard.php">Home</a>
        </nav>
<div class="admin-dashboard">
    <form action="" method="post" class="car-form" enctype="multipart/form-data">
        <h1 style="font-size:30px;">Add Cloth</h1>

        <input type="text" name="car_name" placeholder="Cloth name" class="input-field" required>
        <input type="file" name="car_image" accept="Image/*" class="input-field" required>
        <input type="text" name="brand" placeholder="Brand" class="input-field" required>

        <select name="fuel_type" class="input-field" required>
            <option value="">Select Size</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XLL">XLL</option>
            <option value="XLLL">XLLL</option>
        </select>
        <input type="number" name="price" placeholder="Price (₹)" class="input-field" required>
        <textarea name="info" placeholder="Additional Information" class="input-field"></textarea>

        <input type="submit" value="Add Car" class="btn">
    </form>
</div>

</body>
</html>
