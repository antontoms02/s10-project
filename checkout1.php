<?php
include 'connection.php';
$grand_total = 0;

if (!isset($_SESSION["email"])) {
    header("Location:login.php");
}

if (isset($_POST['submit'])) {
    $id = $_SESSION['id'];
    $order_date = date("Y-m-d H:i:s");
    $customer_name = $_POST['name'];
    $customer_email = $_POST['email'];
    $customer_phone = $_POST['phone'];
    $customer_address = $_POST['address'];
    $payment_mode = $_POST['payment_mode'];
    $total_amount = $_POST['total_amount'];
    //Insert to orders table
    $sql = "INSERT INTO tbl_order (id, order_date, customer_name, customer_email, customer_phone, customer_address, payment_mode, total_amount) VALUES ('$id', '$order_date', '$customer_name', '$customer_email', '$customer_phone', '$customer_address', '$payment_mode', '$total_amount')";
    $result = mysqli_query($con, $sql);
    $order_id = mysqli_insert_id($con);
    if (!empty($order_id)) {
        foreach ($_POST['items'] as $key => $product_id) {
            $id = $_POST['cart_ids'][$key];
            $quantity = $_POST['quantity'][$key];
            $price = $_POST['price'][$key];
            $total_price = $quantity * $price;
            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price, total_price) VALUES ('$order_id', '$product_id', '$quantity', '$price', '$total_price')";
            $result = mysqli_query($con, $sql);
            // update cart table status
            $sql = "UPDATE cart SET is_checked_out = 1 WHERE id = $id";
            $result = mysqli_query($con, $sql);
            if ($result) {
                // reduce Total_quantity from product table
                $sql = "UPDATE tbl_products SET qty = qty - $quantity WHERE product_id = $product_id";
                $result = mysqli_query($con, $sql);
            }
        }
        header("Location:products.php");
    }
}

$sql = mysqli_query(
    $con,
    "SELECT c.id, c.product_id, p.product_name, c.cart_qty, p.Product_price FROM cart c INNER JOIN product p ON p.product_id = c.product_id WHERE c.id=" . $_SESSION['email'] . " AND c.is_checked_out=0"
);
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
                    <strong><span>ElitBuilder</span> Store</strong>
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
                    <?php
                    // while ($row = mysqli_fetch_array($sql)) {
                    //     $sub_total = $row['quantity'] * $row['price'];
                    //     $grand_total += $sub_total;
                    //     ?> 
                        <!-- <input type="hidden" name="items[]" value="<?= $row['proudect_Title'] ?>">
                        <input type="hidden" name="quantity[]" value="<?= $row['cart_qty'] ?>">
                        <input type="hidden" name="price[]" value="<?= $row['Product_price'] ?>">
                        <input type="hidden" name="cart_ids[]" value="<?= $row['id'] ?>">
                        <p><?= $row['product_name'] ?> <span class="price">₹ <?= $sub_total ?></span></p>-->
                      
                    <hr class="hr">
                    <p>Total <span class="price" style="color:black"><b>₹ <?= $grand_total ?></b></span></p>
                </div>

                <input type="hidden" name="total_amount" value="<?= $grand_total; ?>">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Enter Name"  minlength="5"
      maxlength="50" pattern="\S(.*\S)?" required >
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail"  required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" pattern="[7-9]{1}[0-9]{9}" 
       title="Phone number with 7-9 and remaing 9 digit with 0-9" required>
                </div>
                <div class="form-group">
                    <textarea name="address" class="form-control" rows="3" cols="10"
                              placeholder="Enter Delivery Address Here..."></textarea>
                </div>
                <h6 class="text-center lead">Select Payment Mode</h6>
                <div class="form-group">
                    <select name="payment_mode" class="form-control" required>
                        <option value="" selected disabled>-Select Payment Mode-</option>
                        <option value="1">Cash On Delivery</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
                </div>
            </div>
        </div>
    </div>
</form>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>

</html>
