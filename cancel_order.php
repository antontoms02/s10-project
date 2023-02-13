<?php
include 'connection.php';
$id = $_GET['id']; // get id through query string

$del = mysqli_query($con,"UPDATE `order_items` SET `status`='Canceled' WHERE id='$id';"); // update query
if($del)
{
    mysqli_close($con); // Close connection
    header("location:order_view.php"); // redirects to all records page
    exit;   
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>