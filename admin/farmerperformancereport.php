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
  <h3>FARMER INVOICING SUMMARY  </h3>
  <table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="invoices">
    <tr align="left" style="background:blue;">
        <th>first name </th>
        <th>last name </th>
        <th>Farmer id</th>
        <th>Invoices</th>


        </tr>


<?php
include("../server.php");
$query="SELECT * FROM farmer  ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result))
{
  $Farmerid=$row['Farmer_id'];
  $fname=$row['F_name'];
  $lname=$row['L_name'];
  $query="SELECT * FROM submitted_invoice where Farmer_id='$Farmerid'  ";
  $results=mysqli_query($conn,$query);
  $numberofinvoice=mysqli_num_rows($results);
  //while($row=mysqli_fetch_array($result))
?>
<tr>

<td bgcolor="#FFFFFF"><?php echo $fname; ?></td>
<td bgcolor="#FFFFFF"><?php echo $lname; ?></td>
<td bgcolor="#FFFFFF"><?php echo $Farmerid ;?></td>
<td bgcolor="#FFFFFF"><?php echo $numberofinvoice ; ?></td>




</tr>





<?php
}



 ?>
</table>
<button onclick="window.print()" >PRINT</button>
</body>
</html>
