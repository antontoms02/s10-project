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
    $sql="SELECT * FROM tbl_products";
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
        <h2>RAZER</h2>
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
                    <a href="admindashboard.php" >
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item"> Admin Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="req_view.php">
                        <span class="icon icon-2"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Sellers</span>
                    </a>
                </li>

                <li>
                    <a href="add_category.php">
                        <span class="icon icon-3"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="insert_brands.php">
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Brands</span>
                    </a>
                </li>
                <li>
                    <a href="product_admin.php" id="active--link">
                        <span class="icon icon-4"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Manage Product</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
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
                <td><?php echo $rows['product_title'];?></td>
                <td><?php echo $rows['product_description'];?></td>
                <td><?php echo $rows['product_price'];?></td>
                <?php if ($rows['product_status']==true){?>
                    <td><a href="admin_remove.php?product_id=<?php echo $rows['product_id'];?>"><button style="color: White; background-color:red;">Deactivate</button></a></tb>
                <?php
                }
                else{
                    ?>
                    <td><a href="admin_add.php?product_id=<?php echo $rows['product_id'];?>"><button style="color: White; background-color:green;">Activate</button></a></tb>
                <?php
                }
                ?>
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
