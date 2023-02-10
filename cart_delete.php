<?php
include 'connection.php';
$sql="SELECT * FROM tbl_cart";
$result = mysqli_query($con,$sql);
$id = $_GET['id']; // get id through query string
$del=mysqli_query($con,"DELETE FROM `tbl_cart` WHERE id='$id';");

if($del) // update query

{
    mysqli_close($con); // Close connection
    header("location:cart.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?> 