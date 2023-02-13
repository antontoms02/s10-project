<?php 
include 'connection.php';
$sql="SELECT * FROM order_items";
$result = mysqli_query($con,$sql);
$total=0;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>tesla</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

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
                    <a class="nav-link active" href="index.php"> Home</a>

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
                        <td style="font-weight:bold;"><?php echo $rows['status'];?></td> 
                        <?php
                        }else if($rows['status']!="Canceled" AND $rows['status']!="Delivered"){ ?>
                <td><a href="cancel_order.php?id=<?php echo $rows['id'];?>"><button style="padding:10px;">Cancel</button></a></tb>
                <?php } ?>
            </tr>
            <?php
                }
            ?>
         </table>

        <div class="col-lg-4 offset-lg-4">
        <div class="checkout" style="background-color:white; margin-top:15px; padding:15px;">
            <ul>
                <li style="text-align:center;">Grand Total =
                    <span>₹ <?php echo $total;?>/-</span>
                    <a href="checkout1.php "><button >checkout</button></a>
                </li>
                
            </ul>
        </div>
    </div>

                </div>
            </div>
            
            </section>

        </main>

    </body>
</html>
