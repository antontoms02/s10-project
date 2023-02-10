<?php
include 'connection.php';
if(!isset($_SESSION["email"])) 
{
    header("Location:login.php");
}
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $ram=$_POST['ram'];
    $processor=$_POST['processor'];
    $storage=$_POST['storage'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing image tmp names
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $description=='' or  $ram=='' or $processor=='' or $storage=='' or
    $product_category=='' or $product_brands==''  or $product_price=='' or 
    $product_image1==''or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the fields.')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
    }

    //insert query
    $insert_products="INSERT INTO `tbl_products`(product_title, 
    product_description, category_id, brand_id,ram,processor,storage,
    product_image1, product_image2, product_image3, product_price,
    date, status) VALUES ('$product_title','$description',
    '$product_category', '$product_brands','$ram','$processor','$storage',
    '$product_image1','$product_image2','$product_image3',
    '$product_price',NOW(),'$product_status')";

    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
        echo "<script>alert('Successfully inserted the products.')</script>";
    }
   
}
?>




<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width-device-width,initial-scale=1.0">
       <title>Insert products</title>

        <!-- bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="adminstyle.css">
      <style>
       .sidebar--items{
        padding:10px 5px;
       }
      </style>
    </head>

    <body class="bg-light">
    <section class="header">
        <div class="logo">
        <h2>RAZER</h2>
        </div>
        <div class="search--notification--profile">
                <div>
                </div>
                        <h2>Welcome Seller</h2>
        </div>
    </section>

    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="seller.php" >
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item">Seller Dashboard</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="insert_product.php" id="active--link">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Add Product</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="logout.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    <div class="main--content">
        <div class="container mt-3">
            <h1 class="text-center">ADD PRODUCTS</h1>

            <!--form-->
            <form action="" method="post" enctype="multipart/form-data">

                <!--product title-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" 
                    placeholder="Enter product name" autocomplete="off" required>
                </div>

                <!--product description-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="form-label">Product description</label>
                    <input type="text" name="description" id="description" class="form-control" 
                    placeholder="Enter product description" autocomplete="off" required>
                </div>

                <!--product keywords
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" 
                    placeholder="Enter product keywords" autocomplete="off" required>
                </div>-->

                   <!--brands-->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select">
                        <option name="product_brands" value="">Select Brand</option>
                        <?php
                            $select_query="select * from tbl_brands";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $brand_title=$row['brand_title'];
                                $brand_id=$row['brand_id'];
                                echo "<option  value='$brand_id'>$brand_title</option>";
                            }
                        ?>
                    </select>
                </div>

                <!--categories-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_category" id="" class="form-select">
                        <option value="">Select category</option>
                        <?php
                            $select_query="select * from tbl_categories";
                            $result_query=mysqli_query($con,$select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $category_title=$row['category_title'];
                                $category_id=$row['category_id'];
                                echo "<option value='$category_id'>$category_title</option>";
                            }
                        ?>
                    </select>
                </div>

             

                 <!--image 1-->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="form-label">Product image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" 
                    required>
                </div>

                <!--image 2-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="form-label">Product image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" 
                    required>
                </div>

                <!--image 3-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="form-label">Product image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" 
                    required>
                </div>

                <!--product price-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" 
                    placeholder="Enter product price" autocomplete="off" required>
                </div>

                   <!--ram-->
                   <div class="form-outline mb-4 w-50 m-auto">
                    <label for="ram" class="form-label">Product Ram</label>
                    <input type="text" name="ram" id="ram" class="form-control" 
                    placeholder="Enter product ram" autocomplete="off" required>
                </div>

                <!--processor-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="processor" class="form-label">Processor</label>
                    <input type="text" name="processor" id="processor" class="form-control" 
                    placeholder="Enter product processor" autocomplete="off" required>
                </div>
                <!--ram-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="storage" class="form-label">storage</label>
                    <input type="text" name="storage" id="storage" class="form-control" 
                    placeholder="Enter product storage" autocomplete="off" required>
                </div>

                <!--button-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="ADD PRODUCT">
                </div>
            </form>
        </div>
        </div>
    </section>
    </body>
</html>