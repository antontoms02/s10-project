<?php
     session_start();
     if(!isset($_SESSION["email"])) 
     {
         header("Location:login.php");
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
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cd'];
  
    //select data from database
    $select_query="select * from tbl_brands where brand_title='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
      echo "<script>alert('This brand is present inside the database.')</script>";
    }else{
  
    $insert_query ="INSERT INTO `tbl_brands`( `brand_title`) VALUES ('$brand_title')";
    $result=mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('Brand has been inserted successfully')</script>";
    }
  }
}

$sql="SELECT * FROM `tbl_brands` WHERE status=1";
$sql1="SELECT * FROM `tbl_brands` WHERE status=0";
$result = $mysqli->query($sql);
$result1 = $mysqli->query($sql1);
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
        <form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
        <i class="fa-solid fa-receipt"></i></span>
        
    <div class="table">
                    <table>
                    <tr>
						<td ><b>brands</b></td>
				    </tr> 
                    <tr>
                    <td><input type="text" name="brand_title" id="cd" autocomplete="off"required></td>
                    <td><input type="submit" value="Add" id="btn" name="insert_brand"  class="btn"></td>
                    </tr>
                    </table>
</form>
<h3>brands Management</h3>
        <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th >brand_title</th>
                            <th >Manage</th>
                            </tr>
                        </thead>
                       <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['category_title'];?></td>
                <td><a href="cat_remove.php?brand_id=<?php echo $rows['brand_id'];?>"><button style="color: White; background-color:red;">Deactivate</button></a></tb>
            </tr>
            <?php
                }
            ?>
         </table>

         <h3>Removed brands</h3>
         <table>
                    <thead>
                    <thead>
                            <tr>
                            <th >brand_title</th>
                            <th >Manage</th>
                            </tr>
                        </thead>
                    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result1->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['brand_title'];?></td>
                <td><a href="update_cat.php?brand_id=<?php echo $rows['brand_id'];?>"><button style="color: White; background-color:green;">Activate</button></a></tb>
            </tr>
            <?php
                }
            ?>
         </table>
        </div> 
    </section>
</body>

</html>
        



