<!DOCTYPE html>
<html>

<head>

  <link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">
  function view_id(clicked_id)
  {

document.write("");
  var nid=clicked_id;
window.location.href='orderdetails.php?order_id='+ nid;
  }
  </script>
</head>
<?php
include('server.php');

$cust_username=$_SESSION['username'];

$result = mysqli_query($conn,"SELECT Customer_id FROM customer where Email='$cust_username' ");

while($row = mysqli_fetch_array($result))
{

        $cust_id=$row['Customer_id'];

}

?>
<?php
$result = mysqli_query($conn,"SELECT * FROM placed_order where customer_id='$cust_id' ");
//if no order
if (mysqli_num_rows($result) < 1){
  echo '<div style="padding-bottom:100px;color:red;font-size:50;">'."You have no Orders!".'</div>';
  echo '<a  role="button" class="btn-success" href="cart/product.php" target="displaymain">Place Order</a>';
}

while($row = mysqli_fetch_array($result))
{?>
<form method="POST" style="text-align:left;padding-bottom:10px;padding-left:20px;background-color:#90EE90;width:800px;">

<?php
      $Order_id=$row['Order_id'];
      $Order_date=$row['Order_date'];
      $status=$row['status'];

    //echo "<br/> ".$Order_id;
        echo "        ".$Order_date;?>
          <?php echo '<h5 style="float:right;background-color:blue;">  Status:  '.$status.'</h5>'; ?>
    <br />  <strong>Order No:</strong><pre></pre>  <input type="submit" name="showorderi" value="<?php echo $Order_id ?>" placeholder="View" onclick="view_id(this.value)">

    <input id="<?php echo $order_id ?>" type="submit" onclick="view_id(showorderi.value)" value="view">
      </form>

<?php
echo "<br/>";
}





?>

</html>
<!--
alert(clicked_id);
return clicked_id;
-->
