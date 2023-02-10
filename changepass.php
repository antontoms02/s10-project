<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION["email"])) 
{
    header("Location:user-login.php");
}
if(isset($_POST['submit']))
{
    $email=$_SESSION['email'];
    
  $pas=$_POST['password'];
  $cpas=$_POST['password_again'];
  
  $query="UPDATE tbl_login SET `password`='$cpas' where `email`='$email'";
  $query1="UPDATE tbl_reg SET `password`='$cpas' where `email`='$email'";
 $query_run = mysqli_query($con,$query)or die($con);
 $query1_run = mysqli_query($con,$query1)or die($con);
 if($query_run)
 {
    echo "<script> alert('Password changed Successfully'); </script>";
				 
 }

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard7.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Change Password</title>
	</head>
	<body>
		<!-- SIDEBAR -->
		<section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>Lea<span>rn</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="search">
                <input type="text" placeholder="Search ">
                <button><i class="ri-search-2-line"></i></button>
            </div>
          
    
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="user.php" >
                        <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                        <span class="sidebar--item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <span class="icon icon-2"><i class="ri-pie-chart-box-line"></i></span>
                        <span class="sidebar--item">Courses</span>
						<i class='bx bxs-chevron-down js-arrow arrow '></i>
						
            
                    </a>
                </li>
                
                <li>
                    <a href="feedback.php" >
                        <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item">Feedbacks</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <span class="icon icon-5"><i class="ri-line-chart-line"></i></span>
                        <span class="sidebar--item">Payements</span>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <span class="icon icon-6"><i class="ri-customer-service-line"></i></span>
                        <span class="sidebar--item">Aptitude</span>
                    </a>
                </li>
				<li>
                    <a href="changepass.php"  id="active--link">
                        <span class="icon icon-6"><i class="ri-customer-service-line"></i></span>
                        <span class="sidebar--item">update password</span>
                    </a>
                </li>
                <li>
                    <a href="profile.php" >
                    <span class="icon icon-4"><i class="ri-user-line"></i></span>
                        <span class="sidebar--item">my profile</span>
                    </a>
                </li>
                
            </ul>
            <ul class="sidebar--bottom-items">
               
                <li>
                    <a href="logout.php">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>



        <div class="main--content">
            <div class="overview">
                
            </div>
           
        </div>
    </section>

            <script src="assets/js/main.js"></script>

    <section id="content">
			<!-- MAIN -->
			<main>
				<table>
            	    <div class="container">
					  <h2 style="color: #9f8e64;">UPDATE PASSWORD</h2><br>
  						<form name="registr" id="registr" method="POST" action="#"enctype="multipart/form-data" onSubmit="return valid();"> 
							<label>Password:</label>
    						<input type="password" id="password" name="password" placeholder="Password" onblur="validate_password()" required>
                            <label>Confirm Password:</label>
    						<input type="password" id="password_again" name="password_again" placeholder="Confirm Password"  onblur="validate_confirm()" required>
    						<input type="submit"name="submit" value="Submit">
  						</form>
					</div>
				</table>
			</main>
	</section>




<script>

function valid()
				{
				if(document.registr.password.value!= document.registr.password_again.value)
				{
				alert("Password and Confirm Password Field do not match  !!");
				document.registr.password_again.focus();
				return false;
				}
				return true;
				}
function validate_password() {
        var name = document.forms["registr"]["password"];
        var pattern = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
        if (name.value == "") {
          var error = "Please enter your password";
          document.getElementById("password").placeholder = error;
          document.getElementById("password").classList.add("custom-warning");
          document.form.password.focus();
          return false;
        } else if (name.value.match(pattern)) {
          document.getElementById("password").innerHTML = "";
          document.form.cpassword.focus();
          return true;
        } else {
          document.getElementById("password").value = "";
          document.getElementById("password").placeholder = "Invalid password";
          document.form.password.focus();
          return false;
        }
      }

      function validate_confirm() {
        var name1 = document.forms["registr"]["password_again"];
        var name2 = document.forms["registr"]["password_again"];

        if (name2.value == "") {
          var error = "Please enter password";
          document.getElementById("password_again").placeholder = error;
          document.getElementById("password_again").classList.add("custom-warning");
          document.form.cpassword.focus();
          return false;
        } else if (name1.value == name2.value) {
          document.getElementById("password_again").innerHTML = "";
          document.form.checkBox.focus();
          return true;
        } else {
          document.getElementById("password_again").value = "";
          document.getElementById("password_again").placeholder = "Password doesnot match";
          document.form.cpassword.focus();
          return false;
        }
      }
</script>
     </body>

</html>
