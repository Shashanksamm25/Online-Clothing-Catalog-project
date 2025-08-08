

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
<header class="header">

<div id="menu-btn" class="fas fa-bars"></div>

<a href="#" class="logo"> <span>Country </span>Made</a>

<nav class="navbar">
    <a href="admindashboard.php">Home</a>
    <div class="dropdown">
            <a href="">Men's</a>
            <div class="dropdown-content">
               <ul><li> <a href="Add_Cloth's.php">Add Cloth's</a></li>
              <!--- <li> <a href="manage_salecar.php">Manage Cloth's</a></li>
                <li><a href="view_request.php">View Requests</a></li>--->
</ul>
            </div>
        </div>  
    <div class="dropdown">
            <a href="">Women's</a>
            <div class="dropdown-content">
               <ul><li> <a href="add_womens.php">Add Cloth's</a></li>
            <!---   <li> <a href="manage_service.php">Manage Cloth's</a></li>
                <li><a href="view_srequest.php">View Requests</a></li>-->
</ul>
            </div>
        </div> 
   <!--- <div class="dropdown">
            <a href="">Kid's</a>
            <div class="dropdown-content">
               <ul><li> <a href="add_car.php">Add Cloth's</a></li>
               <li> <a href="manage_car.php">Manage Cloth's</a></li>
                <li><a href="view_booking.php">View Bookings</a></li>
</ul>
            </div>
        </div>    --->
    <a href="#reviews">reviews</a>
</nav>


<div id="login-btn">
   <a href="logout.php"><button class="btn">Logout</button></a>
    <i class="far fa-user"></i>
</div>

</header> 
    
    <!-- Your admin dashboard content goes here -->
   
    <section class="home" >
    <div class="admin-dashboard">
        <img src="Image/BD.png" alt="Dashboard Image">

    </div>
</section>
    <section class="footer" id="footer">

    <div class="box-container">


        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> Men's </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> Women's </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> features </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> reviews </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> contact </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#"> <i class="fas fa-envelope"></i> hellofreewebsitecode@gmail.com </a>
            <a href="#"> <i class="fas fa-map-marker-alt"></i> City - Country - 000000 </a>
        </div>

        <div class="box">
            <h3>Follow Us</h3>
            <a href="https://www.facebook.com/FreeWebsiteCode"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
        </div>

    </div>

    <div class="credit"> All Rights Reserved From 2015 By Country Made </div>

</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>
    <!-- Include your custom scripts here -->

</body>
</html>
