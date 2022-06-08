
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
    $conn= new mysqli("localhost", "root", "");
    if(!$conn){
    echo 'connection error: ' .mysqli_connect_error();
    }
    if ( !mysqli_select_db($conn, "pizza") )
            die( "Could not open test database" );

    $pizzaquery= "SELECT * FROM food WHERE type='pizza'";
    $dishesquery="SELECT * FROM food WHERE type='dishes'";
    $pizzaresults= mysqli_query($conn, $pizzaquery);
    $dishesresults= mysqli_query($conn, $dishesquery);
    $empty="";

if(!isset($_POST['quantity'])){
  $quantity="1";
}

    if(isset($_SESSION["username"]))
    {
      if(isset($_POST['quantity'])){
    $quantity=$_POST['quantity'];
    $total = bcmul($_POST["quantity"], $_POST["price"]);



    if(mysqli_query($conn, "INSERT INTO ordered(price, quantity, Description, total, image, user, Name) VALUES( '" .  $_POST['price'] ."' , '". $quantity ."', '". $_POST['txt'] . "', '". $total. "', '" .$_POST['image'] ."', '" .$_SESSION['username'] . "', '" .$_POST['title'] . "')")) {
    } else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
    }
  }
    }
    else{

      $empty="
      let ordersform = document.querySelector('.ordering-container');
      ordersform.css({display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255,255,255,.9);
      position: fixed;
      top: 0; right: -100%;
      z-index: 10000;
      height: 100%;
      width: 100%;})
      ordersform.active.css({right:0;})
      ordersform.classList.toggle('active');
      $('#ordering').removeAttr('hidden');
      $('#ordering').css({'height': '3cm', 'padding': '0.5cm'});
      var excute= '<p>Please Sign In First</p>';
      $('#ordering').append(excute);
      $('#ordering').children('p').css({ 'color': 'rgb(122, 15, 15)', 'font-size': '0.5cm', 'text-align': 'center', 'padding': '0.5cm'});
      ";
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script src="js/menu.js"></script>
            <link href="css/main.css" rel="stylesheet">
            <link href="css/menu.css" rel="stylesheet">


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
        <div id="about_us">
            <h1 class="heading" > OUR MENU <span>Enjoy Delicious Pizza</span></h1>
        </div>

        <br><br>

        <div id="dish_btns">
        <div class="center">
        <button type="button" class=" pizza_btn">Our Pizzas</button>
        <button type="button" class=" dish_btn">Our Dishes</button>
        </div>
        </div>

        <br><br>

        <div class="confirm">
                        <div id="back" class="confirm-back-btn bi-arrow-left-square-fill"></div>
                        <h3>Confirm</h3>
                        <p>Are you sure you want to buy this item?</p>
                        <div class="btns">
                            <button class="btn btn-primary" id="confirm-yes">Yes</button>
                            <button class="btn btn-primary" id="confirm-no">No</button>
                        </div>
                    </div>

                    <div class="yes" id="yes">
                      <form action="#container" method="post">

                        <div id="yes-back" class="confirm-back-btn bi-arrow-left-square-fill"></div>
                        <h3>Quantity:</h3>
                        <input class="qtty" name="quantity" type="number" placeholder="Enter quantity">
                        <div class="btns">
                            <button type="submit"  class="btn btn-primary" id="confirm-order">Order</button>
                        </div>
                      </form>

                    </div>


        <div id="pizzas">

        <main class="ccontainer" id="container">

            <div class="gallery-wrapper">



                <ul class="gallery">
                  <?php while($rows=mysqli_fetch_assoc($pizzaresults)){
                            ?>
                    <li class="gallery-item">
                      <form method="post" action="">
                      <input type="hidden" name="image" value="<?php echo $rows['image'];?>"> </input><img src=<?php echo $rows['image'];?> class="gallery-img">
                        <div class="gallery-im-caption">
                          <input type="hidden" name="title" value="<?php echo $rows['Name'];?>">  </input><h4 class="title"><?php echo $rows['Name'];?></h4>
                            <input type="hidden" name="txt" value="<?php echo $rows['Description'];?>"> </input> <p class="txt"><?php echo $rows['Description'];?></p>

                            <input type="hidden" name="price" value="<?php echo $rows['price'];?>">  </input> <span class="price"><?php echo $rows['price'];?>$</span>
                          <div>
                            <label for="qtty">Enter quantity:</label>
                            <input style="  border-radius: 4px; border: 1px solid lightgrey; border-color: rgb(122, 15, 15); margin-bottom:4px; placeholder{color:rgb(122, 15, 15);}" class="qtty" name="quantity" type="number" value="1" placeholder="Enter quantity">
                          </div>

                             <div class="choice">
                                <button type="submit" onclick="order()" class="btn btn-success order">Order</button>
                            </div>
                        </div>
                      </form>
                    </li>
                  <?php }?>

                </ul>
            </div>
    </main>

        </div>
        <div id="add" class="ordering-container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="ordering" hidden method="post">



    </form>
  </div>

        <script>
                <?php echo $empty; ?>
            </script>


        <div id="dishes">
            <main class="ccontainer" id="container">
                <div class="gallery-wrapper">

                     <ul class="gallery">
                      <?php while($rows=mysqli_fetch_assoc($dishesresults)){
                                ?>
                                <li class="gallery-item">
                                  <form method="post" action="">
                                  <input type="hidden" name="image" value="<?php echo $rows['image'];?>"> </input><img src=<?php echo $rows['image'];?> class="gallery-img">
                                    <div class="gallery-im-caption">
                                      <input type="hidden" name="title" value="<?php echo $rows['Name'];?>">  </input><h4 class="title"><?php echo $rows['Name'];?></h4>
                                        <input type="hidden" name="txt" value="<?php echo $rows['Description'];?>"> </input> <p class="txt"><?php echo $rows['Description'];?></p>

                                        <input type="hidden" name="price" value="<?php echo $rows['price'];?>">  </input> <span class="price"><?php echo $rows['price'];?>$</span>
                                      <div>
                                        <label for="qtty">Enter quantity:</label>
                                        <input style="  border-radius: 4px; border: 1px solid lightgrey; border-color: rgb(122, 15, 15); margin-bottom:4px; placeholder{color:rgb(122, 15, 15);}" class="qtty" name="quantity" type="number" value="1" placeholder="Enter quantity">
                                      </div>

                                         <div class="choice">
                                            <button type="submit" class="btn btn-success order">Order</button>
                                        </div>
                                    </div>
                                  </form>
                                </li>
                      <?php }?>

                    </ul>
                </div>
            </main>
        </div>

        <br><br>

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
