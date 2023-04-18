<?php
include 'connection.php';
$grand_total = 0;

if (!isset($_SESSION["email"])) {
    header("Location:login.php");
}
$sql=mysqli_query($con,"SELECT * FROM tbl_cart");
          while ($row = mysqli_fetch_array($sql)) {
         $grand_total=$grand_total+($row['cart_qty'] * $row['Product_Price']);
     }
     $reg=$_SESSION['email'];
  $result=mysqli_query($con,"SELECT * FROM `register`  where `email`='$reg'");
  while ($rows= mysqli_fetch_array($result)) {
    $name=$rows['name'];
    $email=$rows['email'];
    $mob=$rows['mob'];
    $address=$rows['address'];
}
if(isset($_POST['submit']))
   {
     $name=mysqli_real_escape_string($con,$_POST['name']);
     $address=mysqli_real_escape_string($con,$_POST['address']);
     $mob=mysqli_real_escape_string($con,$_POST['phone']);
     $email=mysqli_real_escape_string($con,$_POST['email']);
     $value=mysqli_real_escape_string($con,$_POST['payment_mode']);
     $qur1 = mysqli_query($con,"UPDATE register SET name='$name',address='$address',mob='$mob',email='$email'  where email='$reg'");




     $msg1 = "SELECT * FROM `register` WHERE `email`='$reg'";
    $msg_qry = mysqli_query($con, $msg1);
    while ($rows = mysqli_fetch_array($msg_qry)) {
    $user_phone=$rows['mob'];
    }


// Set API credentials and endpoint URL
$api_token = '0c25d9447f1f4321a9c2c1b429db02e1';
$service_plan_id = 'c0bd359830334c36a25b155395964a01';
$endpoint_url = "https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches";

// Set SMS data
$from = '+447520650965';
$to = $user_phone;
$body = 'Order placed successfully';

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


     if ( $qur1 === TRUE AND $value == "1"){
    header("location:order_add.php"); 
     }
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>
</head>
<style>
    span.price {
        float: right;
        color: grey;
    }
</style>

<body>

<nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                    <strong><span>TESLA</span></strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.php" class="bi-bag custom-icon"></a>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav .search-container {
  float: right;
  
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #93b6ed;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>

<body>


<div class="topnav">
    
  
    <!-- <a href="./seller/index.php"><i class="bi bi-card-list"></i> Start Selling</a> -->
   

</div>

                         
                            
                            <?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                            { ?>
                                        <li>
      
    <a href="products.php"><i class="bi bi-shop-window"></i> Shop</a>
    <a href="my_orders.php"><i class="bi bi-card-list"></i> Order History</a>
    <a href="wishlist.php"><i class="bi bi-heart-fill"></i> Wishlist</a>

                            </li>
                            
                            <?php }
                            else{ 
                            ?>
                                <li>
                                <div class="dropdown">
                             
  <button onclick="myFunction()"   class="nav-item"> <a  href="login.php"><i class="bi bi-box-arrow-in-left"></i>Login</a></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="products.php"><i class="bi bi-shop-window"></i> Shop</a>
    <a href="my_orders.php"><i class="bi bi-card-list"></i> Order History</a>
    <a href="wishlist.php"><i class="bi bi-heart-fill"></i> Wishlist</a>
  </div>
</div>
                            </li>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>

                                <style>
.dropbtn {
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
                          
                         <?php } ?>
                      </ul>
                        <div class="d-none d-lg-block">
                        <?php if( isset($_SESSION['email'])&& !empty($_SESSION['email']) )
                        { 
                        ?>
                            <a href="logot.php" style="font-size:11px" class="bi-person custom-icon me-3"> Welcome -<?php echo htmlentities($_SESSION['email']);?></a>
                        <?php }
                        else{ ?>
                            <a href=" " class="bi-person custom-icon me-3"></a> 
                                
                         <?php } 
                         ?>
                            <a href="cart.php" class="bi-bag custom-icon"></a>
                    </div>
                </div>
            </div>
            </nav> 

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
</nav>

<form method="post" id="placeOrder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>
                <div class="container">
                    <h4>Price Details</h4>
                    
                    <hr class="hr">
                    <p>Total <span class="price" style="color:black"><b>₹ <?= $grand_total ?></b></span></p>
                </div>

                <input type="hidden" name="total_amount" value="<?= $grand_total; ?>">
                <div class="form-group">
                    <input type="text" name="name" value=<?php echo $name?> class="form-control" placeholder="Enter Name"  minlength="5"
      maxlength="50" pattern="\S(.*\S)?" required >
                </div>
                <div class="form-group">
                    <input type="email" name="email" value=<?php echo $email?> class="form-control" placeholder="Enter E-Mail"  required>
                </div>
                <div class="form-group">
                    <input type="number" name="phone"  class="form-control" placeholder="Enter Phone" value=<?php echo $mob?> pattern="[7-9]{1}[0-9]{9}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address" value=<?php echo $address?> class="form-control" rows="3" cols="10"
                              placeholder="Enter Delivery Address Here...">
                </div>
                <h6 class="text-center lead">Select Payment Mode</h6>
                <div class="form-group">
                    <select name="payment_mode" class="form-control" required>
                        <option value="" selected disabled>-Select Payment Mode-</option>
                        <option value="1">Cash On Delivery</option>
                        <option value="2">UPI</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                </div>
            </div>
        </div>
    </div>
    
</form>

<?php
$apiKey="rzp_test_qtBC0Y9QLqd8pl";
?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<form action="order_raz.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $grand_total  * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="order_CgmcjRh9ti2lP7"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="TESLA"
    data-description="Tech World ."
    data-image="https://st4.depositphotos.com/31445094/41249/v/1600/depositphotos_412499652-stock-illustration-perfume-icon-design-template-isolated.jpg"
    data-prefill.name="Minu Joe"
    data-prefill.email=""
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden" class="btn btn-primary">
</form>
<!--gateway end-->

<style>
    .razorpay-payment-button{
        background-color: #0DCAF0;
        color: white;
        font-size: 18px;padding: 8px 10px;font-weight: bold;
        border-radius: 12px; border: none;text-align: center; 
    }
</style>



                     
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>
