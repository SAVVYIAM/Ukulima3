<?php include('../server.php');?>
<?php if ($_SESSION['usertype']!='Customer') :?>
<script> alert("please login as customer to place order");
document.location.href="../home.php";</script>
<?php endif ?>
<?php
if($_SESSION['usertype']=='Customer'){
$sid=$_GET['userid'];
echo $sid;
date_default_timezone_set("Africa/Nairobi");
$datenow=date("Y-m-d");
echo "<br>".$datenow;
$permitted_chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input,$strength=16){
$input_length=strlen($input);
$random_string='';
for($i=0;$i<$strength;$i++){
$random_character=$input[mt_rand(0,$input_length-1)];
$random_string .=$random_character;}
return $random_string;
}
$serial=generate_string($permitted_chars, 10);
$result = mysqli_query($conn,"SELECT Customer_id FROM customer where Email='$sid' ");
while($row = mysqli_fetch_array($result))
{
        echo "<br /><b>ID:</b> ".$row['Customer_id'];
        $cust_id=$row['Customer_id'];
        $query = "INSERT INTO placed_order (Order_date,Customer_id,Order_serial,status)
              VALUES('$datenow', '$cust_id','$serial','Pending')";
        mysqli_query($conn, $query);
}
$result = mysqli_query($conn,"SELECT Order_id FROM placed_order where Order_serial='$serial' ");
while($row = mysqli_fetch_array($result))
{
        $Order_id=$row['Order_id'];
    echo "<br/> ".$Order_id;
}
echo $Order_id;
$result = mysqli_query($conn,"SELECT * FROM tbl_cart ");
while($row = mysqli_fetch_array($result))
{
  $cart_product_id=$row['product_id'];
    $cart_quantity=$row['quantity'];
  $query = "INSERT INTO order_details (order_id,product_id,quantity)
        VALUES('$Order_id', '$cart_product_id','$cart_quantity')";
  mysqli_query($conn, $query);
}
mysqli_close($conn);
?>
<script>alert("order successfully placed");</script>
<?php
header('location:../showorder.php');
}
?>
