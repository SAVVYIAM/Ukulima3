<?php
session_start();
//initialize variables
$F_name="";
$L_name="";
$Id_number="";
$Address="";
$Postal_area="";
$Mobile_number="";
$Email="";

// define database variables
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ukulimaenterprises";
$errors = array();

// connect to the database
$conn =  new mysqli($servername, $username, $password, $dbname);

// REGISTER USER
if (isset($_POST['register_user'])) {
  // receive all input values from the form
  $usertype=$_POST['optuser'];
  $F_name= mysqli_real_escape_string($conn, $_POST['firstname']);
   $L_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $Id_number = mysqli_real_escape_string($conn, $_POST['idnumber']);
   $Address = mysqli_real_escape_string($conn, $_POST['address']);
   $Postal_area = mysqli_real_escape_string($conn, $_POST['postalarea']);
   $Mobile_number = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
     $Password = mysqli_real_escape_string($conn, $_POST['password']);
        $Passwordconfirm = mysqli_real_escape_string($conn, $_POST['passwordconfirm']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  /*if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }*/
  if ($Password != $Passwordconfirm) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM $usertype WHERE Email='$Email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists

    if ($user['Email'] === $Email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$Password = md5($Passwordconfirm);//encrypt the password before saving in the database

    $query = "INSERT INTO $usertype (F_name, L_name,Id_number,	Address,	Postal_area,	Mobile_number,	Email,	Password)
   			  VALUES('$F_name', '$L_name', '$Id_number','$Address','$Postal_area','$Mobile_number','$Email','$Password')";
  	mysqli_query($conn, $query);
  	//$_SESSION['username'] = $Email;
  	//$_SESSION['success'] = "You are now logged in";
      //  $_SESSION['usertype']=$usertype;
    //    $_SESSION['cart_item']="";

  /*  $_SESSION['username'] = $Email;
    $_SESSION['username'] = $Email;
    $_SESSION['username'] = $Email;*/

    //if($usertype=='administrator'){
//header('location: admin/adminpanel.php');
  //  }
    //else {
      header('location: login.php');
    //}




  }
}

// ...
// ...

// LOGIN USER
if (isset($_POST['sign_in'])) {
    $usertype=$_POST['optloginas'];
  $Email = mysqli_real_escape_string($conn, $_POST['email']);
  $Password = mysqli_real_escape_string($conn, $_POST['password']);

  if (empty($Email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($Password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$Password = md5($Password);
  	$query = "SELECT * FROM $usertype WHERE Email='$Email' AND password='$Password'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $Email;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['usertype']=$usertype;
      //  $_SESSION['cart_item']="";


      if($usertype=='administrator'){
      header('location: admin/adminpanel.php');
      }
      else {
        header('location: index.php');
      }



  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
//update Profile
if(isset($_POST['updateprofile'])){
$useremail=$_SESSION['username'];
if($_SESSION['usertype']=='Customer'){
$tablename="customer";}
if($_SESSION['usertype']=='Farmer'){
$tablename="farmer";}
if($_SESSION['usertype']=='administrator'){
$tablename="administrator";}
  $F_name= mysqli_real_escape_string($conn, $_POST['firstname']);
   $L_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $Id_number = mysqli_real_escape_string($conn, $_POST['idnumber']);
   $Address = mysqli_real_escape_string($conn, $_POST['address']);
   $Postal_area = mysqli_real_escape_string($conn, $_POST['postalarea']);
   $Mobile_number = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
    $Email = mysqli_real_escape_string($conn, $_POST['email']);
      $Password = mysqli_real_escape_string($conn, $_POST['password']);
      $passwordencrypt=	md5($Password);
$query="UPDATE $tablename
SET F_name='$F_name', L_name='$L_name',Id_number='$Id_number',	Address='$Address',	Postal_area='$Postal_area',	Mobile_number='$Mobile_number', Email='$Email'
WHERE Email='$useremail' and Password='$passwordencrypt' ";
mysqli_query($conn,$query);
$_SESSION['username']=$Email;
header('location:profile.php');

}


//delivery Information
if(isset($_POST['deliveryinfo'])){
  $order_id=$_GET['orderid'];
  $postal_area= mysqli_real_escape_string($conn, $_POST['postalarea']);
    $building= mysqli_real_escape_string($conn, $_POST['building']);
$deliverydate= mysqli_real_escape_string($conn, $_POST['deliverydate']);
  $deliveryaddress= mysqli_real_escape_string($conn, $_POST['deliveryaddress']);

//check if record exists
$query = "SELECT * FROM deliveryinformation WHERE Order_id='$order_id' ";
$results = mysqli_query($conn, $query);
if (mysqli_num_rows($results) > 0){
array_push($errors,"delivery information for this order already exists");
}

if(count($errors)==0){
$query="INSERT INTO deliveryinformation(Order_id,Delivery_date,Address,Postal_area,Building)
        VALUES ('$order_id','$deliverydate','$deliveryaddress','$postal_area','$building')";
mysqli_query($conn,$query);

}

$querynotification="INSERT INTO notification(Sender,Recipient_type,Order_id,Message)
        VALUES ('Administrator','farmer','$order_id','submit')";
mysqli_query($conn,$querynotification);


header('location:index.php');

}


?>
