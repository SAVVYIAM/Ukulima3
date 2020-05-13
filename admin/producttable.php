<!DOCTYPE html>
<html>
<head>
	<title> Products</title>
	<style>
	th, td {
  padding: 15px;
  text-align: left;
  }
  #location {
  width: 70%;
  font-size: 20px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
  margin-left: 100px;
  border-radius: 7px;
  border-color: black;
  font-color: black;
}
table, th, td {
  border: 1px solid black;
}

	</style>
</head>
<body>
	<h2 align="center">PRODUCTS</h2>
	<?php

	if(isset($_GET['product_id'])){
//fetch Details
include('../server.php');
$product_id=$_GET['product_id'];
$query="SELECT * from products where id='$product_id' ";
$results=mysqli_query($conn,$query);
while($row=mysqli_fetch_array($results)){
$name=$row['name'];
$description=$row['description'];
$price=$row['price'];
$image=$row['image'];
$productId=$row['id'];


}
}
elseif(!isset($_GET['product_id'])){

	$name=" ";
	$description=" ";
	$price=" ";
	$image=" ";
}


	 require_once "productupdateform.php";
if(isset($_GET['product_id'])):?>
<script>
openForm();
document.getElementById("editproduct").style.display = "block";
document.getElementById("addproduct").style.display = "none";
document.getElementById("id").style.display = "none";
</script>
<?php
//fetch Details



elseif(!isset($_GET['product_id'])):?>
<script>
document.getElementById("editproduct").style.display = "none";
document.getElementById("addproduct").style.display = "block";
document.getElementById("id").style.display = "none";
</script>
<?php

endif

	 ?>
	<div style="padding-bottom:20px;">
	<button onclick="openForm()"  style="float:right;"> Add Product</button>

	</div>
  <input type="text" id="description" style="margin-left:100px;border-radius:5px;border-color:blue;" onkeyup="myFunction()" placeholder="Filter products by category...">
	<table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="products">
		<tr align="left" style="background:blue;">
		    <th>Product Id </th>
        <th>Product Code</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Unit Price</th>
				<th>Action</th>

        </tr>

        <?php $conn = mysqli_connect("localhost","root", "","ukulima_enterprise");
        if ($conn-> connect_error) {
       	  die("Connection Failed: ".$conn->connect_error);
       	}

       	$sql ="SELECT * from products ";
       	$result= $conn->query($sql);

       	if ($result-> num_rows > 0) {
       		while ($row = $result-> fetch_assoc()) {?>
            <tr>

<td bgcolor="#FFFFFF"><?php echo $row['id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['code']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['description']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['price']; ?></td>
<td bgcolor="#FFFFFF"><a role="button" href="producttable.php?product_id=<?php echo $row['id']; ?>" name="updateproduct">Edit</a></td>


</tr>
<?php

       		}

       		}
       		else{?>
            <br>
       			<p align="center" style="font-size: 20px"><b><i>Sorry! No products registered</i></b></p>
            <?php
       		}
       		$conn->close();

        ?>
      </table>
    <script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("description");
  filter = input.value.toUpperCase();
  table = document.getElementById("products");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
    </script>
</body>
</html>
