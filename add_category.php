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
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cd'];
      
        //select data from database
        $select_query="select * from tbl_categories where category_title='$category_title'";
        $result_select=mysqli_query($mysqli,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
          echo "<script>alert('This category is present inside the database.')</script>";
        }else{
      
        $insert_query ="INSERT INTO `tbl_categories`( `category_title`) VALUES ('$category_title')";
        $result=mysqli_query($mysqli,$insert_query);
        if($result){
          echo "<script>alert('Category has been inserted successfully')</script>";
        }
      }
    }
    $sql="SELECT * FROM `tbl_categories` WHERE status=1";
    $sql1="SELECT * FROM `tbl_categories` WHERE status=0";
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
                        <span class="sidebar--item">Add PRODUCT</span>
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
                <div class="title">
                    <h2 class="section--title">Add Category</h2>
                </div>
                <div class="table">
                    <table>
                    <tr>
						<td ><b>Category</b></td>
				    </tr> 
                    <tr>
                    <td><input type="text" name="cd" id="cd" autocomplete="off"required></td>
                    <td><input type="submit" value="Add" id="btn" name="insert_cat"  class="btn"></td>
                    </tr>
                    </table>
                </div>
        </form>
        <h3>Category Management</h3>
        <div class="table">
                    <table>
                        <thead>
                            <tr>
                            <th >category_title</th>
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
                <td><a href="delete_cat.php?category_id=<?php echo $rows['category_id'];?>"><button style="color: White; background-color:red;">Deactivate</button></a></tb>
            </tr>
            <?php
                }
            ?>
         </table>

         <h3>Removed Category</h3>
         <table>
                    <thead>
                    <thead>
                            <tr>
                            <th >category_title</th>
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
                <td><?php echo $rows['category_title'];?></td>
                <td><a href="update_cat.php?category_id=<?php echo $rows['category_id'];?>"><button style="color: White; background-color:green;">Activate</button></a></tb>
            </tr>
            <?php
                }
            ?>
         </table>
        </div> 
    </section>
</body>

</html>