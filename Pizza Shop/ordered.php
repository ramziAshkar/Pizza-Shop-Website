<?php

session_start();
$get="";
if(isset($_SESSION["username"] )){
    $get=$_SESSION["username"];
}
else {
    $get="";
}
if(isset($_SESSION["username"] )){
$conn= new mysqli("localhost", "root", "");
if(!$conn){
echo 'connection error: ' .mysqli_connect_error();
}
if ( !mysqli_select_db($conn, "pizza") )
        die( "Could not open test database" );

        $query= "SELECT * FROM ordered WHERE `user` LIKE '$_SESSION[username]'";
        $totalquery="SELECT SUM(total) as sum FROM ordered WHERE `user` LIKE  '$_SESSION[username]'";
        $results= mysqli_query($conn, $query);
        $result=mysqli_query($conn, $totalquery);
        $row=mysqli_fetch_assoc($result);

    mysqli_close($conn);
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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

    <script src="js/ordered.js"></script>
    <link href="css/main.css" rel="stylesheet">
    <link href="css/ordered.css" rel="stylesheet">

</head>
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
<body>

<section>
  <div id="pizzas">

  <main class="ccontainer" id="container">

      <div class="gallery-wrapper">

        <ul class="gallery">
          <?php
          if(isset($_SESSION['username'])){
           while($rows=mysqli_fetch_assoc($results)){

                    ?>
            <li class="gallery-item">
                <img src=<?php echo $rows['image'];?> class="gallery-img">
                <div class="gallery-im-caption">
                    <h4 class="title"><?php echo $rows['Name'];?></h4>
                    <p class="txt"><?php echo $rows['Description'];?></p>

                    <span class="quantity"><?php echo $rows['quantity'];?></span><br/>
                    <span class="price"> <?php echo $rows['total'];?>$</span>




                </div>
            </li>
          <?php }}?>

            </ul>


      </div>
  </main>

  </div>

</section>

<div class="total">Total price:<?php  if(isset($_SESSION['username'])){echo $row['sum'];}?>$</div><br/>
<div class="info">
  <label id="email">Email:</label>
<input class="input" type="email" name="email" value="" placeholder="  Enter your Email">
<label id="email">Address:</label>

<input class="input" type="text" name="address" value="" placeholder="  Enter your Address">
</div><br/> <br/>
<div class="final">
<button type="button" name="button" class="btn btn-success order">Order</button>
</div><br/> <br/>

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
