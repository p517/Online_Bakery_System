<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS files/gallery.css">
    <title>Images</title>
    <style>
        /* .wrapper{
            max-width: 1100px;
            margin: 0 115px;
        } */
    </style>
</head>
<body>
    
    <div class="wrapper">
        <div class="gallery">
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/1.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/2.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/3.jpeg" alt=""></span></div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/4.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/5.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/6.jpeg" alt=""></span></div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/7.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/8.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/9.jpeg" alt=""></span></div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/10.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/11.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/12.jpeg" alt=""></span></div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/13.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/14.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/15.jpeg" alt=""></span></div> 
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/16.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/17.jpeg" alt=""></span></div> 
                </div>
                <div class="col-lg-4">
                    <div class="image"><span><img src="img/gallery/18.jpeg" alt=""></span></div> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="video">
                        <span>
                            <video class="tab" controls>Your browser does not support the &lt;video&gt; tag.
                                <source src="img/gallery/24.mp4">
                              </video>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="video">
                        <span>
                            <video class="tab" controls>Your browser does not support the &lt;video&gt; tag.
                                <source src="img/gallery/25.mp4">
                              </video>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="video">
                        <span>
                            <video class="tab" controls>Your browser does not support the &lt;video&gt; tag.
                                <source src="img/gallery/26.mp4">
                              </video>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="video">
                        <span>
                            <video class="tab" controls>Your browser does not support the &lt;video&gt; tag.
                                <source src="img/gallery/27.mp4">
                              </video>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="video">
                        <span>
                            <video class="tab" controls>Your browser does not support the &lt;video&gt; tag.
                                <source src="img/gallery/28.mp4">
                              </video>
                        </span>
                    </div>
        
                </div>
                <div class="col-lg-4">
                    
                </div>
            </div>
            
            

        </div>
    </div>
    <div class="preview-box">
        <div class="details">
          <span class="title">Image <p class="current-img"></p> of <p class="total-img"></p></span>
          <span class="icon fas fa-times"></span>
        </div>
        <div class="image-box">
          <div class="slide prev"><i class="fas fa-angle-left"></i></div>
          <div class="slide next"><i class="fas fa-angle-right"></i></div>
          <img src="" alt="">
        </div>
    </div>
    <div class="shadow"></div>

    <script>
        const gallery  = document.querySelectorAll(".image"),
        previewBox = document.querySelector(".preview-box"),
        previewImg = previewBox.querySelector("img"),
        closeIcon = previewBox.querySelector(".icon"),
        currentImg = previewBox.querySelector(".current-img"),
        totalImg = previewBox.querySelector(".total-img"),
        shadow = document.querySelector(".shadow");

        window.onload = ()=>{
            for (let i = 0; i < gallery.length; i++) {
                totalImg.textContent = gallery.length; //passing total img length to totalImg variable
                let newIndex = i; //passing i value to newIndex variable
                let clickedImgIndex; //creating new variable
                
                gallery[i].onclick = () =>{
                    clickedImgIndex = i; //passing cliked image index to created variable (clickedImgIndex)
                    function preview(){
                        currentImg.textContent = newIndex + 1; //passing current img index to currentImg varible with adding +1
                        let imageURL = gallery[newIndex].querySelector("img").src; //getting user clicked img url
                        previewImg.src = imageURL; //passing user clicked img url in previewImg src
                    }
                    preview(); //calling above function
            
                    const prevBtn = document.querySelector(".prev");
                    const nextBtn = document.querySelector(".next");
                    if(newIndex == 0){ //if index value is equal to 0 then hide prevBtn
                        prevBtn.style.display = "none"; 
                    }
                    if(newIndex >= gallery.length - 1){ //if index value is greater and equal to gallery length by -1 then hide nextBtn
                        nextBtn.style.display = "none"; 
                    }
                    prevBtn.onclick = ()=>{ 
                        newIndex--; //decrement index
                        if(newIndex == 0){
                            preview(); 
                            prevBtn.style.display = "none"; 
                        }else{
                            preview();
                            nextBtn.style.display = "block";
                        } 
                    }
                    nextBtn.onclick = ()=>{ 
                        newIndex++; //increment index
                        if(newIndex >= gallery.length - 1){
                            preview(); 
                            nextBtn.style.display = "none";
                        }else{
                            preview(); 
                            prevBtn.style.display = "block";
                        }
                    }
                    document.querySelector("body").style.overflow = "hidden";
                    previewBox.classList.add("show"); 
                    shadow.style.display = "block"; 
                    closeIcon.onclick = ()=>{
                        newIndex = clickedImgIndex; //assigning user first clicked img index to newIndex
                        prevBtn.style.display = "block"; 
                        nextBtn.style.display = "block";
                        previewBox.classList.remove("show");
                        shadow.style.display = "none";
                        document.querySelector("body").style.overflow = "scroll";
                    }
                }
                
            }
            
        }
    </script>
</body>
</html>

<!-- <div class="col-md-4"> -->
    <!-- <form action="manage_cart.php" method = "POST">
        <div class="card">
            <div class="card-body">
                <img src="img/<?php echo $row['image']; ?>" alt="Cake Image" height="150px" width="180px"/>
            </div>
            <h1 class="card-title">
                <?php echo $row['name'];?>
            </h1>
            <div class="overlay">
                <div class="text">
                    <p class="price"><?php echo "Rs. " . $row['price'];?></p>
                    <button type="submit" name="Add_to_cart" class="btn btn-success">Add to Cart</button>
                    <input type="hidden" name="Item_name" value="Cake">
                    <input type="hidden" name="Price" value="650">
                </div>
            </div>
        </div>
    </form> -->
<!-- </div> -->