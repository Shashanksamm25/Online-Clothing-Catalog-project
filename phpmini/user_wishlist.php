<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeans";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulated user_id for demo (replace with $_SESSION['user_id'] in real use)
$user_id = $_SESSION['user_id'] ?? 1;

// Fetch wishlist items (JOIN with carsale to get cloth details)
$sql = "SELECT carsale.*, wishlist.id AS wishlist_id 
        FROM wishlist 
        JOIN carsale ON wishlist.cloth_id = carsale.id 
        WHERE wishlist.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Wishlist</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ccc;
        }

        img {
            max-width: 120px;
            height: auto;
        }

        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
        }

        .btn-remove:hover {
            background-color: #a00;
        }
    </style>
</head>
<body>

<h2>Your Wishlist</h2>
<nav class="navbar">
        <a href="admindashboard.php">Home</a>
    </nav>
<table>
    <thead>
        <tr>
            <th>Image</th>
            <th>Model</th>
            <th>Brand</th>
            <th>Size</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='image/" . $row['car_image'] . "'></td>";
                echo "<td>" . $row['car_name'] . "</td>";
                echo "<td>" . $row['brand'] . "</td>";
                echo "<td>" . $row['fuel_type'] . "</td>";
                echo "<td>₹ " . $row['price'] . "</td>";
                echo "<td>
                        <form method='POST' action='remove_wishlist.php'>
                            <input type='hidden' name='wishlist_id' value='" . $row['wishlist_id'] . "'>
                            <button type='submit' class='btn-remove'>Remove</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No items in your wishlist.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
