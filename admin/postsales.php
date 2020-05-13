<?php
include('../server.php');
//if(isset($_POST['postsale']){
$orderid=$_POST['saleorderid'];
$cost=$_POST['salecost'];

$query="SELECT * from payment  WHERE Order_id='$orderid'";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_array($result)){
$amount=$row['Amount'];

}
$querypost="INSERT INTO sales(Order_id,Service_cost)
  VALUES('$orderid','$cost')";
  mysqli_query($conn,$querypost);

//fetch invoice Quantity
$queryi="SELECT * from submitted_invoice  WHERE Order_id='$orderid'";
$resulti=mysqli_query($conn,$queryi);
while($rowi=mysqli_fetch_array($resulti)){
$quantity=$rowi['Quantity'];
$productid=$rowi['Product_id'];
$Farmerid=$rowi['Farmer_id'];
$invoiceid=$rowi['Invoice_id'];

//pricing
$queryprice="SELECT * from products  WHERE id='$productid'";
$resultprice=mysqli_query($conn,$queryprice);
while($rowprice=mysqli_fetch_array($resultprice)){
$productprice=$rowprice['price'];

}
$invoicevalue=$quantity*$productprice;
$deductions=$cost+0.1*$amount;
$costshare=($invoicevalue/$amount)*$deductions;

$amount_payable=$invoicevalue-round($costshare,0,PHP_ROUND_HALF_UP);
//farmer payout

$querypayout="INSERT INTO farmer_payout(Invoice_id,Amount_payable,Status)
  VALUES('$invoiceid','$amount_payable','Pending')";
  mysqli_query($conn,$querypayout);


}

}

else{

echo "Order id: ".$orderid." is not paid for";

}
header(location:'showsales.php');




?>
