<?php
include 'connection.php'; // get id through query string
$total=0;
$reg=$_SESSION['email'];

$del = mysqli_query($con,"SELECT * FROM `tbl_cart`;"); // update query
$sql=mysqli_query($con,"SELECT * FROM `register` WHERE `email`='$reg';");
while($row = mysqli_fetch_array($sql))
   {
    $address=$row['address'];
   } 
while($rows=$del->fetch_assoc())
{
$image=$rows['Product_image'];
$title=$rows['Proudect_Title'];
$qty=$rows['cart_qty'];
$price=$rows['Product_Price'];
$total=$rows['cart_qty'] * $rows['product_price'];
$che=mysqli_query($con,"SELECT * FROM `tbl_products` where product_title='$title';");
while($row = mysqli_fetch_array($che))
   {
    $qt=$row['qty'] - $qty;
    mysqli_query($con,"UPDATE `tbl_products` SET `qty`='$qt' WHERE product_title='$title';");
}
}
$insert_products="INSERT INTO `order_items`(product_title ,img,quantity,price) VALUES ('$title','$image','$qty','$price')";
$result_query=mysqli_query($con,$insert_products);
$sel=mysqli_query($con,"DELETE FROM `tbl_cart`;");
if($del)
{
    mysqli_close($con); // Close connection
    echo "<script> alert('your Order is successfull  ');
    window.location.href='cart.php';</script>";
    // header("location:cart.php"); // redirects to all records page
    
    exit;   
}
else
{
    echo "Error deleting record"; // display error message if not delete
    
}
?>