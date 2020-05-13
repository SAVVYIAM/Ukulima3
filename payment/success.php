<?php require_once 'app/sessionconfig/headersession.php'; ?>
<?php require_once 'app/sessionconfig/loginsession.php'; ?>
<?php
if (isset($_GET['pesapal_transaction_tracking_id'])) {
	$pesapal_transaction_tracking_id = $_GET['pesapal_transaction_tracking_id'];
	$pesapal_merchant_reference = $_GET['pesapal_merchant_reference'];

	try {
		
			$stmt = $auth_user->runQuery("UPDATE propertyrooms SET `paid`=1 WHERE `propertyrooms_id`= '$pesapal_merchant_reference' ");
	        $stmt->bindparam("1", $houses_id);
	        $stmt->execute();

		if($auth_user->pay($user_id, $pesapal_transaction_tracking_id, $pesapal_merchant_reference))
        {
			
        }

	} catch (Exception $e) {
		$e->getMessage();
	}
}
?>

<?php require_once 'app/sessionconfig/headersession.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Bluesky</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Bluesky template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">


	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"><div><img src="images/logo.png" alt=""></div></div>
					</div>
				</a>
			</div>
			<ul>
				<li class="menu_item"><a href="index.php">Home</a></li>
				<li class="menu_item"><a href="profile.php">Profile</a></li>
				<li class="menu_item"><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="menu_phone"><a href="logout.php?logout=true">Logout</a></div>
	</div>

	<div class="home">

		<!-- Home Slider -->
		<div class="home_slider_container">
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slide -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)"></div>
					<div class="slide_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="slide_content">
										<div class="home_title">

											<center>
												Payment made successfully<br /><span class="fa fa-check"></span>
											</center>
										</div>
										<a href="index.php">
											<button class="btn btn-primary">BACK</button>
										</a>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

		
		

			</div>
		</div>
	</div>







</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>