<!DOCTYPE html>
<html>
<head>
<?php



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

  function success(){

    alert("successful updated");
  }

  </script>


</head>

<body>


<!-- form -->

<div class="form-popup" id="myForm">
  <button class="btn-danger btn-sm" onclick="closeForm()" style="float:right;">close</button>
  <form method="POST" action="postsales.php?" class="form-container" onsubmit="success()">

    <h1>Delivery Info</h1>
    <div class="form-group row" style="padding-left:15px;">

      <div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
          Order_id: <input type="number"   name="saleorderid" value="" required>
        </div>


</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
    Service cost: <input type="number"   name="salecost" value="" required>
  </div>

</div>



    <button type="submit" class="btn" name="postsale" id="postsale">Update</button>
  <!--  <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>-->


  </form>
</div>

<!--<button class="open-button btn btn-primary" onclick="openForm()"> Edit</button>-->


<!-- form-->




</body>



</html>
