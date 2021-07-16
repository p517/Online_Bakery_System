<?php
    session_start();
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
    <div id="menu">
        <div class="categories">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="birthday-tab" data-bs-toggle="tab" data-bs-target="#birthday" type="button" role="tab" aria-controls="birthday" aria-selected="true">
                        <img src="img/bdaycake10.jpg" alt="cake1" style="height:100px;width:100px;"  class="img_round">
                        <br>
                        Birthday
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="anniversary-tab" data-bs-toggle="tab" data-bs-target="#anniversary" type="button" role="tab" aria-controls="anniversary" aria-selected="false">
                        <img src="img/anniversarycake6.jpg" alt="cake2" style="height:100px;width:100px;" class="img_round">
                        <br>
                        Anniversary
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cupcakes-tab" data-bs-toggle="tab" data-bs-target="#cupcakes" type="button" role="tab" aria-controls="cupcakes" aria-selected="false">
                        <img src="img/cupcake10.jpg" alt="cake3" style="height:100px;width:100px;" class="img_round">
                        <br>
                        CupCakes
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cookies-tab" data-bs-toggle="tab" data-bs-target="#cookies" type="button" role="tab" aria-controls="cookies" aria-selected="false">
                        <img src="img/cookies6.jpg" alt="cake4" style="height:100px;width:100px;" class="img_round">
                        <br>
                        Cookies
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pastries-tab" data-bs-toggle="tab" data-bs-target="#pastries" type="button" role="tab" aria-controls="pastries" aria-selected="false">
                        <img src="img/pastry9.jpg" alt="cake5" style="height:100px;width:100px;" class="img_round">
                        <br>
                        Pastries
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="" data-bs-toggle="tab" data-bs-target="" type="button" role="tab" aria-controls="" aria-selected="false">
                        <a href="customizedcake.php"><img src="img/circle5.jpg" alt="cake5" style="height:100px;width:100px;" class="img_round"></a>
                        <br>
                        Customized Cake
                    </button>
                </li>
                
            </ul>
        </div>
      <br><br>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="birthday" role="tabpanel" aria-labelledby="birthday-tab">
            <h1 class="text-danger text-center">Birthday Cakes</h1>
            <div class="wrapper" >
                <div class="container">
                    <div class="row">
                        <?php
                            include 'dbconnect.php';
                            $query1 = "SELECT  `id`, `name`, `image`, `price` FROM `birthday_cake` order by id ASC";
                            $sqli1 = mysqli_query($conn, $query1);
                            $num1 = mysqli_num_rows($sqli1);
                            if($num1 > 0){
                                while($row = mysqli_fetch_array($sqli1)){
                                    ?>
                                    <?php
                                        // $itemArray = [
                                        //     'image' => $row['image']
                                        // ];
                                        // die($itemArray);
                                        // var_dump($itemArray);
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card mx-4 my-3 shadow">
                                            <form action="manage_cart.php" method = "POST">

                                                <?php $_SESSION['img'] = $row['image'];?>
                                                <img src="img/<?php echo $row['image']; ?>" name ="image" alt="" height="400px" width="400px">
                                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                <?php $image = $row["image"]; 
                                                    $_SESSION["image"] = $image;
                                                ?>
                                                <div class="content">
                                                    <div class="row det_price">
                                                        <div class="details col-lg-7">
                                                            <span><?php echo $row['name'];?></span>
                                                        </div>
                                                        <div class="price col-lg-5"><?php echo "Rs. ".$row['price'];?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-end my-2">
                                                        <button type="submit" name="add_to_wishlist" class="btn btn3">
                                                            <i class="far fa-heart">
                                                                WishList
                                                            </i>
                                                        </button>
                                                    </div>
                                                    

                                                    <div class="buttons d-flex">
                                                        <button type="submit" name="Buy_now" class="btn btn1">Buy Now</button>
                                                        <button type="submit" name="Add_to_cart" class="btn btn2">Add to Cart</button>
                                                        <input type="hidden" name="Item_name" value="<?php echo $row['name'];?>">
                                                        <input type="hidden" name="Price" value="<?php echo $row['price'];?>">
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="tab-pane fade" id="anniversary" role="tabpanel" aria-labelledby="anniversary-tab">
            <h1 class="text-success text-center">Anniversay Cakes</h1>
            <div class="wrapper" >
                <div class="container">
                    <div class="row">
                        <?php
                            include 'dbconnect.php';
                            $query2 = "SELECT  `id`, `name`, `price`, `image` FROM `anniversary_cake` order by id ASC";
                            $sqli2 = mysqli_query($conn, $query2);
                            $num2 = mysqli_num_rows($sqli2);
                            if($num2 > 0){
                                while($row = mysqli_fetch_array($sqli2)){
                                    ?>
                                        <div class="col-md-4">
                                            <div class="card mx-4 my-3 shadow">
                                                <form action="manage_cart.php" method = "POST">
                                                    <img src="../img/<?php echo $row['image']; ?>" alt="" height="400px" width="400px">
                                                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                    <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                    <div class="content">
                                                        <div class="row mb-4 det_price">
                                                            <div class="details col-lg-7">
                                                                <span><?php echo $row['name'];?></span>
                                                            </div>
                                                            <div class="price col-lg-5"><?php echo "Rs. ".$row['price'];?></div>
                                                        </div>
                                                        <div class="d-flex justify-content-end my-2">
                                                            <button type="submit" name="add_to_wishlist" class="btn btn3">
                                                                <i class="far fa-heart">
                                                                    WishList
                                                                </i>
                                                            </button>
                                                        </div>
                                                        <?php $image = $row["image"]; 
                                                            $_SESSION["image"] = $image;
                                                        ?>
                                                        <div class="buttons d-flex">
                                                            <button type="submit" name="Add_to_cart" class="btn btn1">Buy Now</button>
                                                            <button type="submit" name="Add_to_cart" class="btn btn2">Add to Cart</button>
                                                            <input type="hidden" name="Item_name" value="<?php echo $row['name'];?>">
                                                            <input type="hidden" name="Price" value="<?php echo $row['price'];?>">
                                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        </div>
                                                    </div>
                                                            
                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="cupcakes" role="tabpanel" aria-labelledby="cupcakes-tab">

            <h1 class="text-primary text-center">CupCakes</h1>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <?php
                            include 'dbconnect.php';
                            $query3 = "SELECT  `name`, `price`, `image` FROM `cupcakes` order by id ASC";
                            $sqli3 = mysqli_query($conn, $query3);
                            $num3 = mysqli_num_rows($sqli3);
                            if($num3 > 0){
                                while($row = mysqli_fetch_array($sqli3)){
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card mx-4 shadow">
                                            <form action="manage_cart.php" method = "POST">
                                                <img src="../img/<?php echo $row['image']; ?>" alt="" height="400px" width="400px">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                <!-- <?php echo $row['image'];?> -->
                                                <div class="content">
                                                    <div class="row det_price">
                                                        <div class="details col-lg-7">
                                                            <span><?php echo $row['name'];?></span>
                                                        </div>
                                                        <div class="price col-lg-5"><?php echo "Rs. ".$row['price'];?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-end pt-4">
                                                            <button type="submit" name="add_to_wishlist" class="btn btn3">
                                                                <i class="far fa-heart">
                                                                    WishList
                                                                </i>
                                                            </button>
                                                        </div>
                                                    <?php $image = $row["image"]; 
                                                        $_SESSION["image"] = $image;
                                                    ?>
                                                    <div class="buttons d-flex">
                                                        <button type="submit" name="Add_to_cart" class="btn btn1">Buy Now</button>
                                                        <button type="submit" name="Add_to_cart" class="btn btn2">Add to Cart</button>
                                                        <input type="hidden" name="Item_name" value="<?php echo $row['name'];?>">
                                                        <input type="hidden" name="Price" value="<?php echo $row['price'];?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    
                                }
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="tab-pane fade" id="cookies" role="tabpanel" aria-labelledby="cookies-tab">
            <h1 class="text-warning text-center">Cookies</h1>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <?php
                            include 'dbconnect.php';
                            $query4 = "SELECT  `name`, `price`, `image` FROM `cookies` order by id ASC";
                            $sqli4 = mysqli_query($conn, $query4);
                            $num4 = mysqli_num_rows($sqli4);
                            if($num4 > 0){
                                while($row = mysqli_fetch_array($sqli4)){
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card mx-4 shadow">
                                            <form action="manage_cart.php" method = "POST">
                                                <img src="../img/Cookies/<?php echo $row['image']; ?>" alt="" height="400px" width="400px">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                <div class="content">
                                                    <div class="row mb-4 det_price">
                                                        <div class="details col-lg-7">
                                                            <span><?php echo $row['name'];?></span>
                                                        </div>
                                                        <div class="price col-lg-5"><?php echo "Rs. ".$row['price'];?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-end my-2">
                                                        <button type="submit" name="add_to_wishlist" class="btn btn3">
                                                            <i class="far fa-heart">
                                                                WishList
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <?php $image = $row["image"]; 
                                                        $_SESSION["image"] = $image;
                                                    ?>
                                                    <div class="buttons d-flex">
                                                        <button type="submit" name="Add_to_cart" class="btn btn1">Buy Now</button>
                                                        <button type="submit" name="Add_to_cart" class="btn btn2">Add to Cart</button>
                                                        <input type="hidden" name="Item_name" value="<?php echo $row['name'];?>">
                                                        <input type="hidden" name="Price" value="<?php echo $row['price'];?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pastries" role="tabpanel" aria-labelledby="pastries-tab">
            <h1 class="text-secondary text-center">Pastries</h1>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <?php
                            include 'dbconnect.php';
                            $query5 = "SELECT  `name`, `price`, `image` FROM `pastries` order by id ASC";
                            $sqli5 = mysqli_query($conn, $query5);
                            $num5 = mysqli_num_rows($sqli5);
                            if($num5 > 0){
                                while($row = mysqli_fetch_array($sqli5)){
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="card mx-4 shadow">
                                            <form action="manage_cart.php" method = "POST">
                                                <img src="../img/Pastries/<?php echo $row['image']; ?>" alt="" height="400px" width="400px">
                                                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                <input type="hidden" name="image" value="<?php echo $row['image'];?>">
                                                <div class="content">
                                                    <div class="row mb-4 det_price">
                                                        <div class="details col-lg-7">
                                                            <span><?php echo $row['name'];?></span>
                                                        </div>
                                                        <div class="price col-lg-5"><?php echo "Rs. ".$row['price'];?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-end my-2">
                                                        <button type="submit" name="add_to_wishlist" class="btn btn3">
                                                            <i class="far fa-heart">
                                                                WishList
                                                            </i>
                                                        </button>
                                                    </div>
                                                    <?php $image = $row["image"]; 
                                                        $_SESSION["image"] = $image;
                                                    ?>
                                                    <div class="buttons d-flex">
                                                        <button type="submit" name="Add_to_cart" class="btn btn1">Buy Now</button>
                                                        <button type="submit" name="Add_to_cart" class="btn btn2">Add to Cart</button>
                                                        <input type="hidden" name="Item_name" value="<?php echo $row['name'];?>">
                                                        <input type="hidden" name="Price" value="<?php echo $row['price'];?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
      </div>
      
    </div>
    <script>
        var icon_wishlisht = document.getElementsByClassName('icon_wishlisht');
        $("icon_wishlisht").click(function(){

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="../Jquery/jquery.js"></script>
</body>
</html>
