<?php
    session_start();
    // session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../CSS files/menu.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS files/wishlist.css">
    <title>Wishlist</title>
    <style>
        /* Menu */

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        body{
            margin:  0 100px;
            /* display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; */
            /* min-height: 100vh; */
            /* background-color: antiquewhite; */
        }
        /*To have side by side images and particular bottom text with images*/
        .column {
            float: left;
            width: 12%;
            padding: 15px;
            text-align: center; 
            font-family: cursive; 
            color: rgb(59, 52, 52)
        }
        /* Clearfix (clear floats) */
        .row::after {
            content: " ";
            clear: both;
            display: table;
        }
        .heading{
            font-weight: 600;
            color: #c94a98;
        }
        .content{
            font-weight: 500;
            font-family: 'Merriweather', serif;
            font-size: 20px;
        }
        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 500px) {
            .column {
                width: 100%;
            }
        }

        .wrapper{
            max-width: 1130px;
            min-height: 100vh;
            display: flex;
            justify-content: space-between;
            /* align-items: center; */
            margin: 0px 100px;
            margin-top: 50px;
        }
        .wrapper .card{
            /* width: calc(33% - 13px); */
            width: 350px;
            height: 350px;
            border-radius: 3px;
            /* border: solid 0.5px #333; */
        }
        .wrapper .card img{
            width: 100%;
            height: 200px;
            border-radius: 3px;
        }
        .wrapper .card img:hover{
            opacity: 0.5;
        }
        .wrapper .card .content{
            width: 100%;
            padding: 10px 20px 22px 20px;
        }
        .card .content .row,
        .card .content .buttons{
            display: flex;
            justify-content: space-between;
        }
        .content .row .details span{
            color: #333;
            font-size: 18px;
            font-weight: 500;
        }
        .content .row .details p{
            color: #333;
            font-size: 17px;
            font-weight: 400;
        }
        .content .row .price{
            text-align: end;
            color: #c94a98;
            font-size: 20px;
            font-weight: 600;
        }
        .content .det_price{
            margin-bottom: 30px;
            /* height: 80px; */
        }

        .content .buttons button{
            width: 100%;
            padding: 10px 0;
            outline: none;
            font-size: 17px;
            font-weight: 500;
            border-radius: 3px;
            border: 2px solid #c94a98;
            cursor: pointer;
            text-transform: uppercase;
        }
        .buttons button:first-child{
            color: #c94a98;
            background-color: #fff;
            margin-right: 10px;
        }
        .buttons button:first-child:hover{
            color: #fff;
            background-color: #c94a98;
        }
        .buttons .btn2{
            color: #fff;
            background-color: #c94a98;
        }
        .buttons .btn2:hover{
            color: #fff;
            background-color: #c94a98;
        }
        .btn3{
            color: #c94a98;
            background-color: #c94a98;
            font-family: 'Merriweather', serif;
        }
        .btn3 i{
            color: #c94a98;
            font-size: 22px;

        }

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
<!--     
    <nav class="bg-light">
        <div>
            <?php
                $count = 0;
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                }
            ?>
            <a href="cart.php" class="btn btn-outline-success float-right">My Cart (<?php echo $count;?>)</a>
        </div>
    </nav> -->
    <?php include('navbar.php') ;?>
    <div id="wishlist">
        <h1 class="heading text-center mt-4">Wishlist</h1>
        <div class="wrapper" >
            <div class="container">
            <form action="manage_cart.php" method = "POST">
                <div class="row">
                        <?php
                            include 'dbconnect.php';
                            if(isset($_SESSION['wishlist'])){
                                $email_id = $_SESSION['email_id'];
                                $query1 = "SELECT `id`, `Item_name`, `Price`, `email_id`,`image` FROM `wishlist` WHERE `email_id` = '$email_id' order by id ASC;";
                                // $sqli1 = mysqli_query($conn, $query1);
                                // $query1 = "SELECT  `id`, `Item_name`, `Price`, `email_id` FROM `cart` order by id ASC";
                                $sqli1 = mysqli_query($conn, $query1);
                                $num1 = mysqli_num_rows($sqli1);
                            
                                if($num1 > 0){
                                    while($value = mysqli_fetch_array($sqli1)){
                                        ?>
                                        <div class="col-lg-4">
                                            <div class="card mx-4 my-4 shadow">
                                                    <!-- <img src="../img/<?php echo $value["image"]; ?>" alt="image" class="img-fluid"> -->

                                                    <img src="img/<?php echo $value['image']; ?>" name ="image" alt="" height="400px" width="400px">
                                                    <input type="hidden" name="image" value="<?php echo $value['image'];?>">
                                                    <div class="content">
                                                        <div class="row det_price">
                                                            <div class="details col-lg-7">
                                                                <span><?php echo $value['Item_name'];?></span>
                                                            </div>
                                                            <div class="price col-lg-5"><?php echo "Rs. ".$value['Price'];?></div>
                                                        </div>
                                                        <div class="buttons d-flex">
                                                            <button type="submit" name="remove_wishlist" class="btn btn1">Remove</button>
                                                            <button type="submit" name="move_to_bag" class="btn btn2">Move To Bag</button>
                                                            <input type="hidden" name="Item_name" value="<?php echo $value['Item_name'];?>">
                                                            <input type="hidden" name="Price" value="<?php echo $value['Price'];?>">
                                                            <input type="hidden" name="id" value="<?php echo $value['id'];?>">

                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                </div>
            </form>
            </div>
                
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="../Jquery/jquery.js"></script>
</body>
</html>
