<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/mstyle.css"></head>
<body>
        



<div class="login-form-container active" >
    <span  class="fas fa-times"></span>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3> Registration</h3>
        <input type="text" name="username" placeholder="Username" class="box">
        <input type="password" name="password" placeholder="Password" class="box">
        <input type="Email" name="Email" placeholder="E mail" class="box">
            <input type="submit" value="Register" class="btn">
        <p>Back to Home <a href="login.php"> Click Here</a> </p>
    </form>
</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jeans";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["Email"];
    $sql = "INSERT INTO login (username, password, email) VALUES ('$username','$password','$email')";
    if ($conn->query($sql) === TRUE) {
        // Registration success
        ?>
		<script type="text/javascript">
            window.alert(" Registration Successful");
            window.location="login.php";
            </script>
			<?php    } else {
        // Registration failed
        echo '<script>alert("Error: ' . $sql . '<br>' . $conn->error . '");</script>';
    }
    $conn->close();
}
?>