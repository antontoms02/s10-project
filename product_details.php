<?php

include 'connection.php';
/* include 'google_translater.php'; */
 
if(!isset($_SESSION["email"])) 
 {
     header("Location:login2.php");
 }




// if(isset($_GET['prod'])){
// $productId = $_GET['prod'];
// $sql = "SELECT * FROM tbl_products WHERE product_id = $productId AND status='true'";
// $prod_result = mysqli_query($con,$sql);
// }


// if(isset($_GET['addCartt'])){
//     $uid = $_SESSION['email'];
//     $prod=$_GET["addCartt"];   


//     $sql="SELECT * FROM tbl_products WHERE product_id=$prod";
//     $result1 = $con->query($sql);
//     while($rows=$result1->fetch_assoc())
//                 {
//                     $prod_title=$rows['product_title'];
//                 }
            
        
       
//    /*  
//     $select="SELECT * from tbl_cart where email=$uid and prod_id=$prod";
//     $result=mysqli_query($con,$select);
//     if(mysqli_num_rows($result)>0)
//     {
//         $msg = "<div class='alert alert-danger'>Already added to cart.</div>";
//     } 
//     else
//     {
//         $qry = "INSERT INTO `tbl_cart` (`login_id`,`prod_id`,`quantity`) VALUES('$uid','$prod','1')";
//         $result_query=mysqli_query($con,$qry);
//         if($result_query){
//             echo "<script>
//             alert('Added to cart');
//             window.location.href='product_details.php?prod=$prod';
//             </script>";
//             $msg = "<div class='alert alert-success'>Added to cart</div>";
//         }
//     } */
// }


?> 

<html>
    <head>
        <title>Details</title>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    
    <!-- site metas -->
    <title>TESLA</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="home.jpeg" type="image/gif" />
    
    <!-- Tweaks for older IEs-->
    <!-- <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css"> -->
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS FILES -->
        <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

       <!--  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet"> -->

        <link href="css/bootstrap.min.css" rel="stylesheet">
      <!--   <link href="css/bootstrap-icons.css" rel="stylesheet"> -->

        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">




        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500"> 

        <link rel="stylesheet" href="prod_details_style.css">



        

    </head>
    
    <body>
   
    
    <!-- INSERT NAVBAR HERE -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <h1>TESLA</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li><a href="index.php">Home</a></li>
                                        <?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                            { ?>
                             <li class="nav-item">
                                <a class="nav-link" href="order_view.php">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wishlist.php">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">cart</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="logout.php"> <i class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            <?php }
                            else{ ?>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="login2.php"><i class="bi bi-box-arrow-in-left"></i>Login</a>
                            </li>
                         <?php } ?>
  <div id="myModal" style="background:transparent; margin-left:60px;" class="modal">
    <div class="wrapper">
        <div class="title">Chatbot <i style="margin-left:68%;" class="fa fa-close"  id="bn"></i></div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button type="submit" id="send-btn">Send</button>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><i class="fas fa-user"></i><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        var bn = document.getElementById("bn");
        bn.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
                                        <li class="last">
                                            <a href="#"><img src="images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/call.png" />(+91) 6282987602</li>
                                <li><img src="icon/email.png" />tesla@gmail.com</li>
                                <li><img src="icon/loc.png" />Location</li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
        
