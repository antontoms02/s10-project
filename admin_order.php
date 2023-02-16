<?php
session_start();
    if(!isset($_SESSION["email"])) 
    {
        header("Location:login2.php");
    }
    // Username is root
    $user = 'root';
    $password = '';
     
    // Database name is registration
    $database = 'tesla';
    $servername='localhost';
    $mysqli = new mysqli($servername, $user,
                    $password, $database);
     
    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' .
        $mysqli->connect_errno . ') '.
        $mysqli->connect_error);
    }
    $sql="SELECT * FROM order_items";
    $result = $mysqli->query($sql);
    if(isset($_POST['cart'])){
        $status=$_POST['status'];
        $id=$_POST['order_id'];
        $add="UPDATE `order_items` SET `status`='$status' WHERE id='$id'";
        $result1= $mysqli->query($add);
        if($result1){
            echo "<script>alert('Order Updated')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>

    </style>   
</head>

<body>
<section class="header">
        <div class="logo">
        <h2>TESLA</h2>
        </div>
        <div class="search--notification--profile">
                <div>
                </div>
                        <h2>Welcome Admin</h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
            <li>
                    <a href="admindashboard.php" id="active--link">
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Admin Dashboard</span>
                    </a>
                </li>
                
                <li>
                <a href="add_category.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add category</span>
                    </a>
                </li>
                <li>
                <a href="insert_brands.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add brands</span>
                    </a>
                </li>
                <li>
                   <a href="products.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add products</span>
                    </a>
                </li>
                <li>
                   <a href="adproview.php">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">View Products</span>
                    </a>
                </li>
                <li>
                   <a href="update_stock.php" >
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Stock Updation</span>
                    </a>
                </li>
                <li>
                    <a href="admin_order.php" >
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Manage Order</span>
                    </a>
                </li>
                <li>
                    <a href="datavisualization.php" >
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">current stock</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">
                <div>
                    <h2 > Product Details</h2>
                </div>
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
                 <td><img src="product_images/<?php echo $rows['img'];?>" width="90px" height="50px"></td>
                <td><?php echo $rows['product_title'];?></td>
                <td><?php echo $rows['quantity'];?></td>
                <td><?php echo $rows['price'];?></td>
                <td><?php echo $rows['status'];?></td>
                <?php if($rows['status']!="Canceled" AND $rows['status']!="Delivered"){ ?>
                <form method="post" action="" enctype="multipart/form-data" id="signup">
               <td> <select name="status" id="status">
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                </select></td>
                <input type="hidden" name="order_id" id="order_id" value="<?php echo $rows['id']; ?>">
                <td><input type="submit" value="Update" class="cart" name="cart"></td>
                <?php } ?>
                </form>
                </tr>
                <?php
                }
            ?>
         </table>

                </div>
            </div>
            </div>
       
        
    </section>
</body>

</html>
