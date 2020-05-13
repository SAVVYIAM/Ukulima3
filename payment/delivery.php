<!DOCTYPE html>
<html>
<head>
<?php
date_default_timezone_set("Africa/Nairobi");
$datenow=date("Y-m-d");

//add one month
$date=date_create($datenow);
date_add($date,date_interval_create_from_date_string('1 month'));
$datenext=date_format($date, 'Y-m-d');

?>



<link href="updateform.css" type="text/css" rel="stylesheet">
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" type="text/css" rel="stylesheet">
<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

  </script>


</head>

<body>


<!-- form -->

<div class="form-popup" id="myForm">
  <button class="btn-danger btn-sm" onclick="closeForm()" style="float:right;">close</button>
  <form method="POST" action="../server.php?orderid=<?php echo $order_id ;?>" class="form-container">

    <h1>Delivery Information</h1>
<?php include('errors.php'); ?>
    <div class="form-group row">
    <div class="col-xs-4" style="position:relative;padding-left:20px;">
  Delivery address:  <input type="text" class="" name="deliveryaddress"  required>
</div>

</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:20px;">
    Postal area: <input type="text"  name="postalarea" required>
  </div>

</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:20px;">
    Building: <input type="text"  name="building" placeholder="optional" required>
  </div>

</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:20px;">
    Delivery date: <input type="date" min="<?php echo $datenow ?>" max="<?php echo $datenext ?>" name="deliverydate" placeholder="optional" required>
  </div>

</div>



    <button type="submit" class="btn" name="deliveryinfo">Update</button>
  <!--  <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>-->


  </form>
</div>

<!--<button class="open-button btn btn-primary" onclick="openForm()"> Edit</button>-->


<!-- form-->




</body>



</html>
