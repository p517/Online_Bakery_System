<?php
    session_start();
    include 'dbconnect.php';
    // session_destroy(); 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['Add_to_cart'])){
            if(isset($_SESSION['cart'])){
                if(isset($_SESSION['cart'])){
                    $myitems = array_column($_SESSION['cart'], 'Item_name');
                    if(in_array($_POST['Item_name'], $myitems)){
                        echo "<script>
                                alert('Item already added');
                                window.location.href = 'cart.php';
                            </script>";
                    }
                    else{
                        $count = count($_SESSION['cart']);
                        $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                        $Item_name = $_POST['Item_name'];
                        $Price = $_POST['Price'];
                        $email_id = $_SESSION['email_id'];
                        $image = $_POST['image'];
                        // die($image);
                        $sql = "INSERT INTO `cart` (`Item_name`, `Price`, `email_id`,`image`) VALUES ('$Item_name', '$Price', '$email_id','$image');";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            $count = count($_SESSION['cart']);
                            $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                            echo  "<script>
                                    alert('Item added');
                                    window.location.href = 'menu.php';
                                </script>";
                        }
                    }
                }
                
            //    $myitems = array_column($_SESSION['cart'], 'Item_name');
            //     if(in_array($_POST['Item_name'], $myitems)){
            //             echo "<script>
            //                 alert('Item already added');
            //                 window.location.href = 'cart.php';
            //             </script>";
            //     }
            //     else{
            //         $Item_name = $_POST['Item_name'];
            //         $Price = $_POST['Price'];
            //         $email_id = $_SESSION['email_id'];
            //         $image = $_POST['image'];
            //         // die($image);
            //         $sql = "INSERT INTO `cart` (`Item_name`, `Price`, `email_id`,`image`) VALUES ('$Item_name', '$Price', '$email_id','$image');";
            //         $result = mysqli_query($conn, $sql);
            //         if($result){
            //             $count = count($_SESSION['cart']);
            //             $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
            //             echo  "<script>
            //                     alert('Item added');
            //                     window.location.href = 'menu.php';
            //                 </script>";
            //         }
            //     }
            }
            else{
                $_SESSION['cart'][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Item added');
                        window.location.href = 'menu.php';
                    </script>";
            }
        }
        if(isset($_POST['Buy_now'])){
            if(isset($_SESSION['cart'])){
                $Item_name = $_POST['Item_name'];
                $Price = $_POST['Price'];
                $email_id = $_SESSION['email_id'];
                $image = $_POST['image'];
                $sql = "INSERT INTO `cart` (`Item_name`, `Price`, `email_id`,`image`) VALUES ('$Item_name', '$Price', '$email_id','$image');";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                    echo  "<script>
                            alert('Item added');
                            window.location.href = 'cart.php';
                        </script>";
                }
                else{
                    // $count = count($_SESSION['cart']);
                    // $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1, 'image' => $_POST['image']);
                    echo  "<script>
                            alert('Error occured');
                            window.location.href = 'menu.php';
                        </script>";;
                }
            }
        }
        if(isset($_POST['Remove_item'])){
            // foreach($_SESSION['cart'] as $key => $value){
                $id = $_POST['id'];
                $email_id = $_SESSION['email_id'];
                    // if($value['Item_name'] == $_POST['Item_name']){
                    //     unset($_SESSION['cart'][$key]);
                    //     $_SESSION['cart'] = array_values($_SESSION['cart']);
                        $dsql = "DELETE FROM `cart` WHERE `cart`.`id` = '$id' AND `cart`.`email_id` = '$email_id'";
                        if($conn->query($dsql) === TRUE){
                            
                            echo "<script>
                                    alert('Item Removed');
                                    window.location.href = 'cart.php';
                                </script>";
                        }
                        else{
                                echo "Error deleting record: " . $conn->error;

                        }
                    // }
            // }
        }
        if(isset($_POST['add_to_wishlist'])){
            if(isset($_SESSION['wishlist'])){
                // $myitems = array_column($_SESSION['wishlist'], 'Item_name');
                // if(in_array($_POST['Item_name'], $myitems)){
                //     echo "<script>
                //             alert('Item already added');
                //             window.location.href = 'menu.php';
                //         </script>";
                // }
                // else{
                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                    $Item_name = $_POST['Item_name'];
                    $Price = $_POST['Price'];
                    $email_id = $_SESSION['email_id'];
                    $image = $_POST['image'];
                    $sql = "INSERT INTO `wishlist` (`Item_name`, `Price`, `email_id`, `image`) VALUES ('$Item_name', '$Price', '$email_id', '$image');";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $count = count($_SESSION['wishlist']);
                        $_SESSION['wishlist'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                        echo  "<script>
                                alert('Item added');
                                window.location.href = 'menu.php';
                            </script>";
                    }
                // }
            }
            else{
                $_SESSION['wishlist'][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Item added');
                        window.location.href = 'wishlist.php';
                    </script>";
            }
        }
        if(isset($_POST['remove_wishlist'])){
            $email_id = $_SESSION['email_id'];
            $id = $_POST['id'];
            $sql = "DELETE FROM `wishlist` WHERE `wishlist`.`id` = '$id' AND `wishlist`.`email_id` = '$email_id'";
            if($conn->query($sql) === TRUE){
                echo "<script>
                    alert('Item Removed');
                    window.location.href = 'wishlist.php';
                </script>";
            }
            else{
                echo "Error deleting record: " . $conn->error;
            }
        }
        if(isset($_POST['move_to_wishlist'])){
            if(isset($_SESSION['cart'])){
                    // $count = count($_SESSION['cart']);
                    // $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                    $Item_name = $_POST['Item_name'];
                    $Price = $_POST['Price'];
                    $email_id = $_SESSION['email_id'];
                    $image = $_POST['image'];
                    // die($image);
                    $sql = "INSERT INTO `wishlist` (`Item_name`, `Price`, `email_id`, `image`) VALUES ('$Item_name', '$Price', '$email_id', '$image');";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $count = count($_SESSION['wishlist']);
                        $_SESSION['wishlist'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                        echo  "<script>
                                alert('Item added');
                                window.location.href = 'menu.php';
                            </script>";
                    }
            }
            else{
                $_SESSION['wishlist'][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Item added');
                        window.location.href = 'wishlist.php';
                    </script>";
            }
        }
        if(isset($_POST['move_to_bag'])){
            if(isset($_SESSION['wishlist'])){
                $Item_name = $_POST['Item_name'];
                $Price = $_POST['Price'];
                $email_id = $_SESSION['email_id'];
                $image = $_POST['image'];
                // die($image);
                $sql = "INSERT INTO `cart` (`Item_name`, `Price`, `email_id`, `image`) VALUES ('$Item_name', '$Price', '$email_id','$image');";
                $result = mysqli_query($conn, $sql);
                if($result){
                    // $count = count($_SESSION['cart']);
                    // $_SESSION['cart'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                    echo  "<script>
                            alert('Item added');
                            window.location.href = 'cart.php';
                        </script>";
                }
                // $myitems = array_column($_SESSION['wishlist'], 'Item_name');
                // if(in_array($_POST['Item_name'], $myitems)){
                //     echo "<script>
                //             alert('Item already added');
                //             window.location.href = 'cart.php';
                //         </script>";
                // }
                // else{
                //     $count = count($_SESSION['wishlist']);
                //     $_SESSION['wishlist'][$count] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                //     echo  "<script>
                //             alert('Item added');
                //             window.location.href = 'cart.php';
                //         </script>";
                // }
            }
            else{
                $_SESSION['wishlist'][0] = array('Item_name' => $_POST['Item_name'], 'Price' => $_POST['Price'], 'Quantity' => 1);
                echo "<script>
                        alert('Item added');
                        window.location.href = 'wishlist.php';
                    </script>";
            }
        }
        
    }
?>
