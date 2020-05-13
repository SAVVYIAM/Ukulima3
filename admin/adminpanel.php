<?php include('../server.php'); ?>
<?php
if ($_SESSION['usertype']!='administrator') {
  header('location: ../login.php');}

 if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>


    <nav class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Ukulima Enterprise</a>
    <!--  <input class="form-control form-control-dark w-30" type="text" placeholder="Search" aria-label="Search">-->
      <ul class="navbar-nav px-3">
        <!--account details-->
        <li style="padding-left:10px;" class="nav-item">
          <?php  if (isset($_SESSION['username']) And isset($_SESSION['usertype']) ) : ?>
          <?php echo "user:".$_SESSION['username']."<br>"; ?>
              <?php echo $_SESSION['usertype']; ?>

        <?php  endif ?>
        </li>
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="adminpanel.php?logout='1'">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid" >


      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="padding-top:100px;">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">


              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>




              <li class="nav-item">
                <a class="nav-link" href="vieworders.php" target="adminview">
                  <span data-feather="shopping-cart"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="producttable.php" target="adminview">
                  <span data-feather="file"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="viewcustomers.php" target="adminview">
                  <span data-feather="users"></span>
                  Customers
                </a>
              </li>
       <li class="nav-item">
                <a class="nav-link" href="viewfarmers.php" target="adminview">
                  <span data-feather="users"></span>
                  Farmers
                </a>
              </li>

                            <li class="nav-item">
                              <a class="nav-link" href="invoices.php" target="adminview">
                                <span data-feather="shopping-cart"></span>
                                Invoices
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="paymenttable.php" target="adminview">
                                <span data-feather="shopping-cart"></span>
                                Payment
                              </a>
                            </li>

                                          <li class="nav-item">
                                                          <a class="nav-link" href="showsales.php" target="adminview">
                                                            <span data-feather="file"></span>
                                                            Sales
                                                          </a>
                                                        </li>


                                                      <li class="nav-item">
                                                                                      <a class="nav-link" href="invoicepayouts.php" target="adminview">
                                                                                  <span data-feather="file"></span>
                                                                                        Invoice Payout
                                                                                      </a>
                                                                                    </li>
<!--reports-->
<li class="nav-item">
  <a class="nav-link active" href="#">
    <span data-feather="home"></span>
    REPORTS<span class="sr-only">(current)</span>
  </a>
</li>


                            <li class="nav-item">
                              <a class="nav-link" href="farmerperformancereport.php" target="adminview">
                                <span data-feather="file"></span>
                                Farmer Perfomance
                              </a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link" href="reportbuyerperformance.php" target="adminview">
                                <span data-feather="file"></span>
                                Buyer performance
                              </a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link" href="showproductavailability.php" target="adminview">
                                <span data-feather="file"></span>
                                Product Availability
                              </a>
                            </li>

            </ul>
          </div>
        </nav>


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <iframe src="viewcustomers.php" name="adminview" width="1000px" height="1000px"  frameborder="0" onload="resizeIframe(this)">

          </iframe>
        </main>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
