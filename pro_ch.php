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
    $id = $_GET['product_id'];
    $sql="SELECT * FROM tbl_products where product_id='$id'";
    $result = $mysqli->query($sql);
    
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
                   <a href="adproview.php"id="active--link">
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
                    <a href="feed_view.php" >
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Feedback</span>
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
                            <th >Product_Title</th>
                            <th >Product_Description</th>
                            <th>Product_Price</th>
                            <th>Manage</th>
                            </tr>
                        </thead>
                       <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                       
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
        {
            ?>
            <tr>
                 <td><img src="product_images/<?php echo $rows['product_image1'];?>" width="50px" height="50px"></td>
                 <form action="" method="post" enctype="multipart/form-data">
                <td><input type="text" name="product_title" id="product_title" class="form-control" 
                    value="<?php echo $rows['product_title'];?>" autocomplete="off" required></td>
                    <td><input type="text" name="product_description" id="product_description" class="form-control" 
                    value="<?php echo $rows['product_description'];?>" autocomplete="off" required></td>
                    <td><input type="text" name="product_price" id="product_price" class="form-control" 
                    value="<?php echo $rows['product_price'];?>" autocomplete="off" required></td>
                    <td><input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="CHANGE"></td>
        </tr>
       
       
            
        <?php
                }
            ?>    
           
         </table>
         </form>   </div>
            </div>
            </div>
       
                
    </section>
</body>

</html>
<?php 

if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $product_price=$_POST['product_price'];

    $insert_products="UPDATE tbl_products set product_title= '$product_title',product_description= '$description', product_price='$product_price' 
    WHERE product_id='$id'";

$result_query=mysqli_query($mysqli,$insert_products);
if($result_query){
    echo "<script> alert('Product change is successfull ');
    window.location.href='adproview.php';</script>";
}
}
?>