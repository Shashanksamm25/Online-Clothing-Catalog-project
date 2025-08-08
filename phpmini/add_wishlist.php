<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeans";

// DB Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulate user login (in real case use $_SESSION['user_id'])
$user_id = $_SESSION['user_id'] ?? 1;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_wishlist'])) {
    $cloth_id = $_POST['cloth_id'];

    // Check if already added
    $check = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND cloth_id = ?");
    $check->bind_param("ii", $user_id, $cloth_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO wishlist (user_id, cloth_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $user_id, $cloth_id);
        if ($stmt->execute()) {
            echo "<script>alert('Added to wishlist'); window.history.back();</script>";
        } else {
            echo "<script>alert('Error adding to wishlist'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Already in wishlist'); window.history.back();</script>";
    }

    $check->close();
    $stmt->close();
}

$conn->close();
?>
