<?php
include('../server.php');

$prodcode= $_GET['code'];
$prodquantity=$_POST['quantity'];
$farmerusername=$_SESSION['username'];

$query="SELECT * from farmer where Email='$farmerusername'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){

$farmerid=$row['Farmer_id'];

}


$query="SELECT * from products where code='$prodcode'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($result)){

$prodid=$row['id'];

}

$querya="SELECT * from product_availability where Product_id='$prodid' and Farmer_id='$farmerid'";
$result=mysqli_query($conn,$querya);
if (mysqli_num_rows($result) < 1){
$querys="INSERT INTO product_availability(Product_id,Farmer_id,Quantity)  VALUES('$prodid','$farmerid','$prodquantity')";
mysqli_query($conn,$querys);

echo "recorded successfully";
header('location:../home.php');
}
else{

$querys="UPDATE product_availability
      set Quantity='$prodquantity'
      WHERE Product_id='$prodid' and Farmer_id='$farmerid'";
      mysqli_query($conn,$querys);
echo "updated successfully";
header('location:../home.php');
}

 ?>
