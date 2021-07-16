<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../CSS files/login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Login</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Login Form</div>
                <div class="title signup">Signup Form</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                    <input type="radio" name="slide" id="login" checked>
                    <input type="radio" name="slide" id="signup">
                    <label for="login" class="slide login">Login</label>
                    <label for="signup" class="slide signup">Signup</label>
                    <div class="slider-tab">
                    </div>
                </div>
                <div class="form-inner">
                    <form action="#" class="login" method="post">
                        <div class="field">
                            <input type="text" placeholder="Email Address" name="email_id" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="pass-link">
                            <a href="#">Forgot password?</a>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer">
                            </div>
                            <!-- <button name="login" type="submit" class="btn btn-primary text-center">Get Started</button> -->
                            <input type="submit" value="Login" name="login">
                        </div>
                        <div class="signup-link">Not a member? <a href="">Signup now</a></div>
                    </form>
                    <form action="#" class="signup" method="post">
                        <div class="field">
                            <input type="text" placeholder="Email Address" name="email_id" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="field">
                            <input type="password" placeholder="Confirm password" name="cpassword" required>
                        </div>
                        <div class="field btn">
                            <div class="btn-layer">
                            </div>
                            <!-- <button name="signup" id="signup" type="submit" class="btn btn-primary text-center px-2 py-3">Sign Up</button> -->
                            <input type="submit" value="Signup" name="signup">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            const loginText = document.querySelector(".title-text .login");
            const loginForm = document.querySelector("form.login");
            const loginBtn = document.querySelector("label.login");
            const signupBtn = document.querySelector("label.signup");
            const signupLink = document.querySelector("form .signup-link a");
            signupBtn.onclick = (() => {
                loginForm.style.marginLeft = "-50%";
                loginText.style.marginLeft = "-50%";
            });
            loginBtn.onclick = (() => {
                loginForm.style.marginLeft = "0%";
                loginText.style.marginLeft = "0%";
            });
            signupLink.onclick = (() => {
                signupBtn.click();
                return false;
            });
        </script>
        <?php

            if(isset($_POST["signup"])){
                if($_SERVER["REQUEST_METHOD"] == "POST"){                        
                    $email_id = $_POST["email_id"];
                    $password = $_POST["password"];
                    $cpassword = $_POST["cpassword"];
                    

                    $_SESSION['email_id'] = $_POST['email_id'];
                    $_SESSION['password'] = $_POST['password'];

                    $unsql = "SELECT * FROM `user_info` WHERE email_id = '$email_id'";
                    $result = mysqli_query($conn, $unsql);
                    $numExistRows = mysqli_num_rows($result);
                    // echo $email_id ;
                    if($numExistRows > 0){
                        echo '<script>
                        swal({
                            title: "Email Already exists!",
                            text: "TRY AGAIN.",
                            type: "error"
                        }).then(function() {
                            window.location.href = "form.php";
                        });
                        </script>';
                    }
                    else{
                        if(($password == $cpassword)){
                            $sql = "INSERT INTO `user_info` (`id`, `email_id`, `password`) VALUES ('', '$email_id', '$password');";
                            $result = mysqli_query($conn, $sql); 
                            
                            if($result){
                                echo '<script>
                                swal({
                                    title: "Sign Up Successfully!",
                                    text: "You can login now.",
                                    type: "success"
                                }).then(function() {
                                    window.location.href = "form.php";
                                });
                                </script>';
                            }        
                        }
                        else{
                            echo '<script>
                                swal({
                                    title: "Passwords do not match",
                                    text: "TRY AGAIN.",
                                    type: "error"
                                }).then(function() {
                                    window.location.href = "form.php";
                                });
                                </script>';
                            
                        }
                    }
                }
                
            }

        ?>

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
                                window.location.href = "menu.html ";
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
                            window.location.href = "form.php";
                        });
                        </script>';
                }
            }
        ?>
    </body>
</html>
