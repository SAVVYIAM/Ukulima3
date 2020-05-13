<!DOCTYPE html>
<html>
<head>
<?php ?>



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
  <form method="POST" action="profile.php" class="form-container">

    <h1>Edit Profile</h1>
    <div class="form-group row">
    <div class="col-xs-4" style="position:relative;padding-left:10px;">
  First name:  <input type="text" class="" name="firstname" value="<?php echo $fname;?>" required>
</div>
<div class="col-xs-4" style="position:relative;float:left;padding-left:5px;">
  Last name: <input type="text" placeholder="Last " value="<?php echo $lname;?>"  name="lastname" required>
</div>
</div>

<div class="form-group row">
<div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
    ID: <input type="text"  value="<?php echo $idnum;?>" name="idnumber" required>
  </div>
  <div class="col-xs-2" style="position:relative;float:right;padding-left:30px; align:center;">
      Address: <input type="text" value="<?php echo $address;?>" name="address" required>
</div>
</div>

<div class="form-group row">
  <div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
    Area: <input type="text"  value="<?php echo $postal;?>" name="postalarea" required>
  </div>
<div class="col-xs-2" style="position:relative;float:right;padding-left:30px;">
        Email: <input type="text"  value="<?php echo $email;?>" name="email" required>
      </div>

      </div>

      <div class="form-group row">
        <div class="col-xs-2" style="position:relative;float:left;padding-left:10px;">
          Mobile: <input type="text"  value="<?php echo $mobile;?>" name="mobilenumber" required>
        </div>
      <div class="col-xs-" style="position:relative;float:left;padding-left:10px;">
            Password: <input type="password" placeholder="Enter password" name="password" required>
          </div>
        </div>
    <button type="submit" class="btn" name="updateprofile">Update</button>
  <!--  <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>-->


  </form>
</div>

<!--<button class="open-button btn btn-primary" onclick="openForm()"> Edit</button>-->


<!-- form-->




</body>



</html>
