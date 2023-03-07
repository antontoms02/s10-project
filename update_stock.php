<?php
include('connection.php');
  $sql="SELECT * FROM  tbl_products";
  $result = mysqli_query($con,$sql);
  if(isset($_POST['stock'])){
      $product_title=$_POST['product_title'];
      $qty=$_POST['Quatity'];
      $quantity=$qty + $_POST['qty'];
      $insert_products="UPDATE `tbl_products` SET qty='$quantity' WHERE product_title='$product_title';";
      $result_query=mysqli_query($con,$insert_products);
      if($result_query){
          echo "<script>alert('Stock Updated.')</script>";
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
    <style>
     .table {
    text-align: left;
    }
    #cd{
      height:30px;
      width: 300px;
    }
    #btn{
     padding:10px;
     background-color:mediumblue;
     color:white;
    }
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
                        <span class="sidebar--item">Add PRODUCT</span>
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
        <form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
        <i class="fa-solid fa-receipt"></i></span>
        <table>
                        <thead>
                            <tr>
                            <th>Product image</th>
                            <th >Product Title</th>
                            <th>Current Stock</th>
                            <th>Update</th>
                            <th>Manage</th>
                            <th></th>
                            </tr>
                        </thead>
                       <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                 <td><img src="product_images/<?php echo $rows['product_image1'];?>" width="90px" height="50px"></td>
                <td><?php echo $rows['product_title'];?></td>
                <td><?php echo $rows['qty'];?></td>
                <form method="post" action="" enctype="multipart/form-data" id="signup">
                <input type="hidden" name="product_title" id="product_title" value="<?php echo $rows['product_title'];?>">
                <input type="hidden" name="Quatity" id="Quatity" value="<?php echo $rows['qty'];?>">
                <td>Quantity:<input type="number" min="1" name="qty" id="qty" max=10 value="1"></td>
                <td><input type="submit" value="Update" class="stock" name="stock"></tb>
            </tr>
                </form>
            <?php
                }
            ?>

         </table>

</form>
        



