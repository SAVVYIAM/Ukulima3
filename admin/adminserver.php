
<?php
include('../server.php');
//confirm collection of the produce
if(isset($_GET['invoiceid']))
{
  $invid=$_GET['invoiceid'];
$query=" UPDATE submitted_invoice
      set Status='Collected'
      WHERE Invoice_id='$invid' ";
  mysqli_query($conn,$query);
header('location:invoices.php');


}
if(isset($_POST['addproduct'])){
  $name= mysqli_real_escape_string($conn, $_POST['name']);
  $description= mysqli_real_escape_string($conn, $_POST['description']);
  $price= mysqli_real_escape_string($conn, $_POST['price']);
  $image= mysqli_real_escape_string($conn, $_POST['image']);
$imagesrc="product-img/".$image;
//generate product code
$permitted_chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input,$strength=16){
$input_length=strlen($input);
$random_string='';
for($i=0;$i<$strength;$i++){
$random_character=$input[mt_rand(0,$input_length-1)];
$random_string .=$random_character;

}
return $random_string;

}
$code=generate_string($permitted_chars, 5);

$query="INSERT INTO products(code,name,description,price,image)
    values('$code','$name','$description','$price','$imagesrc') ";
    mysqli_query($conn,$query);
header('location:producttable.php');

}

//update product information
if(isset($_POST['editproduct'])){
  $name= mysqli_real_escape_string($conn, $_POST['name']);
  $description= mysqli_real_escape_string($conn, $_POST['description']);
  $price= mysqli_real_escape_string($conn, $_POST['price']);
    $id= mysqli_real_escape_string($conn, $_POST['id']);
  $image= mysqli_real_escape_string($conn, $_POST['image']);
$imagesrc="product-img/".$image;



$query="UPDATE products
set name='$name',description='$description',price='$price',image='$imagesrc'
where id='$id'";
mysqli_query($conn,$query);
header('location:producttable.php');




}




 ?>
