<?Php 
session_start();

include("db.php"); ?>

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
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<style>
.reviews {
    padding: 4rem 2rem;
    background-color: #f9f9f9;
}

.reviews .heading {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: #333;
}

.reviews .heading span {
    color: #13b1cd;
}

.review-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.review-grid .box {
    background: #fff;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    text-align: center;
}

.review-grid .box img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 1rem;
}

.review-grid .box .content p {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 1rem;
}

.review-grid .box h3 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.review-grid .stars i {
    color: gold;
    margin: 0 2px;
}
</style>

</head>
<body>
    
<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="Image/images2.png" class="logo"> <span>Country</span>MADE</a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#vehicles">Men's</a>
        <a href="#services">Women's</a>
        <a href="#reviews">reviews</a>
        <a href="#contact">contact</a>
    </nav>

    <div id="login-btn">
        <a href="login.php"><button class="btn"> User login</button></a>
        <i class="far fa-user"></i>
    </div>

    <div id="login-btn">
       <a href="adminlogin.php"><button class="btn"> Admin login</button></a>
        <i class="far fa-user"></i>
    </div>

</header> 


<section class="home" id="home">

    <h3 data-speed="-2" class="home-parallax">FIND YOUR FASION</h3>

    
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 6</div>
  <img src="Image/fam.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 6</div>
  <img src="Image/me1.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 6</div>
  <img src="Image/me2.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">4 / 6</div>
  <img src="Image/me3.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">5 / 6</div>
  <img src="Image/me4.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Three</div>
</div>
<div class="mySlides fade">
  <div class="numbertext">6 / 6</div>
  <img src="Image/me5.jpg" style="width:1000px;height:520px;">
  <div class="text">Caption Three</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span>
</div>

    <a data-speed="7" href="#" class="btn home-parallax">Explore The Fasion</a>

</section>




<section class="icons-container">

    <div class="icons">
        <i class="fas fa-home"></i>
        <div class="content">
            <h3>150+</h3>
            <p>branches</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-car"></i>
        <div class="content">
            <h3>477000+</h3>
            <p>Products</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-users"></i>
        <div class="content">
            <h3>320+</h3>
            <p>Happy Customers</p>
        </div>
    </div>

    

</section>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car";

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

<section class="vehicles" id="vehicles">
    <h1 class="heading">Explore <span>Now</span></h1>
    <div class="swiper vehicles-slider">
       <div class="swiper-wrapper">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="swiper-slide box">
                        <img src="Image/?php echo $row['car_image']; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row['car_name']; ?></h3>
                            <div class="price"> <span>Price: </span> <?php echo '&#8377;' . $row['price']; ?> </div>
                            <p>
                                <?php echo $row['brand']; ?>
                                <span class="fas fa-circle"></span> Automatic
                                <span class="fas fa-circle"></span> Petrol
                            </p>
                            <a href="/cars website/Available Car Checkout/A Checkout.php?id=<?php echo $row['id']; ?>" class="btn">Buy Now</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No cars available.";
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>



<?php



 
// Fetch cars from the database
$sql1 = "SELECT * FROM services";
$result1 = $conn->query($sql1);
?>

 <!---<section class="vehicles" id="services">
    <h1 class="heading">Car <span>Services</span></h1>
    <div class="swiper vehicles-slider">
        <div class="swiper-wrapper">
            <?php
            if ($result1->num_rows > 0) {
                // Output data of each row
                while ($row1 = $result1->fetch_assoc()) {
            ?>
                    <div class="swiper-slide box">
                        <img src="image/<?php echo $row1['service_image']; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row1['service_name']; ?></h3>
                            <div class="price"> <span>Price Starting From </span> <?php echo '&#8377;' . $row1['price']; ?> </div>
                            <p>
                                <?php echo $row1['info']; ?>
                                
                            </p>
                            <a href="login.php" class="btn">Book Now</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No cars available.";
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>




<?php




// Fetch cars from the database
$sql2 = "SELECT * FROM cars";
$result2 = $conn->query($sql2);
?>

<section class="vehicles" id="featured">
    <h1 class="heading">Rental <span>Cars</span></h1>
    <div class="swiper vehicles-slider">
        <div class="swiper-wrapper">
            <?php
            if ($result2->num_rows > 0) {
                // Output data of each row
                while ($row2 = $result2->fetch_assoc()) {
            ?>
                    <div class="swiper-slide box">
                        <img src="image/<?php echo $row2['car_image']; ?>" alt="">
                        <div class="content">
                            <h3><?php echo $row2['car_name']; ?></h3>
                            <div class="price"> <span>Price: </span> <?php echo '&#8377;' . $row2['price_per_day']; ?> </div>
                            <p>
                                <?php echo $row2['brand']; ?>
                                
                            </p>
                            <a href="login.php" class="btn">Book Now</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "No cars available.";
            }
            ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<?php
$conn->close();
?>--->




<section class="reviews" id="reviews">

    <h1 class="heading"> client's <span>review</span> </h1>

    <div class="review-grid">

        <div class="box">
            <img src="image/Kushal .jpg" alt="Kushal">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Kushal N</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="image/Shashank R.jpg" alt="Shashank">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Shashank R</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="image/DAcchu.jpg" alt="Darshan">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Darshan P</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="image/Vg.jpg" alt="Likhith">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Likhith VG</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="image/Raki.jpg" alt="Rakesh">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Rakesh R</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="image/bv.png" alt="Shashank BV">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Shashank BV</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
        <div class="box">
            <img src="image/ranga.png" alt="Ranga">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Ranganath P</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
        <div class="box">
            <img src="image/soma.png" alt="Soma">
            <div class="content">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam incidunt quod praesentium iusto id autem possimus assumenda at ut saepe.</p>
                <h3>Somashekar</h3>
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>

    </div>

</section>


<section class="contact" id="contact">

    <h1 class="heading"><span>contact</span> us</h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1632137920043!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

        <form action="">
            <h3>get in touch</h3>
            <input type="text" placeholder="your name" class="box">
            <input type="email" placeholder="your email" class="box">
            <input type="tel" placeholder="subject" class="box">
            <textarea placeholder="your message" class="box" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

    </div>

</section>

<section class="footer" id="footer">

    <div class="box-container">


        <div class="box">
            <h3>quick links</h3>
            <a href="#"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> Men's </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> Women's </a>
            <a href="#"> <i class="fas fa-arrow-right"></i> featured </a>
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

    <div class="credit"> All Rights Reserved From 2015 By Country Country Made </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="JS/js.js"></script>

</body>
</html>