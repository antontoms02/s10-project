<?php
include 'connection.php';
$id = $_GET['brand_id']; // get id through query string
$del = mysqli_query($con,"UPDATE `tbl_brands` SET `status`=0 WHERE brand_id='$id'"); // update query

if($del === TRUE)
{
    mysqli_close($con); // Close connection
    header("location:insert_brand.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>