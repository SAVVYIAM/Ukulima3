<!DOCTYPE html>
<html>
<head>
	<title> orders</title>
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
	<h2 align="center">ORDERS</h2>
	<div style="padding-bottom:20px;">
	<button onclick="openForm()"  style="float:right;"> Confirm delivery</button>

	</div>
	<?php require_once 'salesinfo.php';  ?>
  <input type="text" id="status" style="margin-left:100px;border-radius:5px;border-color:blue;" onkeyup="myFunction()" placeholder="Filter orders by order status...">
	<table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="orders">
		<tr align="left" style="background:blue;">
		    <th>Order id </th>
        <th>Order date</th>
        <th>Customer id</th>
        <th>Order serial</th>
        <th>Status</th>
				<th>Action</th>

        </tr>

        <?php $conn = mysqli_connect("localhost","root", "","ukulima_enterprise");
        if ($conn-> connect_error) {
       	  die("Connection Failed: ".$conn->connect_error);
       	}

       	$sql ="SELECT * from placed_order ";
       	$result= $conn->query($sql);

       	if ($result-> num_rows > 0) {
       		while ($row = $result-> fetch_assoc()) {?>
            <tr>

<td bgcolor="#FFFFFF"><?php echo $row['Order_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Order_date']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Customer_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Order_serial']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['status']; ?></td>
<td bgcolor="#FFFFFF"><a id="orderdetails" name="orderdetails" role="button" class="btn btn-primary" href="vieworderdetails.php?order_id=<?php echo $row['Order_id'];?>" target="adminview" ">Details</a></td>



</tr>
<?php

       		}

       		}
       		else{?>
            <br>
       			<p align="center" style="font-size: 20px"><b><i>Sorry! No orders registered</i></b></p>
            <?php
       		}
       		$conn->close();

        ?>
      </table>
    <script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("status");
  filter = input.value.toUpperCase();
  table = document.getElementById("orders");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
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
