<?php
session_start();
?>
<!DOCTYPE html>
    <?php
    if(isset($_SESSION["username"] )){
        $conn = new mysqli('localhost', 'root', '', 'pizza');
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        $user=$_SESSION["username"];
        $sql = "SELECT name, email FROM `customer` WHERE username='$user' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $email=$row["email"];
                                $name=$row["name"];
                            }
                        }
                        $new=
                        "
                        $('#loginform').empty();
                        $('#loginform').css({'height': '10cm', 'padding': '0.5cm'});
                        var title='<br><br><p>Username: </p>';
                        var data='<spam>".$user."</spam><br><br><br>';
                        var title2='<p>Email: </p>';
                        var data2='<spam>".$email."</spam><br><br><br>';
                        var title3='<p>Name: </p>';
                        var data3='<spam>".$name."</spam><br><br><br>';
                        var data4='<button>Sign out</button>';
                        $('#loginform').append(title);
                        $('#loginform').append(data);
                        $('#loginform').append(title2);
                        $('#loginform').append(data2);
                        $('#loginform').append(title3);
                        $('#loginform').append(data3);
                        $('#loginform').append(data4);
                        $('#loginform').children('button').attr('name','signout');
                        $('#loginform').children('button').attr('type','submit');
                        $('#loginform').children('button').css({ 'width': '100%', 'background-color': 'rgb(122, 15, 15)', 'font-size': '19px', 'border': 'none', 'color': 'white', 'margin': '10px 0'});
                        $('#loginform').children('p').css({ 'color': 'rgb(122, 15, 15)', 'font-size': '0.5cm'});
                        $('#loginform').children('spam').css({ 'color': 'black', 'font-size': '0.5cm'});
                        ";
    }
    else
    $new="";
    ?>
    <html>
        <?php
        $run="";
        $give="";
        $name='';
        $email='';
        $pass='';
        $user='';
        $alreadyExists="";
        $out="";
        $conn = new mysqli('localhost', 'root', '', 'pizza');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(isset($_POST['submit'])){
            $name=$_POST['fname'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $user=$_POST['uname'];
            $sql = "SELECT * FROM `customer` WHERE username='$user'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                    $alreadyExists=
                    "
                    $('.alert').text('* username already exists');
                    let loginForm = document.querySelector('.login-form-container');
                    loginForm.classList.toggle('active');
                    $('#loginform').hide();
                    $('#registerform').removeAttr('hidden');
                    $('.fname').val('".$name."');
                    $('.email').val('".$email."');
                    $('.pass').val('".$pass."');
                    ";
            }
            else{
                    $sql = "INSERT INTO customer ( name, email, password, username)
                    VALUES ('$name','$email','$pass','$user')";
                    if (mysqli_query($conn, $sql)) {
                    $_SESSION["username"] = $user;
                    $give=$user;
                    $out=
                    "
                    window.close();
                    ";
                    }
                    else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
            }
        }
            if(isset($_POST['submit2'])){
                $pass=$_POST['pass'];
                $user=$_POST['uname'];
                $sql = "SELECT * FROM `customer` WHERE username='$user' AND password='$pass'";
                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $sql = "SELECT name, email FROM `customer` WHERE username='$user' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $email=$row["email"];
                            $name=$row["name"];
                        }
                    }
                    $_SESSION["username"] = $user;
                    $give=$user;
                    $out=
                    "
                    window.close();
                    ";
                }
                else{
                    $sql2 = "SELECT * FROM `customer` WHERE username='$user'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows ==1 ) {
                        $alreadyExists=
                            "
                            $('.alertpass').text('* wrong password');
                            let loginForm = document.querySelector('.login-form-container');
                            loginForm.classList.toggle('active');
                            $('#loginform').show();
                            $('.usename').val('".$user."');
                            ";
                    }
                    else{
                        $alreadyExists=
                            "
                            $('.alertuname').text('* wrong username');
                            let loginForm = document.querySelector('.login-form-container');
                            loginForm.classList.toggle('active');
                            $('#loginform').show();
                            $('.usename').val('".$user."');
                            ";
                    }
                }
            }
            mysqli_close($conn);
            if(isset($_POST['signout'])){
                unset($_SESSION['username']);
                $run=
                    "
                    window.close();
                    ";
            }
        ?>
        <head>
            <title>Sign In</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">

            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
            <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <link href="css/signin.css" rel="stylesheet">
            <script src="js/signin.js"></script>

            <script>
                $(document).ready(function(){
                    <?php echo $alreadyExists; ?>
                    <?php echo $out; ?>
                    <?php echo $new; ?>
                    <?php echo $run; ?>
                });
            </script>

        </head>

        <div class="login-form-container">

            <div id="close-login-btn" class="bi-x"></div>

            <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="loginform">

                <h3>sign in</h3>

                <span class="alertuname">Username</span>
                <input type="text" name="uname" class="box usename" placeholder="Enter your username" required>

                <span class="alertpass">Password</span>
                <input type="password" name="pass" class="box" placeholder="Enter your password" required>

                <button type="submit" name="submit2" class="btn btn-primary">Sign in</button>

                <a id="forgot">Forgot password?</a>

                <br>

                <a id="create">Create account</a>

            </form>

            <form id="registerform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  hidden method="post">
                <div id="create-back-btn" class="bi-arrow-left-square-fill"></div>

                <h3>Create an account</h3>

                <span>Name</span>
                <input type="text" name="fname" class="box fname" placeholder="Enter your name" required>

                <span>Email</span>
                <input type="email" name="email" class="box email" placeholder="Enter your email" required>

                <span>Password</span>
                <input type="password" name="pass" class="box pass" placeholder="Enter your password" required>

                <span class="alert"> Username</span>
                <input type="text" name="uname" class="box" placeholder="Choose a username" required>


                <button type="submit" name="submit" class="btn btn-primary">submit</button>

            </form>



            <form action="" id="rememberform" hidden>
                <div id="remember-back-btn" class="bi-arrow-left-square-fill"></div>

                <h3>Forgot Your Password?</h3>

                <span>Email</span>
                <input type="email" name="" class="box" placeholder="Enter your email" required>

                <p>We will send you an email to help you reset your password<p>

                <input type="submit" value="Email me" class="btn btn-primary" id="forgotpassword">

            </form>
            </div>
            </div>
        </body>
    </html>
