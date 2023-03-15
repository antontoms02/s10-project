<?php 
session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:login2.php");
}
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
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $product_price=$_POST['product_price'];

    $insert_products="UPDATE `tbl_products` where set `product_title`= '$product_title',`product_description`= '$description', 
`product_price`='$product_price'";

$result_query=mysqli_query($mysqli,$insert_products);
if($result_query){
    echo "<script> alert('Product change is successfull ');
    window.location.href='adproview.php.php';</script>";
}
}
?>