<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="CSS/mstyle.css">

<?php
session_start();

// DB connection
$con = new mysqli("localhost", "root", "", "jeans");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// On form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT password FROM login WHERE username = ?");
    
    if ($stmt) {
        $stmt->bind_param("s", $username);
        $stmt->execute();

        // Use bind_result instead of get_result
        $stmt->bind_result($hashed_password);
        if ($stmt->fetch()) {
            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                exit();
            } else {
                header("Location: dashboard.php");
            }
        } else {
           echo '
            <img src="Image/jdbckjbc.gif" alt="Dashboard Image">
        ';
            
            $error_message = "Invalid username or password.";

        }

        $stmt->close();
    } else {
        $error_message = "Database query failed: " . $con->error;
    }
}
?>


</head>
<body>
    <div class="login-form-container">
    <span id="close-login-form" class="fas fa-times"></span>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h3>User Login</h3>
        <input type="text" name="username" placeholder="Username" class="box">
        <input type="password" name="password" placeholder="Password" class="box">
        <input type="submit" value="Login" class="btn">
        <?php
    
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>
        <p>Don't have an account? <a href="register.php">Sign UP</a></p>
    </form>
</div><br><br>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="script.js"></script>

</body>
</html>