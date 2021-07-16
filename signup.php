<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <title>Signup</title>
        <style>
            div.left {
                background: url('img/15.jpg');
                background-repeat: no-repeat;
                height: 540px;
                width: 600px;
                /* border: 2px solid black; */
            }

            div.transbox {
                position: absolute;
                top: 40%;
                left: 20%;
                margin: 30px;
                background-color: #ffffff;
                border: 1px solid black;
                opacity: 0.6;
            }

            div.transbox p {
                margin: 30px 40px;
                font-weight: bold;
                color: #000000;
            }

            .hero-section{
                margin: 55px 100px ;
                display: flex;
            }
            .heading{
                color: rgb(147, 74, 6, 100);
            }
            form {
                background-color: white;
                padding: 31px 54px;
            }
            input{
                background-color: white;
                border: 1.5px solid rgb(123, 124, 124);            
                padding: 9px 17px;
                margin: 6px;
            }
            /* input:hover,
            input:active,
            input:focus,
            input:visited{
                outline: none;
            } */
            .col-md-8 input{
                width: 380px;
            }
            
            input:focus::placeholder {
                color: transparent;
            }
            ::placeholder{
                color: rgb(163, 155, 155);
                font-weight: 2em;
            }
            span i{
                color: white;
                font-size: 9em;
                position: relative;
                top: 0px;
                left: 100px;
            }
            p{
                color: white;
                text-align: center;
            }
            .buttons{
                display: flex;
                width: 100%;           
            }
            .buttons a{
                text-decoration:none;
            }
            #signup{
                background-color: #772f1a;
                background-image: linear-gradient(315deg, #772f1a 0%, #f2a65a 74%);
                padding: 10px 30px;
            }
        </style>
    
    </head>
    <body>
    <div class="hero-section shadow-lg mb-5 bg-light rounded">        
        
        <div class="left">
            <div class="transbox">
                <p>Cakelicious</p>
            </div>
        </div>

        <div class="right">
            <form action="signup.php" method="post"> 
                <!-- <div class="buttons mb-3">
                    <div class="signup text-center bg-primary w-50 py-3"><a href="signup.php" class="text-white">Signup</a></div>
                    <div class="login text-center bg-secondary w-50 py-3"><a href="login.php" class="text-white">Login</a></div>
                </div> -->
                <h1 class="heading">Sign Up</h1><br>
                <div class="form-group row">
                    <!-- <div class="col-md-4">
                        <label for="">First Name</label>
                    </div> -->
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="First Name*" name="firstname" required>
                    </div>   
                    <div class="col-md-6">
                        <input class="form-control" type="text" placeholder="Last Name*" name="lastname" required>
                    </div> 
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input class="form-control" type="email" placeholder="Email*" name="email_id" required>
                        <div class="pl-2"><small class="text-muted">We will never share your email address with anyone.</small></div>
                    </div>               
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input class="form-control" type="password" placeholder="Password*" name="password" required>
                    </div>   
                    <div class="col-md-6">
                        <input class="form-control" type="password" placeholder="Confirm Password*"  name="cpassword" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input class="form-control" type="number" placeholder="Mobile no*" name="mobile_no" required>
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col-md-3">
    					<label for="gender" class="control-label">Gender</label>							
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="male" value="male" required>Male
                        </label>
                    </div>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="female" value="female" required>Female
                        </label>
                    </div>
				</div>	
                <div class="submit pb-4" style="text-align: center;">
                    <button name="signup" id="signup" type="submit" class="btn text-center">Sign Up</button>
                </div>
                <div>
                    <p class="text-dark">Already a member? <a href="login.php">Login</a></p>
                </div>
            </form>
                
        </div>
        <?php

            if(isset($_POST["signup"])){
                if($_SERVER["REQUEST_METHOD"] == "POST"){            
                    include 'dbconnect.php';   
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"];         
                    $email_id = $_POST["email_id"];
                    $password = $_POST["password"];
                    $cpassword = $_POST["cpassword"];
                    $mobile_no = $_POST["mobile_no"];
                    $gender = $_POST["gender"];
                    $_SESSION['firstname'] = $_POST['firstname'];
                    $_SESSION['lastname'] = $_POST['lastname'];
                    $_SESSION['email_id'] = $_POST['email_id'];
                    $_SESSION['password'] = $_POST['password'];
                    $_SESSION['mobile_no'] = $_POST['mobile_no'];
                    $_SESSION['gender'] = $_POST['gender'];
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
                            window.location.href = "signup.php";
                        });
                        </script>';
                    }
                    else{
                        if(($password == $cpassword)){
                            $sql = "INSERT INTO `user_info` (`firstname`, `lastname`, `email_id`, `password`, `mobile_no`, `gender`) VALUES ('$firstname', '$lastname', '$email_id', '$password', '$mobile_no', '$gender');";
                            $result = mysqli_query($conn, $sql); 
                            
                            if($result){
                                echo '<script>
                                swal({
                                    title: "Sign Up Successfully!",
                                    text: "You can login now.",
                                    type: "success"
                                }).then(function() {
                                    window.location.href = "login.php";
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
                                    window.location.href = "signup.php";
                                });
                                </script>';
                            
                        }
                    }
                }
                
            }

        ?>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            
            <script>
                $(document).ready(function(event){
                    $('#signup_form').submit(function(event){
                        event.preventDefault();
                        var datatopost = $(this).SerializeArray();
                        $ajax({
                            url: "signup.php",
                            data: datatopost,
                            success: function(){
                                alert(data);
                            } 
                            error: function(){
                                alert("ERROR: Running the AJAX query");
                                // $().html("ERROR: Running the AJAX query");
                            }
                        })
                    })
                });
            </script>
            <script>
                
            </script>
            
    </body>
</html>