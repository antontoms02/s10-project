<?php

 include 'connection.php';
 
 if(!isset($_SESSION["email"])) 
 {
     header("Location:login2.php");
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
</head>

<body>
<section class="header">
        <div class="logo">
        <h2>TESLA</h2>
        </div>
        <div class="search--notification--profile">
            <div class="notification--profile">
                <div class="picon bell">
                    <i class="ri-notification-2-line"></i>
                </div>
                <a href="#">
                    <div class="picon chat">
                        <span>Admin</span>
                        <span><img class="picon profile" src="" alt="PIC"></span>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="#" id="active--link">
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
                    <a href="logout.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="main--content">
            <div class="overview">
                <div class="title">
                    <h2 class="section--title">Overview</h2>-->
                    <!--
                    <select name="date" id="date" class="dropdown">
                        <option value="today">Today</option>
                        <option value="lastweek">Last Week</option>
                        <option value="lastmonth">Last Month</option>
                        <option value="lastyear">Last Year</option>
                        <option value="alltime">All Time</option>
                    </select>
                    -->
                </div>
                <div class="cards">
                    <div class="card card-1">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Total users</h5>
                                <?php 
			   $sql = "SELECT * from register";
			   $result = mysqli_query($con,$sql);
			   echo mysqli_num_rows($result);
			   ?>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        
                        <!--<div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>65%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>10</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>-->
                        
                    </div>
                    <div class="card card-2">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">logged in</h5>
                                <?php 
			   $sql = "SELECT * from tbllogin";
			   $result = mysqli_query($con,$sql);
			   echo mysqli_num_rows($result);
			   ?>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        <!--
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>82%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>230</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>45</span>
                        </div>
                        
                    </div>
                    <div class="card card-3">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Other Staffs</h5>
                                <h1>4</h1>
                            </div>
                            <i class="ri-user-line card--icon--lg"></i>
                        </div>
                        
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>27%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>31</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>23</span>
                        </div>
                        -->
                    </div>
                    <!--
                    <div class="card card-4">
                        <div class="card--data">
                            <div class="card--content">
                                <h5 class="card--title">Beds Available</h5>
                                <h1>15</h1>
                            </div>
                            <i class="ri-hotel-bed-line card--icon--lg"></i>
                        </div>
                        <div class="card--stats">
                            <span><i class="ri-bar-chart-fill card--icon stat--icon"></i>8%</span>
                            <span><i class="ri-arrow-up-s-fill card--icon up--arrow"></i>11</span>
                            <span><i class="ri-arrow-down-s-fill card--icon down--arrow"></i>2</span>
                        </div>
                    </div>
                    -->
                </div>
            </div>
          <!--  <div class="doctors">
                <div class="title">
                    <h2 class="section--title">Faculties</h2>
                    <div class="doctors--right--btns">-->
                            <!--
                            <select name="date" id="date" class="dropdown doctor--filter">
                            $_COOKIE<option >Filter</option>
                            <option value="free">Free</option>
                            <option value="scheduled">Scheduled</option>-->
                     <!--   </select>
                        <button class="add"><i class="ri-add-line"></i>Add Faculty</button>
                    </div>
                </div>
                <div class="doctors--cards">
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor1.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor2.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor3.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor4.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor5.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor6.jpg" alt="">
                            </div>
                        </div>
                        <p class="free">Free</p>
                    </a>
                    <a href="#" class="doctor--card">
                        <div class="img--box--cover">
                            <div class="img--box">
                                <img src="assets/images/doctor7.jpg" alt="">
                            </div>
                        </div>
                        <p class="scheduled">Scheduled</p>
                    </a>
                </div>
            </div>-->
            <div class="recent--patients">
                <div class="title">
                    <h2 class="section--title">users</h2>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>userame</th>
                                <th>Email</th>
                                <th>Mobile no</th>
                                <th>manage</th>
                               <!-- <th>Status</th>
                                <th>Settings</th>-->
                            </tr>
                        </thead>
                        <tbody> <?php


 
// SQL query to select data from database
$sql="SELECT * FROM `register` WHERE name!='admin' and status=1 ";
$sql1="SELECT * FROM `register` WHERE status=0";
$result = $con->query($sql);
$result1 = $con->query($sql1);
$con->close();
?>
 <!-- PHP CODE TO FETCH DATA FROM ROWS -->
 <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['mob'];?></td>
                
                <td><a href="delete.php?id=<?php echo $rows['id'];?>"><button  style="color: White; background-color:red;">Deactivate</button></a></tb>
            </tr>
            <?php
                }
            ?>
        </table>
        
         <!-- TABLE CONSTRUCTION  SELLER-->
        
        <!-- TABLE CONSTRUCTION -->
        <table class="t2">
        <h2 id="n1">Removed Users</h2>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile No</th>
                <th>Manage</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result1->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['mob'];?></td>
                <td><a href="add.php?id=<?php echo $rows['id'];?>"><button style="color: White; background-color:green;">Activate</button></a></tb>
            </tr>
            <?php
                }
            ?>
           
                            <!--<tr>
                                <td>Cameron Williamson</td>
                                <td>30/07/2022</td>
                                <td>Male</td>
                                <td>8</td>
                                <td class="pending">pending</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>
                            <tr>
                                <td>George Washington</td>
                                <td>30/07/2022</td>
                                <td>Male</td>
                                <td>10</td>
                                <td class="confirmed">Confirmed</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>
                            <tr>
                                <td>John Adams</td>
                                <td>29/07/2022</td>
                                <td>Male</td>
                                <td>12</td>
                                <td class="confirmed">Confirmed</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>
                            <tr>
                                <td>Thomas Jefferson</td>
                                <td>29/07/2022</td>
                                <td>Male</td>
                                <td>8</td>
                                <td class="rejected">Rejected</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>
                            <tr>
                                <td>James Madison</td>
                                <td>29/07/2022</td>
                                <td>Male</td>
                                <td>9</td>
                                <td class="confirmed">Confirmed</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>
                            <tr>
                                <td>Andrew Jackson</td>
                                <td>28/07/2022</td>
                                <td>Male</td>
                                <td>14</td>
                                <td class="confirmed">Confirmed</td>
                                <td><span><i class="ri-edit-line edit"></i><i class="ri-delete-bin-line delete"></i></span></td>
                            </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </section>
    <script src="admin.js"></script>
</body>

</html>