<?php
include 'connection.php';
$id = $_GET['id']; // get id through query string
 
$del = mysqli_query($con,"SELECT * FROM `wishlist` WHERE id='$id';"); // update query
while($rows=$del->fetch_assoc())
{
    $name=$rows['name'];
    $image=$rows['image'];
    $price=$rows['price'];
    $qty=$rows['qty'];
} 
$insert_products="INSERT INTO `tbl_cart`(Proudect_Title,product_image,Product_Price,cart_qty) VALUES ('$name','$image','$price','$qty')";
$result_query=mysqli_query($con,$insert_products);
if($del)
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