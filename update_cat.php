<?php
include 'connection.php';
$id = $_GET['category_id']; // get id through query string
$del = mysqli_query($con,"UPDATE `tbl_categories` SET `status`=1 WHERE category_id='$id'"); // update query

if($del === TRUE)
{
    mysqli_close($con); // Close connection
    header("location:add_category.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>