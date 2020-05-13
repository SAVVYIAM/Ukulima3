<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="validation/validation.js"></script>
  </head>
<body class="loginmain" style="background:blue;">
  <div class="">
    <div class="">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" >
            <h5 class="card-title text-center">Register</h5>
            <form method="post" action="register.php" class="" onsubmit="return checkForm(this);">
              <?php include('errors.php') ?>

              <div>
                      <label>User type</label><br />
                    <select name="optuser" autofocus>
              <option value="farmer">Farmer</option>
                <option value="customer">Customer</option>
                <option value="administrator">Admin</option>
                    </select>
                  </div>

              <label for="firstname">First Name</label>
              <input type="text" name="firstname"  value="<?php  echo $F_name; ?>" class="form-control" placeholder="First Name"  required >
        <label for="lastname">Last name</label>
                <input type="text" name="lastname"  value="<?php  echo $L_name; ?>"  class="form-control" placeholder="Last name" required>
                <label for="idnumber">Id Number</label>
                      <input type="text" name="idnumber"  value="<?php echo $Id_number; ?>" class="form-control" placeholder="Id Number"  required>

            <label for="address">Address</label>
              <input type="text"name="address"  value="<?php echo  $Address; ?>" class="form-control" placeholder="Address" required>
              <label for="postalarea">Postal area</label>
              <input type="text" name="postalarea"  value="<?php echo $Postal_area; ?>" class="form-control" placeholder="Postal area"  required>
              <div class="">
                <label for="mobilenumber">Mobile Number</label>
                <input type="text" name="mobilenumber"  value="<?php  echo $Mobile_number; ?>" class="form-control" placeholder="Mobile number" pattern="^\d{10}$" required >

              </div>
              <div class="">
                <label for="email">Email address</label>
                <input type="email" name="email"  value="<?php echo $Email; ?>" class="form-control" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid phone number" required>

              </div>

              <div class="">
                  <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>


              </div>
              <div class="">
                  <label for="confirminputPassword">Confirm Password</label>
                <input type="password" name="passwordconfirm" class="form-control" placeholder="Confirm Password" required> <br><br>

              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="register_user">Register</button>
              <br/>
              <label style="padding-right:350px"><a href="login.php">Sign in</a></label>
              <a href="index.php" role="button" class="btn-danger btn-sm">Cancel</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
