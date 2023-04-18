<?php
 include "connection.php";
 $reg=$_SESSION['email'];
 $id=$_GET['id'];
if(!isset($_SESSION["email"])) 
{
   header("Location:../login.php");
}
$result4 = mysqli_query($con,"SELECT * FROM `register`  where `email`='$reg' AND role=0");
while($row3 = mysqli_fetch_array($result4))
{
$uname=$row3['name'];
$pin=$row3['pincode'];
}

$result = mysqli_query($con,"SELECT * FROM `order_items`  where `id`='$id'");
while($row = mysqli_fetch_array($result))
{
$order_id=$row['id'];
$title=$row['product_title'];
$address=$row['address'];
$total=$row['price'];
$qty=$row['quantity'];
$date=$row['date'];
}
// }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Report</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" 
    integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
      .container {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
	background-color: #fff;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
	text-align: center;
	margin-bottom: 20px;
}

.content {
	margin-top: 20px;
	
}
.next{
	margin-left:30px;
}

table {
	width: 100%;
	border-collapse: collapse;
	margin-bottom: 20px;
}

th, td {
	padding: 8px;
	text-align: left;
	border-bottom: 1px solid #ddd;
}

th {
	width: 40%;
}

td {
	width: 60%;
}

p {
	margin-bottom: 0;
} 
    </style>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Payment Receipt</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div id="invoice"> 		
	<div class="container">
		<div class="header">
            <h1 style="margin-right: 150px;">TESLA ELECTRONICS</h1>
			<h3 style="margin-right: 150px;">Payment Receipt</h3>
		</div>
		<div class="content">   
			<table class="next">
			<tr>
					<th>Bill No:</th>
					<td>5055<?php echo $order_id;?></td>
				</tr>
				<tr>
					<th>Date:</th>
					<td><?php echo $date;?></td>
				</tr>
                <tr>
					<th>Name:</th>
					<td><?php echo $uname;?></td>
				</tr>
                <tr>
					<th>Address:</th>
					<td><?php echo $address;?>, Pincode: <?php echo $pin;?></td></td>
				</tr>
				<tr>
					<th>Amount Paid:</th>
					<td><?php echo $total;?></td>
				</tr>
			</table>
            <div class="span9">
<div class="content">
<div class="module">
<div class="module-head">
<h3>Orders</h3>
</div>
<div class="module-body table">
<br />
<table>
<thead>
<tr>
<th>Product_Name</th>
<th>Quantity</th>
<th> Unit price</th>
<th>Total price</th>
</tr>
</thead>
<tbody>
                         <tr>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $qty; ?></td>
                            <?php $price= $total/$qty; ?>
                            <td><?php echo $price ?></td>
                            <td><?php echo $total; ?></td>
                        </tr>
</table>

</div>
</div>
</div>
</div><!--/.content-->
</div><!--/.span9-->
</div>
</div><!--/.container-->
</div><!--/.wrapper-->
<div class="col-md-12 text-right mb-3">
<button class="btn btn-primary" style="padding:10px; margin-left:150px; margin-top:10px;" id="download">download</button>
            </div>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="scripts/datatables/jquery.dataTables.js"></script>
<script>
$(document).ready(function() {
$('.datatable-1').dataTable({
"pageLength": 5,
"lengthMenu": [5, 10, 20, 25, 50]
});
$('.dataTables_paginate').addClass("btn-group datatable-pagination");
$('.dataTables_paginate > a').wrapInner('<span />');
$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
});

</script>
<script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'report.pdf',
                image: { type: 'jpeg', quality: 0.99 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a3', orientation: 'p' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>
		</div>
	</div>
</body>
</html>