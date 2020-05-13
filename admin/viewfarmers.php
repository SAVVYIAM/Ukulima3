<!DOCTYPE html>
<html>
<head>
	<title> farmers</title>
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
	<h2 align="center">REGISTERED FARMERS</h2>
  <input type="text" id="area" style="margin-left:100px;border-radius:5px;border-color:blue;" onkeyup="myFunction()" placeholder="Filter Farmers by area...">
	<table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="farmers">
		<tr align="left" style="background:blue;">
		    <th>Farmer Id </th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Id Number</th>
        <th>Address</th>
        <th>Postal Area</th>
        <th>Mobile</th>
        <th>Email</th>
        </tr>

        <?php $conn = mysqli_connect("localhost","root", "","ukulima_enterprise");
        if ($conn-> connect_error) {
       	  die("Connection Failed: ".$conn->connect_error);
       	}

       	$sql ="SELECT * from farmer ";
       	$result= $conn->query($sql);

       	if ($result-> num_rows > 0) {
       		while ($row = $result-> fetch_assoc()) {?>
            <tr>

<td bgcolor="#FFFFFF"><?php echo $row['Farmer_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['F_name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['L_name']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Id_number']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Address']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Postal_area']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Mobile_number']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Email']; ?></td>


</tr>
<?php

       		}

       		}
       		else{?>
            <br>
       			<p align="center" style="font-size: 20px"><b><i>Sorry! No farmers registered</i></b></p>
            <?php
       		}
       		$conn->close();

        ?>
      </table>
    <script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("area");
  filter = input.value.toUpperCase();
  table = document.getElementById("farmers");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
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
