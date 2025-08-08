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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wishlist_id'])) {
    $wishlist_id = $_POST['wishlist_id'];

    $stmt = $conn->prepare("DELETE FROM wishlist WHERE id = ?");
    $stmt->bind_param("i", $wishlist_id);
    if ($stmt->execute()) {
        echo "<script>alert('Removed from wishlist'); window.location.href='user_wishlist.php';</script>";
    } else {
        echo "<script>alert('Error removing item'); window.location.href='user_wishlist.php';</script>";
    }
}

$conn->close();
?>
