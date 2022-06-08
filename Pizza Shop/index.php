<?php
session_start();
?>
<!DOCTYPE html>
<?php
$get="";
if(isset($_SESSION["username"] )){
    $get=$_SESSION["username"];
}
else {
    $get="";
}
?>
<?php
$out="";
$empty="";
if(isset($_SESSION["username"] )){
    $conn = new mysqli('localhost', 'root', '', 'pizza');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['submit_review'])){
        $review=$_POST['review'];
        $username=$_SESSION["username"];
        $sql = "INSERT INTO reviews ( username, review)
        VALUES ('$username','$review')";
        if (mysqli_query($conn, $sql)) {
            $out="
            reviewsform.classList.remove('active');
            ";
            }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    }
    mysqli_close($conn);
}
else{
    $empty="
    $('#reviewadder').empty();
    $('#reviewadder').css({'height': '3cm', 'padding': '0.5cm'});
    var excute= '<p>Please Sign In First</p>';
    $('#reviewadder').append(excute);
    $('#reviewadder').children('p').css({ 'color': 'rgb(122, 15, 15)', 'font-size': '0.5cm', 'text-align': 'center', 'padding': '0.5cm'});
    ";
}
?>

<html>
        <head>
            <title>Pizza Shop</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
            <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <link href="css/main.css" rel="stylesheet">
            <link href="css/home.css" rel="stylesheet">

            <script src="js/home.js"></script>

        </head>
        <body>
        <nav class="navbar-expand-lg navbar navbar-dark " style="background-color: rgb(122, 15, 15); ">
        <div class="container-xl">
            <a class="navbar-brand nav-item" href="#">
                <p id="STORE_LOGO">PIZZA SHOP</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-lg-auto">
                <a class="nav-item nav-link " href="index.php"><p class="nav_p">Home</p></a>
                <a class="nav-item nav-link " href="menu.php"><p class="nav_p">Our Menu</p></a>
                <a class="nav-item nav-link " href="about.php"><p class="nav_p">About Us</p></a>
                <a class="nav-item nav-link " href="ordered.php"><p class="nav_p">My Cart</p></a>

            </div>
            <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                <a href="signin.php" target="_blank" class="nav-item nav-link " title="Sign In" id="login-btn"><i class="bi bi-person-fill ic"></i><spam class="username"><?php echo $get;?></spam></a>
            </div>
            </div>
        </div>
        </nav>


        <div id="slideshow" style="width: 100%;">
                <img class="main_img" id="img1" src="images/home/big_img1.jpg" >
                <img class="main_img" id="img2" src="images/home/big_img2.jpg">
                <img class="main_img" id="img3" src="images/home/big_img3.jpg">
                <img class="main_img" id="img4" src="images/home/big_img4.jpg">
                <button class="btn button" id="left" >&#10094;</button>
                <button class="btn button" id="right">&#10095;</button>
        </div>
            <br>

        <section id="about" class="about">
            <div id="about_us">
                <h1 class="heading" > OUR STORY <span>Welcome To Our Pizza Shop</span></h1>
                <p class="para">Every business has an origin story worth telling, and usually, one that justifies why you even do business and have clients.
                Some centennial enterprises have pages of content that can fit in this section, while startups can tell the story of how the company was born, its challenges, and its vision for the future.
                Of course, you have a homepage and dedicated pages for your products, but summarizing your offerings on the About Us page is crucial to tie them in with brand values in your messaging.
                Highlight the benefits and showcase what you do (and why it is unique).</p>
            </div>
        </section>

        <section class="reviews" id="reviews">

            <h1 class="Reviews"><span id="heading">clients reviews</span></h1>

            <div class="swiper reviews-slider">
                <div class="swiper-wrapper" id="swiper">
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'pizza');
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql="SELECT * FROM reviews";
                    $result = $conn->query($sql);
                    if ($result->num_rows> 0) {
                        while($row = $result->fetch_assoc()) {
                            $nocom="";
                            echo "<div class='swiper-slide box' style='height:10cm;'>";
                            echo "<h3>";
                            echo $row["username"];
                            echo "</h3>";
                            echo "<p>";
                            echo $row["review"];
                            echo "</p>";
                            echo "</div>";
                        }
                    }
                    else{
                        $nocom="<h3 style='color:white;text-align:center; width: 100%; border: 1px solid white;padding:1cm; margin:1cm'> NO REVIEWS YET</h3>";
                    }
                    echo $nocom;
                    ?>
                </div>
            </div>


        <div class="addreview">
        <button class="btn btn-primary" id="addreview">Add Review</button>
        </div>


        <div id="add" class="reviews-container">
        <div id="close-review-btn" class="bi-x"></div>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="reviewadder" hidden method="post">

        <h3>Your Review</h3>

        <span>Review</span>
        <textarea name="review" class="box" placeholder="Enter your review" required rows="4" cols="50"></textarea>

        <input type="submit" name="submit_review" value="Post Review" class="btn btn-primary" id="postreview">

    </form>

    </div>

        </section>

        <script>
                <?php echo $out; ?>
                <?php echo $empty; ?>
            </script>

        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 footer-links ">
                        <h4>Open Hours</h4>
                        <ul>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Monday - Friday</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">8.00 AM - 8.00 PM</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">Saturday - Sunday</a></li>
                            <li><i class="fas fa-arrow-right"></i> <a href="#">2.00 PM - 8.00 PM</a></li>
                        </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links ">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="fas fa-arrow-right"></i> <a href="index.php">Home</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="menu.php">Our Menu</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="about.php">About Us</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="ordered.php">My Cart</a></li>

                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links ">
                            <h4>Extra Links</h4>
                            <ul>
                                <li><i class="fas fa-arrow-right"></i> <a href="#">account info</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="#">ordered items</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="#">privacy policy</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="#">payment methods</a></li>
                                <li><i class="fas fa-arrow-right"></i> <a href="#">our service</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>Downtown, St 130 <br> Beirut, Bt 535022<br> Lebanon <br><br> <span>Phone:</span> +961 123456<br> <span>Email:</span> pizzashop@gmail.com<br> </p>

                            <div class="social-links mt-3"> <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a> <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright"> © Copyright <strong><span>Pizza Shop</span></strong>. All Rights Reserved </div>
            </div>
        </footer>

    </body>
</html>
