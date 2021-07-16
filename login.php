<?php 
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <style>
            html{
                /* width:600px; */
                /* height: 800px */
            }
            body{
                background: url(img/22.jpg);
                background-size: 1400px 800px;
                background-repeat: no-repeat;
                background-position: 0px -65px;
                
            }
            div.container {
                /* background: url(../img/22.jpg); */
                /* display: none; */
                /* background-repeat: no-repeat;
                background-size: 650px 700px;
                height: 520px;
                width: 650px;
                margin: auto;
                margin-top: 80px; */
                /* opacity: 0.6; */
            }
            div.transbox {
                position: absolute;
                top: 98px;
                left: 305px;
                margin: 30px;
                width: 738px;
                height:421px;
                background-color: #ffffff;
            }
            div.transbox .login {
                margin: 48px 50px 48px 165px;
                font-weight: bold;
                color: #000000;
                width: 75%;
                opacity: 1.0 !important;
            }
            input{
                /* width: 310px !important; */
                /* margin: 0px; */
            }
            
            .heading{
                color: rgb(147, 74, 6, 100);
                font-weight:150;
            }
            .h2{
                font-weight: 500;
                /* font-style:bold; */
            }
            .btn{
                padding: 5px 4px;
            }
            .login_btn{
                /* background-color: #772f1a;
                background-image: linear-gradient(315deg, #772f1a 0%, #f2a65a 74%); */
                background-color: rgb(147, 74, 6, 100);
                /* background: rgb(189,118,52);
                background: linear-gradient(90deg, rgba(189,118,52,1) 0%, rgba(147,74,6,1) 49%, rgba(189,118,52,1) 100%); */
                color:  white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="background">
                <div class="transbox">
                    <br><br>
                    <p class="h2 text-center heading">LOGIN</p>
                    <form action="#" class="login" method="post">
                        <div class="field">
                            <input class="form-control w-75" type="text" placeholder="Email Address" name="email_id" required>
                        </div>
                        <br>
                        <div class="field">
                            <input class="form-control w-75" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="pass-link">
                            <a href="#" class="heading">Forgot password?</a>
                        </div>
                        <br>
                        <div class="field btn w-75">
                            <div class="btn-layer">
                            </div>
                            <button name="login" type="submit" class="btn login_btn text-center p-2 px-3">Get Started</button>
                            <!-- <input type="submit" value="Login" name="login"> -->
                        </div>
                        <!-- <div class="signup-link text-center w-75 heading">Not a member? <a href="">Signup now</a></div> -->
                    </form>
                </div>
            </div>
            
        </div>
        <?php
            $login = false;
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST["email_id"]) && isset($_POST["password"])){
                    $email_id = $_POST["email_id"];
                    $password = $_POST["password"];
                    $sql = "SELECT * FROM `user_info` WHERE email_id = '$email_id' AND password='$password'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if($num == 1){
                        $login = true;
                        if($row = mysqli_fetch_assoc($result)){
                            $_SESSION['email_id'] = $email_id;
                            $_SESSION['password'] = $password;
                        }
                    
                        $_SESSION['loggedin'] = true; 
                    }
                    else{
                        $login = false;
                    }
                }   
            }
            if(isset($_POST["login"])){
                if($login){
                    $password = $_POST["password"];
                    $sql = "SELECT * FROM `user_info` WHERE password='$password'";
                    $result = mysqli_query($conn, $sql);
                    if($row = mysqli_fetch_assoc($result)){
                        echo '<script>
                            swal({
                                title: "Successful!",
                                text: "Logged in Successfully!",
                                type: "success"
                            }).then(function() {
                                window.location.href = "index.php ";
                            });
                            </script>';
                    }
                    $login = false;
                }
                else{
                    echo '<script>
                        swal({
                            title: "Invalid Credentials!",
                            text: "TRY AGAIN.",
                            type: "error"
                        }).then(function() {
                            window.location.href = "login.php";
                        });
                        </script>';
                }
            }
        ?>

    </body>
</html>
