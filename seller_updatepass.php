<?php
   include 'connection.php';
   if(!isset($_SESSION["email"])) 
   {
       header("Location:seller.php");
   }
   $reg=$_SESSION['email'];
   if(isset($_POST['signup']))
  {
   $pass=mysqli_real_escape_string($con,$_POST['password']);   
   $del ="UPDATE `tbllogin` SET `password`='$pass' WHERE email='$reg'";
   $query_run = mysqli_query($con,$del)or die($con);
   if($query_run)
 {
    echo "<script> alert('Password changed Successfully'); </script>";	 
 }
  }
   $pass="SELECT password from tbllogin where email='$reg'"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>User_Account</title>
    <style>
    #btn{
     padding:10px;
     background-color:mediumblue;
     color:white;

    }
    #old_password{
      height:30px;
      width: 300px;
    }
    #password{
        height:30px;
        width: 300px;
    }
    #confirm-password{
        height:30px;
        width: 300px;
    }
    .container {
    width: 500px,500px;
    padding:100px 300px;
    background-color:#E6E8DD;
    }
    table {
    text-align:left;
    color:#040404;
    border-collapse: collapse;
    }
    .header {
    background-color: #FCFEFC;
    border-bottom: 1px solid #000000;
   }
   .sidebar {
    background-color: #A097FF;
   }
    .sidebar--items a:hover,
    .sidebar--bottom-items a:hover {
    background-color: #231FDC;
    color: #FBFFFC;
    }
    #active--link {
    background-color: #231FDC;
    color: #FBFFFC;
    }
    </style>
</head>

<body>
    <section class="header">
        <div class="logo">
        <h2>TESLA</h2>
        </div>
        <div class="search--notification--profile">
        <div></div>
                <h2>Welcome  <?php ECHO $reg;?></h2>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="seller_profile.php" >
                        <span class="icon icon-1"><i class="ri-admin-line"></i></span>
                        <span class="sidebar--item">My Profile</span>
                    </a>
                </li>
                <li>
                <li>
                    <a href="seller_updatepass.php" id="active--link">
                        <span class="icon icon-5"><i class="ri-user-add-line"></i></span>
                        <span class="sidebar--item">Change Password</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="index.php ">
                        <span class="icon icon-8"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">Home</span>
                    </a>
                </li>
            </ul>
        </div>
        
        
        <div class="main--content">
        <h1>Change Password</h1>
        <div class="container">
        <form name="registr" id="registr" method="POST" action="#" onSubmit="return valid();">
        <table>
        <!--<tr> 
              <td><label for="old_password">Old Password:</label></td>
              <td><input type="password" name="old_password" id="old_password" onblur="Old_password()" autocomplete="off"></td>
           </tr> -->
           <tr> 
              <td><label for="password">New Password:</label></td>
              <td><input type="password" name="password" id="password" onblur="validate_password()" autocomplete="off"required></td>
           </tr> 
           <tr> 
              <td><label for="confirm-password">Confirm Password:</label></td>
              <td><input type="password" name="confirm-password" id="confirm-password" onblur="validate_confirm()" autocomplete="off" required></td>
                </tr> 
            <tr>
                <td></td>
                <td></td>
               <td><input type="submit" value="Update" id="btn" name="signup" class="btn"></td>
            </tr> 
        </table>
        </form>
        </div>
		</div>
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

 /*function Old_password() {
        var name = document.forms["registr"]["old_password"];
        var pass= <?php echo $pass ?>
        if (name.value == "") {
          var error = "Please enter your password";
          document.getElementById("old_password").placeholder = error;
          document.getElementById("old_password").classList.add("custom-warning");
          document.form.password.focus();
          return false;
        } else if (name.value== pass) {
          document.getElementById("old_password").innerHTML = "";
          document.form.cpassword.focus();
          return true;
        } else {
          document.getElementById("old_password").value = "";
          document.getElementById("old_password").placeholder = "Invalid password";
          document.form.password.focus();
          return false;
        }
      }*/

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
        var name1 = document.forms["registr"]["password"];
        var name2 = document.forms["registr"]["confirm-password"];

        if (name2.value == "") {
          var error = "Please enter password";
          document.getElementById("confirm-password").placeholder = error;
          document.getElementById("confirm-password").classList.add("custom-warning");
          document.form.cpassword.focus();
          return false;
        } else if (name1.value == name2.value) {
          document.getElementById("confirm-password").innerHTML = "";
          document.form.checkBox.focus();
          return true;
        } else {
          document.getElementById("confirm-password").value = "";
          document.getElementById("confirm-password").placeholder = "Password doesnot match";
          document.form.cpassword.focus();
          return false;
        }
      }
</script>

</body>

</html>