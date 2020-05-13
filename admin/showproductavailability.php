<!DOCTYPE html>
<html>
<head>
	<title> Product availability</title>
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
	<h2 align="center">PRODUCT AVAILABILITY</h2>
  <input type="text" id="productid" style="margin-left:100px;border-radius:5px;border-color:blue;" onkeyup="myFunction()" placeholder="Filter Farmers by ...">
	<table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="productavailability">
		<tr align="left" style="background:blue;">
		    <th>id </th>
        <th>Product id</th>
        <th>Farmer id</th>
        <th>Quantity</th>
        <th>Update date</th>

        </tr>

        <?php $conn = mysqli_connect("localhost","root", "","ukulima_enterprise");
        if ($conn-> connect_error) {
       	  die("Connection Failed: ".$conn->connect_error);
       	}

       	$sql ="SELECT * from product_availability ";
       	$result= $conn->query($sql);

       	if ($result-> num_rows > 0) {
       		while ($row = $result-> fetch_assoc()) {?>
            <tr>

<td bgcolor="#FFFFFF"><?php echo $row['Id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Product_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Farmer_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Quantity']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Update_date']; ?></td>



</tr>
<?php

       		}

       		}
       		else{?>
            <br>
       			<p align="center" style="font-size: 20px"><b><i>Sorry! No products availability to show registered</i></b></p>
            <?php
       		}
       		$conn->close();

        ?>
      </table>
    <script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("productid");
  filter = input.value.toUpperCase();
  table = document.getElementById("productavailability");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
  <button id="printlabel" onclick="window.print()" style="margin-left:70%;width:20%;background-color:green;">PRINT </button>
</html>
