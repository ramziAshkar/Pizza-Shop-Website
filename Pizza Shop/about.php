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
    <html>
        <head>
            <title>Pizza Shop</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script src="js/about.js"></script>
            <link href="css/main.css" rel="stylesheet">
            <link href="css/about.css" rel="stylesheet">

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
        <section id="about" class="about">

            <h1 class="heading" > ABOUT US <span>Serving Since 1977</span></h1>

            <br>

            <div class="row">
                <div class="image">
                    <img id="img1" src="images/about/photo1.avif" class="wobble-hor-bottom">
                    <img id="img2" src="images/about/photo2.avif" class="wobble-hor-bottom">
                    <img id="img3" src="images/about/photo3.avif" class="wobble-hor-bottom">
                    <img id="img4" src="images/about/photo4.avif" class="wobble-hor-bottom">
                    <img id="img5" src="images/about/photo5.avif" class="wobble-hor-bottom">
                    <img id="img6" src="images/about/photo6.avif" class="wobble-hor-bottom">
                    <img id="img7" src="images/about/photo7.avif" class="wobble-hor-bottom">
                    <img id="img8" src="images/about/photo8.avif" class="wobble-hor-bottom">
                </div>

                <div class="content">
                    <h3 class="title">Our story</h3>
                    <p>Antioch Pizza has been serving Antioch, Illinois since 1977.
                        It all started from a recipe shared by friends. The result is a pizzeria that has provided local customers with
                        delicious meals since the doors opened. We continually strive to make the freshest pizza with natural
                        ingredients while not skimping on portions.  Being the leading pizzeria in Antioch, we love keeping our customers
                        happy with friendly service and top quality products. We are famous for our double-decker pizza that is loaded with melted
                        mozzarella cheese and fresh toppings. Our crispy thin crust is popular among our regular customers. Introducing our “Chicago Style Stuffed
                        Pizza” in 2011, we continue to explore menu options while maintaining the same great taste and quality our customers expect. </p>

                    <h3 class="title">Our Vision</h3>
                    <p>We have been feeding Antioch and the surrounding communities for forty years. Menu items include our homemade
                        Italian Beef Sandwich that is made daily. We load it with a ton of beef and top it with melted mozzarella and
                        roasted sweet peppers. This combination of flavors keeps our customers coming back for more.
                    </p>

                    <div class="icons-container">

                        <div class="icons">
                            <i class="bi bi-patch-check abt_icon"></i>
                            <h3>Fresh Ingredients</h3>
                        </div>
                        <div class="icons">
                            <i class="bi bi-truck abt_icon"></i>
                            <h3>Free Delivery</h3>
                        </div>
                        <div class="icons">
                            <i class="bi bi-wifi abt_icon"></i>
                            <h3>Free WIFI</h3>
                        </div>

                    </div>
                </div>
        </div>


        </section>

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
