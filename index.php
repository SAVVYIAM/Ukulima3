
<?php

  //session_start();
  include("server.php");

  /*if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }*/
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">


    <title>UKULIMA ENTERPRISE </title>
<link rel="icon" type="image/png/ico" href="logo.png"/>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">.
    <link href="style.css" rel="stylesheet">

    <script>
/*function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}*/
</script>
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>






  </head>

  <body style="margin-top:0;margin-left:150px;margin-right:150px;">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

    <h3 style="border-radius:10px;background-color:green;opacity:0.9;">  <a class="navbar-brand" href="index.php" style="color:white;font-family:verdana;color:white;">UKULIMA ENTERPRISE ONLINE SALES</a></h3>
  <!--    <button class="navbar-toggler" type="button" data-toggle="collapse"  data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>-->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="cart/product.php" target="displaymain">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart/product.php" target="displaymain">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="showorder.php" target="displaymain" id="myorders_link">My Orders</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="availableorders.php" target="displaymain" id="orders_link">Orders</a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="myinvoices.php" target="displaymain" id="myinvoices_link">My Invoices</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>



      <!--    <li style="padding-top:5px;padding-right:4px;">
            <button type="button" class="btn-light" style="padding-left:5px" >
              <a href="checkout.html" target="displaymain" style="padding-right:2px"><img src="cart.jpeg" style="height:30px ;width:30px;"></a>
              <span class="badge" style="padding-left:3px;color:blue;">0</span>
            </button>
          </li>-->
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="POST" action="cart/product.php" id="searchform" target="displaymain">
          <input class="form-control mr-sm-2" type="text" placeholder="Search product" aria-label="Search" id="input" name="searchstring">
          <input  class="btn btn-primary my-2 my-sm-0" type="submit"   value="Search">
        </form>
        <ul class="navbar-nav mr-auto">
        <li class="nav-item" style="padding-right:2px; padding-left:2px;">
            <a class="nav-link btn btn-primary btn-sm" href="register.php" id="register_button">Register</a>
        </li>
        <li class="nav-item" style="padding-right:1px;">
            <a class="nav-link btn btn-success btn-sm" href="login.php" id="login_button">Login</a>

        </li>
      </ul>
    <form >
<button type="submit" onclick="profile.php" name="showprofile" class="showprofilebutton btn-info btn-sm" id="showprofile"><a href="profile/profile.php" target="displaymain" role="button" class="btn-info btn-sm" style="text-decoration:none;color:white;">Account</a></button>
</form>
<form>
<button id="shownotification" class="shownotificationbutton"><a href="message.php" target="displaymain" role="button" >Notification</a></button>
</form>
      </div>
    </nav>



    <main role="main" class="container">

      <script>
      getElementById("inputcategory").style.display="none";

      </script>
      <div class="sidenav" style="border-radius:5px;">
        <h4>Category</h4>
        <?php
        $query="SELECT  DISTINCT description from products ";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){
  $desci=$row['description'];
         ?>
        <form class="form-inline mt-2 mt-md-0" method="POST" action="cart/product.php" id="categoryform" target="displaymain">
            <input class="form-control mr-sm-2" type="text" placeholder="Search product" aria-label="Search" id="inputcategory" name="searchstring" value="<?php echo $desci;?>">
          <input  class="btn my-6 my-lg-0" style="background-color:grey;" type="submit" value="<?php echo $desci;?>" id="<?php echo $desci?>" >
        </form>
<?php } ?>


      </div>

      <div class="rightnav" style="border-radius:5px;">
      <div class="user_info" style="padding-left:2px;">  <?php if (isset($_SESSION['success'])) : ?>
          <div class="error success" >
          	<h3>
              <?php
              //	echo $_SESSION['success'];
              	unset($_SESSION['success']);
              ?>
          	</h3>
          </div>
      	<?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username']) And isset($_SESSION['usertype']) And $_SESSION['usertype']!='administrator' And $_SESSION['usertype']!='NULL' ) : ?>
        	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
          	<p>Account: <strong><?php echo $_SESSION['usertype']; ?></strong></p>
        	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
          <script>

document.getElementById("register_button").style.display = "none";
document.getElementById("login_button").style.display = "none";
document.getElementById("showprofile").style.display = "block";


</script>

<?php if($_SESSION['usertype']=='Customer'):?>
  <script>
document.getElementById("myorders_link").style.display = "block";
  </script>
<?php elseif($_SESSION['usertype']=='Farmer'):?>
  <script>
document.getElementById("orders_link").style.display = "block";
document.getElementById("myinvoices_link").style.display = "block";
document.getElementById("shownotification").style.display = "block";
  </script>

<?php endif ?>
        <?php endif ?>

</div>
      </div>

      <iframe src="cart/product.php" width="1000px" onload="resizeIframe(this)" frameborder="0" id="displaymain" name="displaymain" scrolling="yes" style="margin:45px;"> </iframe>
    </main>
    <div class="footer"  style="background-color:grey;height:100%;opacity:0.8;">
      <div style="padding-left:10px; padding-top:10px;"
        <div class="row">
          <div class="col-sm">
            <h4>Customer Service</h4>
            <a href="">Contact us</a></br>
            <a href="">Delivery</a></br>

          </div>
          <div class="col-sm">
            <h4>Learn</h4>
            <a href="">About us</a></br>
              <a href="">Terms and Conditions</a></br>

          </div>
          <div class="col-sm">
            <h4>Quick links</h4>
          <a href="">Orders</a><br>
          <a href="">products</a>
          </div>

        </div>

        <p style="padding-left:400px;padding-top:20px; ">&copy Ukulima Enterprise online Sales</p>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
