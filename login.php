<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title> Login</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link href="bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
  </head>
<body>
  <div class="">
    <div class="">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="post" action="login.php">
              <?php include('errors.php') ?>
              <div class="">
                <div>
                        <label for="confirminputPassword">Login as:</label><br />
                      <select name="optloginas" autofocus>
                <option value="Farmer">Farmer</option>
                  <option value="Customer">Customer</option>
                  <option value="administrator">Admin</option>
                      </select>
                    </div>
                <input type="email" name="email" class="form-control" placeholder="Email address" value="<?php echo $Email ?>" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit" name="sign_in">Sign in</button>
              <br/>
            <!--  <label><a href="#">Forgot password?</a></label>-->
              <label  style="padding-right:350px"><a href="register.php">Register</a></label>
            <a href="index.php" role="button" class="btn-danger btn-sm">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
