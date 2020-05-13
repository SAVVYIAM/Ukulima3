<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0"/>

	<link rel="stylesheet" type="text/css" href="style.css">

 <style type="text/css">
 .spoilerbutton1 {display:block; border:none; padding: 10px 20px; margin:10px 0px; font-size:100%; color:white; background-color:transparent; outline:0;
 }
 .spoiler {overflow:hidden;}
 .spoiler > div {-webkit-transition: all 0s ease;-moz-transition: margin 0s ease;-o-transition: all 0s ease;transition: margin 0s ease;}
 .spoilerbutton1[value="OPEN"] + .spoiler > div {margin-top:-500%;}
 .spoilerbutton1[value="Close "] + .spoiler {padding:5px;}

 </style>

 <script type="text/javascript">
 function vieworder(clicked_pid,clicked_order,clicked_value)
 {
document.write("");
 var pid=clicked_pid;
 var oid=clicked_order;
 var pqty=clicked_value;
window.location.href='submitinvoice.php?order_id='+ oid + '&product_id='+ pid + '&quantity='+ pqty;
alert("INVOICE SUBMITTED");
 }
 </script>
</head>
<!--<body style="background-color:green;font-size: 17px;margin-right:px;">-->
	<?php
	include('server.php');
	include('checkorderstatus.php');
	echo '<div style="background-color:#90EE90;width:900px">';
//	$orderid=$_GET['order_id'];
//$orderid=44;
$resultorders = mysqli_query($conn,"SELECT * FROM placed_order WHERE status='pending' ");
while($row = mysqli_fetch_array($resultorders)){
	$orderid=$row['Order_id'];

	    // echo "<br /> <b><i>Order Items For Order No.</i></b>".$orderid."<br /> <br />";
			 ?>

			 <section style="margin-left: 50px;">
			   <?php echo "<br /> <b><i>Order No.</i></b>".$orderid." ";	?> <input class="spoilerbutton1" type="button" value="OPEN" onclick="this.value=this.value=='OPEN'?'Close ':'OPEN';" style="border-style: solid;border-width: 1px;border-radius: 5px;width: 10%;background-image: linear-gradient(#2b60b5, #2b60b5);text-align: left;outline-style: double;" >
			  <div class="spoiler"><div>
					<?php
	   $result = mysqli_query($conn,"SELECT * FROM order_details where order_id='$orderid' ");
		 while($row = mysqli_fetch_array($result))
		 {

		         $order_id=$row['order_id'];
		         $product_id=$row['product_id'];
		         $quantity=$row['quantity'];

		 $resulty = mysqli_query($conn,"SELECT name FROM products where id='$product_id' ");
		 while($rowy = mysqli_fetch_array($resulty))
		 {
		 $product_name=$rowy['name'];

		 }
//check if order is met
		 $resultinvoice = mysqli_query($conn,"SELECT * FROM submitted_invoice where Order_id='$order_id' and Product_id='$product_id' ");
		 $totalquantity=0;
		 while($rowinvoice = mysqli_fetch_array($resultinvoice))
		 {
		 //$invoiceproduct_name=$rowinvoice['name'];
		 //$invoiceproduct_price=$rowinvoice['price'];
		 $invoiceproduct_quantity=$rowinvoice['Quantity'];
		 $totalquantity+=$invoiceproduct_quantity;

		 }
		 $balancequantity=$quantity-$totalquantity;

		 ?>

<?php if($balancequantity>=1):?>
 <p style="width: 80%;">

			<form method="POST" action="submitinvoice.php" onclick="">
		  <div style="background-color:#e6eff9;padding-top:10px;padding-right:5px;padding-bottom:10px;margin:10px;border-radius:5px;">
		                <?php  echo "<strong>".$product_name."</strong>".'<div style="padding-left:50px;">'."Quantity ".'<label class="label label-primary" style="width:50px;text-align:center;">'.$balancequantity."Kg"."<br />"."</label></div>";?>
<input type="number" placeholder="input amount" name="qty" id="<?php echo $product_id ?>" min="1" max="<?php echo $balancequantity ?>" style="margin-left:20px;">
<input type="submit" id="<?php echo $order_id ?>"  value="Submit" onclick="vieworder(qty.id,this.id,qty.value)" >
		  </div>
		  </form>
			<br />


 </p>

<?php endif ?>


<?php
}?>
</div></div>
</section>
<?php
}
 echo '</div>' ?>

<!--</body>-->
</html>
