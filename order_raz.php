<?php
include 'connection.php'; // get id through query string
$total=0;
$reg=$_SESSION['email'];
$username=$_SESSION['username'];

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
$insert_products="INSERT INTO `order_items`(product_title,address,date,img,quantity,price) VALUES ('$title','$address',NOW(),'$image','$qty','$price')";
$result_query=mysqli_query($con,$insert_products);

$msg1 = "SELECT * FROM `register` WHERE `email`='$reg'";
    $msg_qry = mysqli_query($con, $msg1);
    while ($rows = mysqli_fetch_array($msg_qry)) {
    $user_phone=$rows['mob'];
    $name=$rows['username'];
    }


// Set API credentials and endpoint URL
$api_token = '0c25d9447f1f4321a9c2c1b429db02e1';
$service_plan_id = 'c0bd359830334c36a25b155395964a01';
$endpoint_url = "https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches";

// Set SMS data
$from = '+447520650965';
$to = $user_phone;
$body ='Order placed successfully '.$reg;
    
// Set POST data
$data = array(
    'from' => $from,
    'to' => array($to),
    'body' => $body
);
$post_data = json_encode($data);

// Set cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer {$api_token}",
    "Content-Type: application/json"
));

// Send request and get response
$response = curl_exec($ch);


// Process response
/* if ($response) {
    $response_data = json_decode($response, true);
    echo "SMS sent! Message ID:{$response_data['id']}";
} else {
    echo "Error sending SMS: " . curl_error($ch);
} */
curl_close($ch);

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