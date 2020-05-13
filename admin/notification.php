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
  <form method="POST" action="adminserver.php" class="form-container" onsubmit="success()">

    <h1>Product</h1>
    <div class="form-group row">

      <div class="col-xs-4" style="position:relative;float:left;padding-left:10px;">
       <input type="text" placeholder="product id" value="<?php echo $productId; ?>"  name="id" id="id" required>
      </div>
<div class="col-xs-4" style="position:relative;float:left;padding-left:10px;">
Product name: <input type="text" placeholder="product name" value="<?php echo $name; ?>"  name="name" required>
</div>
</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
    Description: <input type="text"   name="description" value="<?php echo $description; ?>" required>
  </div>
  <div class="col-xs-2" style="position:relative;float:right;padding-left:10px; align:center;">
      Price (KSH): <input type="text"  name="price" value="<?php echo $price; ?>" required>
</div>
</div>

<div class="form-group row">
  <div class="photo"  style="position:relative;float:left;padding-left:10px;">
    <input type="file" name="image" value="<?php echo $image ?>"   accept="image/*">
    <div class="photo_helper">
      <div class="photo__frame photo__frame--circle ">
      </div></div>



</div>
      </div>

    <button type="submit" class="btn" name="addproduct" id="addproduct">Add</button>
    <button type="submit" class="btn" name="editproduct" id="editproduct">Update</button>
  <!--  <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>-->


  </form>
</div>

<!--<button class="open-button btn btn-primary" onclick="openForm()"> Edit</button>-->


<!-- form-->




</body>



</html>
