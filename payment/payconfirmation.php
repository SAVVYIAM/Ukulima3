<?php

if (isset($_GET['pesapal_transaction_tracking_id'])) {
	$pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	$order_id = $_GET['pesapal_merchant_reference'];
include('../server.php');

	$query = "UPDATE payment
	         SET Pesapal_tracking_id='$pesapal_transaction_tracking_id',Status='Confirmed' WHERE Order_id='$order_id' ";
	mysqli_query($conn, $query);


$query="SELECT * FROM payment where Status='Confirmed' ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
$orderid=$row['Order_id'];

$query="UPDATE placed_order
set status='PAID'
WHERE Order_id='$orderid' ";
mysqli_query($conn,$query);
}
}




  ?>
<!DOCTYPE html>
<html>
<head>


<link href="pay.css" type="text/css" rel="stylesheet">
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" type="text/css" rel="stylesheet">


</head>

<body id="confirmpay">

	<p><strong> Payment Successful for order_number:<?php echo $order_id?></strong></p>

<!-- form -->


<?php require_once "delivery.php"; ?>
<?php  include('errors.php');?>
<button id="adddelivery" onclick="openForm()">Add delivery information </button>
<a href="../index.php" role="button" class="btn btn-secondary">Back </a>
<!-- form-->




</body>



</html>
