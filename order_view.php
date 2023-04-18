<?php 
include 'connection.php';
$reg=$_SESSION['email'];
$sql="SELECT * FROM order_items WHERE email='$reg'";
$result = mysqli_query($con,$sql);
$total=0;
?>
<!doctype html>
<html lang="en">
    <head>
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
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    
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
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="css/slick.css"/>
        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        
        <style>
    .table{
        margin-top: 50px;
        
    }
    table {
        width: 70%;
        margin-left:250px;
        text-align: center;
        border-collapse: collapse;
    }
    tr {
        border-bottom: 1px solid #f1f1f1;
    }
    th {
        background-color:#808080;
    }
    td,
    th {
        padding-block: 10px;
    }
    .img--box {
        position: relative;
        width: 71px;
        height: 71px;
        overflow: hidden;
        border-radius: 50%;
    }
        </style>
        
    </head>
    
    <body>
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
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/call.png" />(+91) 6282987602</li>
                                <li><img src="icon/email.png" />tesla@gmail.com</li>
                                <li><img src="icon/loc.png" />Location</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

            </div>
            </nav>
            <section class="featured-product section-padding">
            <div class="main--content">
            <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th>Product_image</th>
                            <th >Proudect_Title</th>
                            <th>Quantity</th>
                            <th>Product_Price</th>
                            <th>Purchase</th>
                            </tr>
                        </thead>
                       <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                 <td><img src="product_images/<?php echo $rows['img'];?>" width="120px" height="80px"></td>
                <td><?php echo $rows['product_title'];?></td>
                <td><?php echo $rows['quantity'];?></td>
                <td><?php echo $rows['price'];?></td>
                <?php if( $rows['status']=="Pending")
                        { ?>
                            <td style="font-weight:bold;"><?php echo $rows['status'];?></td>
                        <?php }else if($rows['status']=="Rejected"){?>
                            <td style="font-weight:bold;"><?php echo $rows['status'];?></td>
                        <?php
                        }else{ ?>
                            <td style="font-weight:bold;"><?php echo $rows['status'];?></td>
                         <?php } ?>
                         <?php if( $rows['status']=="Delivered")
                        { ?> 
                        <td><a href="print.php?id=<?php echo $rows['id'];?>"><button style="padding:10px;">Recipt</button></a></td>
                        <?php
                        }else if($rows['status']!="Canceled" AND $rows['status']!="Delivered"){ ?>
                <td><a href="cancel_order.php?id=<?php echo $rows['id'];?>"><button style="padding:10px;">Cancel</button></a></tb>
                <?php } ?>
            </tr>
            <?php
                }
            ?>
         </table>

                </div>
            </div>
            
            </section>

        </main>

    </body>
</html>
