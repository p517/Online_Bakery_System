<?php
    session_start();
    include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="CSS files/menu.css">
    <title>Menu</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
    </style>
</head>
<body>
    <?php
        // print_r($_SESSION['cart']);
    ?>
    <?php include('navbar.php') ;?>

    <div class="shadow-lg bg-light pt-4 profile">
        <form method="post" class="profile ">
            <div class="text-center text-secondary">
                <?php 
                    $email = $_SESSION['email_id'];
                    $sql = "SELECT `firstname`, `lastname`, `email_id`, `password`, `mobile_no`, `gender` FROM `user_info` WHERE `email_id` = '$email';";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        while($row = mysqli_fetch_array($result)){
                            echo 'Users Details<hr><div class="h4 pt-2 align-center text-info">FirstName : '.$row['firstname'].'
                            <br><br><br>LastName : '.$row["lastname"].'<br><br><br>Email_id : '.$row["email_id"].'<br><br><br>Mobile No : '.$row["mobile_no"].'<br><br><br>Gender : '.$row["gender"].'</div>';
                        }
                    }
                    
                    // $_SESSION['firstname'] = $_POST['firstname'];
                    // $_SESSION['lastname'] = $_POST['lastname'];
                    // $_SESSION['email_id'] = $_POST['email_id'];
                    // $_SESSION['password'] = $_POST['password'];
                    // $_SESSION['mobile_no'] = $_POST['mobile_no'];
                    // $_SESSION['gender'] = $_POST['gender'];
                    {
                         }
                        
                ?>
                <?php
                    // echo ' Users Details<hr><div class="h4 pt-2 align-center text-info">FirstName : '.$_SESSION['firstname'].'
                    // <br><br><br>LastName : '.$_SESSION['lastname'].'<br><br><br>Mobile No : '.$_SESSION['mobile_no'].'</div>';
                ?>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="Jquery/jquery.js"></script>
</body>
</html>
