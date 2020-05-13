
<!DOCTYPE html>
<html>

<head>
  <link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function delete_invoice(clicked_id)
  {

  var invoiceid=clicked_id;
//  alert(invoiceid);
document.write("");
window.location.href='myinvoices.php?del_invoice='+ invoiceid;

  }
  function deleteconfirm(){
    alert("Invoice deleted");
  }
  </script>
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
<!--logo-->

<body>
  <div class="printlogo">
  <img align="center" src="logo.png">

  </div>

<?php
include('server.php');
include('checkorderstatus.php');
$farmer_username=$_SESSION['username'];

$result = mysqli_query($conn,"SELECT Farmer_id FROM farmer where Email='$farmer_username' ");

while($row = mysqli_fetch_array($result))
{

        $Farmer_id=$row['Farmer_id'];

}

?>
<?php
$result = mysqli_query($conn,"SELECT * FROM submitted_invoice where Farmer_id='$Farmer_id' ");
//no invoices
if (mysqli_num_rows($result) < 1)
{
echo '<div style="padding-bottom:100px;color:red;font-size:50;">'."You have no submitted invoices!".'</div>';
echo '<a  role="button" class="btn-success" href="availableorders.php" target="displaymain">Go to orders</a>';

}

while($row = mysqli_fetch_array($result))
{?>
<form method="POST" style="text-align:left;padding-bottom:10px;padding-left:20px;background-color:#90EE90;width:800px;">

<?php
      $Invoice_id=$row['Invoice_id'];
      $Invoice_date=$row['Invoice_date'];
      $Product_id=$row['Product_id'];

    //echo "<br/> ".$Order_id;
        echo "        ".$Invoice_date;?>

    <?php
  //find product name
       $resulty = mysqli_query($conn,"SELECT * FROM products where id='$Product_id' ");
        while($rowy = mysqli_fetch_array($resulty))
        {
        $product_name=$rowy['name'];
      }?>
    <br />  <strong>Invoice No:</strong><pre></pre>  <input type="submit" name="invbtn" value="<?php echo $Invoice_id ?>" placeholder="View" onclick="">
    <div style="padding-top:5px;"></div>
  <div style="background-color:blue;padding-top:5px;margin-right:20px;">  <?php echo "For Order no. ".$row['Order_id']."  Product: ".$product_name."   Quantity ".$row['Quantity']."kg";?></div>
  <div style="padding-top:5px;"></div>
    <button id="<?php echo $Invoice_id ?>" onclick="delete_invoice(invbtn.value)">Withdraw</button>
      </form>

<?php
echo "<br/>";
}





?>

<button onclick="window.print()" class="btn btn-success" style="float:right;margin-right:200px;">PRINT</button>

<?php

if(isset($_GET['del_invoice']))
{
$del_invoice=$_GET['del_invoice'];
$result = mysqli_query($conn,"DELETE  FROM submitted_invoice where Invoice_id='$del_invoice' ");
header('location:myinvoices.php ');
}
?>
<!--
alert(clicked_id);
return clicked_id;
-->
</body>
</html>