<?php 
if(isset($_GET['prod'])){
    $productId = $_GET['prod'];
    $sql = "SELECT * FROM tbl_products WHERE product_id = $productId";
    $prod_result = mysqli_query($con,$sql);
    
        while($row = mysqli_fetch_assoc($prod_result))
        {
            /* echo "<b>$row[product_name]</b><br>";
            echo "<b>Brand : </b> $row[product_brand] <br>";
            echo "<b>Description : </b> $row[description] <br>";;
            echo "<b>Price : </b> $row[price] <br><br>";
            "<br>";  */
        
    ?>
        <div class = "card-wrapper">
            <div class = "card">
                <!-- card left -->
                <div class = "product-imgs">
                    <div class = "img-display">
                        <div class = "img-showcase">
                            <img src = "product_images/<?php echo $row['product_image1'];?>" alt = "shoe image">
                            <img src = "product_images/<?php echo $row['product_image1'];?>" alt = "shoe image">
                            <img src = "product_images/<?php echo $row['product_image2'];?>" alt = "shoe image">
                            <img src = "product_images/<?php echo $row['product_image3'];?>" alt = "shoe image"> 
                        </div>
                    </div>
                    
                    <div class = "img-select">
                        <div class = "img-item">
                            <a href = "#" data-id = "1">
                            <img src = "product_images/<?php echo $row['product_image2'];?>" alt = "shoe image">
                            </a>
                        </div>
                        <div class = "img-item">
                            <a href = "#" data-id = "2">
                            <img src = "product_images/<?php echo $row['product_image2'];?>" alt = "shoe image">
                            </a>
                        </div>
                        <div class = "img-item">
                            <a href = "#" data-id = "3">
                            <img src = "product_images/<?php echo $row['product_image1'];?>" alt = "shoe image">
                            </a>
                        </div>
                        <div class = "img-item">
                            <a href = "#" data-id = "4">
                            <img src = "product_images/<?php echo $row['product_image1'];?>" alt = "shoe image">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- card right -->
                <div class = "product-content">
                    <h5 class = "product-title"><?php echo $row['product_title'];?></h5>
                    <!-- <a href = "#" class = "product-link">visit nike store</a> -->
                    <!-- <div class = "product-rating">
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star"></i>
                        <i class = "fas fa-star-half-alt"></i>
                        <span>4.7(21)</span>
                    </div> -->

                    <div class = "product-price">
                       <!--  <p class = "last-price">Old Price: <span>$257.00</span></p> -->
                        <p class = "new-price">Price: <span><?php echo $row['product_price'];?></span></p>
                    </div>

                    <div class = "product-detail">
                        <h2>about this item: </h2>
                        <p><?php echo $row['product_description'];?></p>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius. Dignissimos, labore suscipit. Unde.</p> -->
                        <!-- <ul>
                            <li>Color: <span>Black</span></li>
                            <li>Available: <span>in stock</span></li>
                            <li>Category: <span>Shoes</span></li>
                            <li>Shipping Area: <span>All over the world</span></li>
                            <li>Shipping Fee: <span>Free</span></li>
                        </ul> -->
                    </div>

                    <div class = "purchase-info">
                        
                        
                        <?php
                         $email=$_SESSION["email"];
                         $sql="SELECT * FROM tbl_products WHERE product_id = $productId";
                            $result = $con->query($sql);
                            if(isset($_POST['cart'])){
                                $product_title=$_POST['product_title'];
                                $product_price=$_POST['product_price'];
                                $product_image1=$_POST['product_image1'];
                                $quantity=$_POST['qty'];
                                $total=$product_price * $quantity;
                                $insert_products="INSERT INTO `tbl_cart`(Proudect_Title,Product_image,Product_Price,cart_qty,is_checked_out,email) VALUES ('$product_title','$product_image1','$total','$quantity',0,'$email')";
                                $result_query=mysqli_query($con,$insert_products);
                                if($result_query){
                                    echo "<script>alert('Successfully inserted the products.')</script>";
                                }}?>

                                <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
                <form method="post" action="" enctype="multipart/form-data" id="signup">
                <input type = "number" min = "1" name='qty' value = "1"><br>              
                <input type="hidden" name="product_title" id="product_title" value="<?php echo $rows['product_title']; ?>">
                <input type="hidden" name="product_image1" id="product_image1" value="<?php echo $rows['product_image1']; ?>">
                <input type="hidden" name="product_price" id="product_price" value="<?php echo $rows['product_price']; ?>">
                <?php
                }
            ?>     
                <input type="submit" value="Add to cart" id="cart" style="background-color:grey;" name="cart" class="btn">

                
</form>

    
            
 
                   <!-- <a href="cart.php?addCartt=<?php echo $row['product_id'];?>" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
                        
                        <?php
          if ($row['qty'] == "0") {
          echo "<p><span style='color:red;'>Out of stock!!!</span></p>";
          }
          else{
            echo "<p><span style='color:red;'></span></p>";
          }
          ?>
                        
                        
                        <!-- <button type = "button" class = "btn">Wishlist</button> -->
                    </div>

                    <!-- <div class = "social-links">
                        <p>Share At: </p>
                        <a href = "#">
                        <i class = "fab fa-facebook-f"></i>
                        </a>
                        <a href = "#">
                        <i class = "fab fa-twitter"></i>
                        </a>
                        <a href = "#">
                        <i class = "fab fa-instagram"></i>
                        </a>
                        <a href = "#">
                        <i class = "fab fa-whatsapp"></i>
                        </a>
                        <a href = "#">
                        <i class = "fab fa-pinterest"></i>
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
        <?php
        }
}
    ?>

        

        

        


        <script src="prod_det.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--boostrap js-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>
    </body>
</html>
