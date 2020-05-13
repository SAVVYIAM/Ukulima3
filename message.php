

<?php
include('server.php');
$sid=$_SESSION['username'];
$user=$_SESSION['usertype'];
$result = mysqli_query($conn,"SELECT * FROM $user where Email='$sid' ");
while($row = mysqli_fetch_array($result)){
$fid=$row['Farmer_id'];

}

$resultorder = mysqli_query($conn,"SELECT * FROM placed_order where status='PAID' ");
if (mysqli_num_rows($resultorder) > 0){
while($roworder = mysqli_fetch_array($resultorder)){
$orderid=$roworder['Order_id'];



$resultinvoice = mysqli_query($conn,"SELECT * FROM submitted_invoice where Farmer_id='$fid' and Order_id='$orderid' ");
while($rowinvoice = mysqli_fetch_array($resultinvoice)){
$Invoice_id=$rowinvoice['Invoice_id'];

$resultdelivery = mysqli_query($conn,"SELECT * FROM deliveryinformation WHERE Order_id='$orderid' ORDER BY Delivery_date DESC ");
while($rowdelivery = mysqli_fetch_array($resultdelivery)){
$deliverydate=$rowdelivery['Delivery_date'];
echo '<div style="background-color:blue;width:700px;padding-bottom:20px;">please Submit produce for Invoice Id: '.$Invoice_id." on ".$deliverydate." at "." 6 am"." to Our Offices</div><br/>";


}


}
}
}



else{
echo "No notifications";

}

 ?>
