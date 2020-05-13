<?php
include('../server.php');
$order_no=$_GET['order_no'];
$amounttotal=$_GET['amount'];
$customer_email=$_GET['customeremail'];
$status="pending";


$result = mysqli_query($conn,"SELECT * FROM customer WHERE Email='$customer_email' ");
while($row = mysqli_fetch_array($result)){
$firstname=$row['F_name'];
$lastname=$row['L_name'];
$custid=$row['Customer_id'];

}


      $query = "INSERT INTO payment (Customer_id, Order_id,Amount,Status)
     			  VALUES('$custid', '$order_no', '$amounttotal','$status')";
    	mysqli_query($conn, $query);

 ?>
<script>

</script>

 <link href="../boostrap-4.0.0/dist/css/bootstrap.css" type="text/css" >
<form action="pesapal-iframe.php" method="post">
	<table>
		<tr>
			<td>Amount:</td>
			<td><input type="text" name="amount" value="<?php echo $amounttotal ?>" readonly="readonly"/>
			(in Kshs)
			</td>
		</tr>
		<tr>
			<td>Type:</td>
			<td><input type="text" name="type" value="MERCHANT" readonly="readonly" />
			(leave as default - MERCHANT)
			</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><input type="text" name="description" value="Order Description" /></td>
		</tr>
		<tr>
			<td>Reference Order no.:</td>
			<td><input type="text" name="reference" value="<?php echo $order_no ?> " readonly="readonly" />
			(the Order ID )
			</td>
		</tr>
		<tr>
			<td>Shopper's First Name:</td>
			<td><input type="text" name="first_name" value="<?php echo $firstname  ?>" readonly="readonly"/></td>
		</tr>
		<tr>
			<td>Shopper's Last Name:</td>
			<td><input type="text" name="last_name" value="<?php echo $lastname  ?>" readonly="readonly"/></td>
		</tr>
		<tr>
			<td>Shopper's Email Address:</td>
			<td><input type="text" name="email" value="<?php echo $customer_email ?>" readonly="readonly"/></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Make Payment" onclick="" /></td>
		</tr>
	</table>
</form>
