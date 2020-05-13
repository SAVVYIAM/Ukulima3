<!DOCTYPE HTML>
<html>
<head>
<link href="../bootstrap-4.0.0/dist/css/bootstrap.css" type="text/css">
<link href="updateform.css" type="text/css" rel="stylesheet">

</head>

<main class="mainprofile" style="margin:20px; background-color:blue;border-radius:5px;padding-left:10px;margin-right:100px;margin-bottom:500px;">
<?php
include('../server.php');
$sid=$_SESSION['username'];
$user=$_SESSION['usertype'];
$result = mysqli_query($conn,"SELECT * FROM $user where Email='$sid' ");
while($row = mysqli_fetch_array($result))
{

       echo "<br /> <b><i>Profile</i></b> <br />";
       echo "<b>Account:</b> ".$_SESSION['usertype']."<br/>";
        echo "<b>First name:</b> ". $row['F_name']." ".$row['L_name'];
        echo "<br /><b>ID:</b> ".$row['Id_number'];
        echo "<br /><b>Address:</b> ".$row['Address'];
        echo "<br /><b>Postal Area:</b> ".$row['Postal_area'];
        echo "<br /><b>Email:</b> ".$row['Email'];
        echo "<br /><b>Mobile:</b> "."0".$row['Mobile_number'];
//variables for edit Profile
$fname=$row['F_name'];
$lname=$row['L_name'];
$idnum=$row['Id_number'];
$address=$row['Address'];
$postal=$row['Postal_area'];
$email=$row['Email'];
$mobile=$row['Mobile_number'];

}
mysqli_close($conn);

?>

<?php require_once "updateform.php"; ?>
<div style="padding-bottom:20px;">
<button onclick="openForm()"  style="float:right;"> Edit</button>

</div>
    </main>


</html>
