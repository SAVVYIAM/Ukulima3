<?php
//include('server.php');
$totalbalancequantity=0;
$resultorders = mysqli_query($conn,"SELECT * FROM placed_order where status='Pending' or status='Fulfilled' ");
while($row = mysqli_fetch_array($resultorders)){
	$orderid=$row['Order_id'];

  $result = mysqli_query($conn,"SELECT * FROM order_details where order_id='$orderid' ");
  while($row = mysqli_fetch_array($result))
{


  		         $order_id=$row['order_id'];
  		         $product_id=$row['product_id'];
  		         $quantity=$row['quantity'];

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
                   $totalbalancequantity+=$balancequantity;

}
//echo "order   ".$order_id."  ".$totalbalancequantity."<br/>";

//insert status of order
if($totalbalancequantity==0){
$query = "UPDATE placed_order
         SET Status='Fulfilled' WHERE Order_id='$order_id' ";
mysqli_query($conn, $query);
}
else{
	$query = "UPDATE placed_order
	         SET status='Pending' WHERE Order_id='$order_id' ";
	mysqli_query($conn, $query);
}

$totalbalancequantity=0;
//echo "There you go";
}

?>
