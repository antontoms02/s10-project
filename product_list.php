<?php
include("./header.php");
include("./navbar.php");
include("./sidebar.php");
include("./connection.php");
// SQL query to select data from database
$sql="SELECT * FROM `product`";
$result = mysqli_query($mysqli, $sql) or die( mysqli_error($mysqli));
?>
<body>
<div class="container-xxl position-relative bg-white d-flex p-0">
<!-- Content Start -->
        <div class="content">
            <div class="container">
                <div  style="display:flex;justify-content:centre;align-item:centre;" > <h2 style="padding: 10px;font-weight: bold;">Product Details</h2></div>
           
                <div class="card mt-2">
                        <!-- <h5 class="card-title">Available Users</h5> -->
                            <table class="t1">
                                <thead>
                                <tr>
                                    <th>BRAND</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRICE</th>
                                    <th>NUMBER</th>
                                    <th>DESCRIPTION</th>
                                    <th>PHOTO</th>
                                </tr>
                                <thead>
                                <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                               <?php while($row = mysqli_fetch_array($result)){?>
                               <tbody>
                                <tr>
                                    <!-- FETCHING DATA FROM EACH
                                        ROW OF EVERY COLUMN -->
                                    <td><?php echo $row['brand'];?></td>
                                    <td><?php echo $row['productname'];?></td>
                                    <td><?php echo $row['price'];?></td>
                                    <td><?php echo $row['number'];?></td>
                                    <td><?php echo $row['description'];?></td>
                                    <td><img width="60" height="50" src="<?php echo $row['image'];?>"></img></td>
                                </tr>
                               </tbody>
                                <?php
                            }
                            ?>
                               
                            </table>
                </div>
            </div>        
        </div>
         </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>

