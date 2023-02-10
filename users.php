<?php

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
 
// SQL query to select data from database
$sql="SELECT * FROM `tblregister` WHERE role=0";
$sql1="SELECT * FROM `tblregister` WHERE role=2";
$result = $mysqli->query($sql);
$result1 = $mysqli->query($sql1);
$mysqli->close();
?>
<!--<html>
 <head>
 <style>
        body{
            background-color: #ffffff;
            font-family:sans-serif;
        }
        .t1 {
            position: relative;
            top :30px;
            margin-left: 300px;
            font-size: medium;
            
           
        }
        .t2{
            position: relative;
            top :30px;
            margin-left: 300px;
            font-size: medium;
            

        }

 
        th,
        td {
            font-weight: bold;
            padding: 20px;
            text-align: center;
            
        }
        th{
            background-color: purple;
            color: black;
        }
        td {
            font-weight: lighter;
            color: black;
            background-color:grey;
        }
        #no{
           margin-left:150px;
           margin-top:50px;
           color: black;
        }
      
        #n1{
            margin-left:150px;
           margin-top:50px;
           color: black;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>-->
        <!-- TABLE CONSTRUCTION -->
        
        <table class="t1">
            <tr>
            <h2 id="no">Customer Management</h2>
            </tr>
            <tr>
                <th id="c1">Username</th>
                <th id="c1">Email</th>
                <th id="c1">Mobile No</th>
                <th id="c1">Manage</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                
                <td><a href="delete.php?id=<?php echo $rows['id'];?>"><button style="color: White; background-color:red;">Deactivate</button></a></tb>
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
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phone'];?></td>
                <td><a href="add.php?id=<?php echo $rows['id'];?>"><button style="color: White; background-color:green;">Activate</button></a></tb>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>