<?php
    session_start();
    include 'dbconnect.php';
    // session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS files/cart.css">
    <title>Cart</title>
    <style>
        .remove .btn{
            color: #fff;
            background-color: #ff7979;
        }
        .add .btn{
            color: #fff;
            background-color:#935ac7;
        }
        .remove button:hover{
            color:#fff;
        }
        .add button:hover{
            color:#fff;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>
    
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row mt-5 gt-3">
                    <!-- left side div -->
                    <div class=" col-lg-8  mx-auto main_cart mb-lg-0 mb-5 shadow">
                        <div class="card p-4">
                            <h2 class="py-2 font-weight-bold">My Cart</h2>
                            <form action="manage_cart.php" method = "POST">
                                <?php
                                    $total =0;
                                    if(isset($_SESSION['cart'])){
                                        $email_id = $_SESSION['email_id'];
                                        $query1 = "SELECT `id`, `Item_name`, `Price`, `email_id`,`image` FROM `cart` WHERE `email_id` = '$email_id' order by id ASC;" ;
                                        $sqli1 = mysqli_query($conn, $query1);
                                        $num1 = mysqli_num_rows($sqli1);
                                    
                                        if($num1 > 0){
                                            while($value = mysqli_fetch_array($sqli1)){
                                                
                                                // $sr = $key+1;
                                                $total = $total + $value['Price'];
                                                // $value["image"] = $_POST["image"];
                                                // die($value["image"]);
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-4 col-11 mx-auto bg-light d-flex justify-content-center align-items-center shadow product_img m-2">
                                                        <img src="img/<?php echo $value["image"]; ?>" name="image" alt="image" class="img-fluid">
                                                        <input type="hidden" name="image" value="<?php echo $value['image'];?>">
                                                    </div>
                                                    <input type="hidden" name="id" value='<?php echo $value["id"]; ?>'>

                                                    <div class="col-md-8 mx-auto px-4 mt-2">
                                                        <div class="row">
                                                            <div class="col-8 card-title">
                                                                <h3 class="mb-4 product_name"><?php echo $value["Item_name"]; ?> </h3>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="number" class="text-center iquantity" onchange='subTotal()' value='<?php echo $value["Quantity"]; ?>' min="1" max="10">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2 mb-5">
                                                            <div class="col-5 d-flex justify-content-start price_money">
                                                                <h3><span>Price  : </span></h3>
                                                                <h3>Rs <span id="itemVal"><?php echo $value['Price']; ?></span></h3>
                                                                <input type="hidden" class="iprice" name="Price" value='<?php echo $value["Price"]; ?> '>
                                                            </div>
                                                            <div class="col-7  d-flex justify-content-end price_money">
                                                                <h3><span>Total Price : </span></h3>
                                                                <h3> Rs <span id="itemVal" class="itotal"><?php echo $total; ?></span></h3>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-between remove_wish">
                                                                <!-- <form action="manage_cart.php" method="POST"> -->
                                                                    <div class="remove">
                                                                        <button  class="btn btn-sm  py-2 px-2 ml-5"  name='Remove_item'><p><i class="fas fa-trash px-2"></i>REMOVE ITEM</p></button>
                                                                    </div>
                                                                    <input type="hidden" name="Item_name" value='<?php echo $value["Item_name"]; ?>'>
                                                                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                                                                    <div class="add">
                                                                        <button  class="btn btn-sm py-2 px-2 mr-5"  name="move_to_wishlist"><p><i class="fas fa-heart px-2"></i>WISHLIST</p></button>
                                                                    </div>
                                                                <!-- </form> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <?php
                                            }
                                        }
                                    }

                                ?>
                            </form>
                            <br><br><br>
                        </div>
                    </div>
                    <!-- Right side div -->
                    <div class="col-lg-4 col-11 mt-lg-0 mt-md-5 mx-auto">
                        <div class="right_side p-3 shadow bg-white">
                            <!-- <h2 class="product_name">The Total Amount Of</h2> -->
                            <div class="price_ind d-flex justify-content-between">
                                <p>Amount</p>
                                <p>Rs <span id="product_total_amt"><?php echo $total; ?></span></p>
                            </div>
                            <div class="price_ind d-flex justify-content-between">
                                <p>Shipping Charge</p>
                                <p>Rs <span id="shipping_charge">50.0</span></p>
                            </div>
                            <hr/>
                            <div class="total-amt d-flex justify-content-between font-weight-bold">
                                <p>The total amount : </p>
                                <p>Rs <span id="total_cart_amt"><?php echo $total + 50;?></span></p>
                            </div>
                            <button class="btn btn-primary text-uppercase">
                                <a href="checkoutfinal.php" class="text-white`  ">Checkout</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        
        var amt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var product_total_amt = document.getElementsByClassName('product_total_amt');
        var total_cart_amt = document.getElementsByClassName('total_cart_amt');


        function subTotal(){
            amt = 0;
            // iquantity = 1;
            for(i=0; i<iprice.length; i++){
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                amt = amt + (iprice[i].value) * (iquantity[i].value);
            }
            product_total_amt.innerText = amt;
            total_cart_amt.innerText = amt + 50;
        }
        subTotal();

        var product_total_amt = document.getElementById('product_total_amt');
        var shipping_charge = document.getElementById('shipping_charge');
        var total_cart_amt = document.getElementById('total_cart_amt');

        const decreaseNumber = (incdec, itemprice) => {
            var itemVal = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);

            // console.log(itemVal.val);
            if(itemVal.value <= 0){
                itemVal.value = 0;
                alert('At least one quantity should be there.')
            }
            else{
                itemVal.value = parseInt(itemVal.value) - 1;
                itemVal.style.background = '#fff';
                itemVal.style.color = '#000';
                itemprice.innerHTML = parseInt(itemprice.innerHTML) - iprice;
                product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) - iprice;
                total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);
            }
        }
        const increaseNumber = (incdec, itemprice) => {
            var itemVal = document.getElementById(incdec);
            var itemprice = document.getElementById(itemprice);

            // console.log(itemVal.val);
            if(itemVal.value >= 5){
                itemVal.value = 5;
                alert('max 5 allowed');
                itemVal.style.background = 'red';
                itemVal.style.color = 'white';
            }
            else{
                itemVal.value = parseInt(itemVal.value) + 1;
                itemprice.innerHTML = parseInt(itemprice.innerHTML) + iprice;
                product_total_amt.innerHTML = parseInt(product_total_amt.innerHTML) + iprice;
                total_cart_amt.innerHTML = parseInt(product_total_amt.innerHTML) + parseInt(shipping_charge.innerHTML);

            }
        }
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
</body>
</html>