<!DOCTYPE html>
<html>
<head>
<link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
.label{

background-color:blue;

display: inline-block;
margin-bottom: .5rem;

}
@media print{

  .printlogo{
    display:block;
    padding-bottom:50px;
    margin-left:300px;
  }
}
@media screen{

  .printlogo{
    display:none;
  }
}



</style>
<script type="text/javascript">
function pay(orderno,amount,customeremail){
var order_no=orderno;
var amountdue=amount;
var custemail=customeremail;
document.write("");
window.location.href='payment/makepayment.php?order_no='+order_no+'&amount='+amountdue+'&customeremail='+custemail;
}
</script>

<link  href="style.css" rel="stylesheet" type="text/css">
</head>

<body style="width:800px">
  <div class="printlogo">
  <img align="center" src="logo.png">

</div>
<?php
include('server.php');
echo '<div style="background-color:blue">';
$orderid=$_GET['order_id'];
     echo "<br /> <b><i>Order Items For Order No.</i></b>".$orderid."<br /> <br />";
     $accumulatedtotal=0;
   $result = mysqli_query($conn,"SELECT * FROM order_details where order_id='$orderid' ");
while($row = mysqli_fetch_array($result))
{

        $order_id=$row['order_id'];
        $product_id=$row['product_id'];
        $quantity=$row['quantity'];
//find product name
$resulty = mysqli_query($conn,"SELECT * FROM products where id='$product_id' ");
while($rowy = mysqli_fetch_array($resulty))
{
$product_name=$rowy['name'];
$product_price=$rowy['price'];
}
//check invoices for the products
$resultinvoice = mysqli_query($conn,"SELECT * FROM submitted_invoice where Order_id='$order_id' and Product_id='$product_id' ");
$totalquantity=0;
while($rowinvoice = mysqli_fetch_array($resultinvoice))
{
//$invoiceproduct_name=$rowinvoice['name'];
//$invoiceproduct_price=$rowinvoice['price'];
$invoiceproduct_quantity=$rowinvoice['Quantity'];
$totalquantity+=$invoiceproduct_quantity;
}

?>

<form>
<div style="background-color:white;padding-top:10px;padding-right:5px;padding-bottom:10px;margin:10px;border-radius:5px;">
              <?php  echo "<strong>".$product_name."</strong>".'<div style="padding-left:50px;">'."Quantity ".'<label class="label label-primary" style="width:50px;text-align:center;">'.$quantity."Kg"."<br />"."</label></div>";
 $Total=$quantity * $product_price;
 $accumulatedtotal+=$Total;
?>
Total Kshs:<input type="button" name="subtotal" value="<?php echo $Total?>">

Total Quantity Fulfilled:<label><?php echo $totalquantity ?></label>

</div>
</form>
<br/>
<?php
}
 echo '</div>' ?>
<form method="post" action="">
 <button id="paybutton" style="margin-left:70%;width:20%;background-color:blue;"  onclick="pay('<?php echo $order_id?>','<?php echo $accumulatedtotal?>','<?php echo $_SESSION['username']?>')">Pay Ksh  <?php echo $accumulatedtotal?> </button>
 <button id="paidlabel" style="margin-left:70%;width:20%;background-color:green;">PAID </button>
  <button id="printlabel" onclick="window.print()" style="margin-left:70%;width:20%;background-color:green;">PRINT </button>
</form>

 <?php
 //check if order is Fulfilled

 $resultstatus = mysqli_query($conn,"SELECT status FROM placed_order where order_id='$orderid' ");
while($rowstatus = mysqli_fetch_array($resultstatus))
{
$orderstatus=$rowstatus['status'];
}
 ?>
<!--display pay button-->
<?php if($orderstatus=='Fulfilled'):?>
<script>
document.getElementById("paybutton").style.display="block";
</script>
<?php elseif($orderstatus=='Pending'):?>
  <script>
  document.getElementById("paybutton").style.display="none";
  </script>

<?php elseif($orderstatus=='PAID'):?>
  <script>
  document.getElementById("paidlabel").style.display="block";
  document.getElementById("printlabel").style.display="block";
  </script>
<?php endif ?>

</body>
</html>
