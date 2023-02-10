<?php
include 'connection.php';
$id = $_GET['id']; // get id through query string
$total=0;
$reg=$_SESSION['email'];

$del = mysqli_query($con,"SELECT * FROM `tbl_cart` WHERE id='$id';"); // update query
$sql=mysqli_query($con,"SELECT * FROM `register` WHERE `email`='$reg';");
while($row = mysqli_fetch_array($sql))
   {
    $address=$row['address'];
   } 
while($rows=$del->fetch_assoc())
{
$image=$rows['product_image1'];
$title=$rows['product_title'];
$qty=$rows['cart_qty'];
$price=$rows['product_price'];
$total=$rows['cart_qty'] * $rows['product_price'];
}
$insert_products="INSERT INTO `tbl_order`(name,image,qty,price,address) VALUES ('$title','$image','$qty','$total'$address  )";
$result_query=mysqli_query($con,$insert_products);
$sel=mysqli_query($con,"DELETE FROM `tbl_cart` WHERE id='$id';");
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