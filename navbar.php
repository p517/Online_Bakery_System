<?php
  // session_start();
  // session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="jQuery/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  </head>
  <style>
    *{
      margin: 0;
      padding: 0;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .img_round {
      border-radius: 50%;
      line-height: 10px;
      width: 85px;
      margin: 5px;
      margin-right: 10px;
      align-items: center;
      justify-content: center;
      vertical-align: middle;
      border: 5px solid lightgrey;

    }
    div.navbar{
      padding: 0px;
    }
    nav{
      width: 100%;
      height: 100px;
      background-color :#861657;
      display: flex;
      background-image :linear-gradient(326deg, #861657 0%, #ffa69e 74%);
    }
    .left{
      display:flex;
    }
    .right{
      display:flex;
    }
    nav .left ul{
      justify-content: center;
      align-items: center;
    }
    nav .left ul li{
      line-height: 100px;
      list-style-type: none;
      display: inline-block;
      transition: 0.8s all;
    }
    nav .left ul li:hover {
      background-color: rgb(216, 208, 223);
    }
    nav .left ul li a{
      text-decoration: none;
      color: #fff;
      padding: 0px 16px;  
      font-weight: 900;
      font-size: 15px;
    }
    nav .left ul li a:hover {
      text-decoration: none;
      color: honeydew;
    }
    nav .right ul{
      /* display:flex;
      justify-content: center;
      align-items: center; */
      /* margin-left:px; */

    }
    nav .right ul li{
      line-height: 60px;
      list-style-type: none;
      display: inline-block;
      transition: 0.8s all;
      margin: 10px;
      margin-top: -10px;
    }
    nav .right ul li a{
      text-decoration: none;
      color:rgb(216, 208, 223);

    }
    nav .right ul li a p{
      margin-top: -10px;
    }
    nav .right ul li a i{
      display: flex;
      align-items:center;
      justify-content: center;
    }
    .dropdown button{
      margin-top:20px;
      /* font-size:25px; */
      color: rgb(216, 208, 223);
    }
    .dropdown button:hover{
      color: rgb(216, 208, 223);
      border: none;
    }
    
  </style>
  <body>
    <div id="navbar">
      <nav>
        <img
        src="data:image/jpeg;base64,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"
        height="" width="10%" align="left" class="img_round">
        <div class="left">
          <ul>
            <li><a class="active" href="index.php"><i class="fa fa-fw fa-home mx-1"></i> Home</a></li>
            <li><a href="about.html"><i class="fa fa-fw fa-users"></i>Who we are</a></li>
            <li><a href="gallery.php"><i class="fa fa-fw fa-image mx-1"></i>Gallery</a></li>
            <li><a href="menu.php"><i class="fa fa-fw fa-bars mx-1"></i>Menu</a></li>
            <li><a href="ratings.php"><i class="fa fa-fw fa-star mx-1"></i>Ratings</a></li>
            
            <li><a href="signup.php"><i class="fa fa-fw fa-birthday-cake mx-1"></i>New User</a></li>
            
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </ul>
        </div>
        <div class="right">
          <ul class="">
            <li class="cart">
              <a href="cart.php" class="d-flex flex-column">
                <i class="fas fa-shopping-cart pt-2"></i>
                <p>Cart</p>
              </a>
            </li>
            <li class="">
              <a href="wishlist.php" class="d-flex flex-column">
                <i class="fas fa-heart pt-2"></i>
                <p>Wishlist</p>
              </a>
            </li>
            <!-- <li>
              <a href="profile.php" class="d-flex flex-column">
                <i class="fa fa-fw fa-user pl-4"></i>
                <p>Profile</p>
              </a>
            </li> -->
            <li class="">
              
              <div class="dropdown mt-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item text-dark" href="profile.php">Profile</a></li>
                  <?php
                    
                    // else{
                    //   echo '<li><a href="signup.php"><i class="fa fa-fw fa-user-circle mx-1"></i>New User</a></li>';
                    // }
                  ?>
                  <li><a class="dropdown-item text-dark" href="logout.php">Logout</a></li>
                </ul>
              </div>
            </li>
            <!-- <li>
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </button>
                  My account
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?php echo '&nbsp;&nbsp;'.$_SESSION['email_id']; ?>
                </div>
              </div>
            </li>
             -->
            <!-- <li class="profile">
              <a href="profile.php" class="d-flex flex-column">
                <i class="fas fa-user-alt pt-2"></i>
                <p>Profile</p>
              </a>
            </li> -->
            
            
          </ul>
        </div>
      </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  </body>
</html>