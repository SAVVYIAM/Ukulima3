<!DOCTYPE html>
<html>
<head>
<style>
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

</head>
<body>
  <div class="printlogo">
  <img align="center" src="../logo.png">

  </div>
  <h3>Customer Placed Order Summary  </h3>

  <table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="orders">
    <tr align="left" style="background:blue;">
        <th>first name </th>
        <th>last name </th>
        <th>Farmer id</th>
        <th>Orders</th>


        </tr>


<?php
include("../server.php");
$query="SELECT * FROM customer  ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
  $Customerid=$row['Customer_id'];
  $fname=$row['F_name'];
  $lname=$row['L_name'];
  $query="SELECT * FROM placed_order where Customer_id='$Customerid'  ";
  $results=mysqli_query($conn,$query);
  $numberofinvoice=mysqli_num_rows($results);
  //while($row=mysqli_fetch_array($result))
?>
<tr>

<td bgcolor="#FFFFFF"><?php echo $fname; ?></td>
<td bgcolor="#FFFFFF"><?php echo $lname; ?></td>
<td bgcolor="#FFFFFF"><?php echo $Customerid ;?></td>
<td bgcolor="#FFFFFF"><?php echo $numberofinvoice ; ?></td>




</tr>





<?php
}



 ?>
</table>
<button onclick="window.print()" style="float:right;margin-right:20px;">PRINT</button>
</body>
</html>
