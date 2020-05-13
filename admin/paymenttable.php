<!DOCTYPE html>
<html>
<head>
	<title> Payments</title>
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
	<h2 align="center">PAYMENTS</h2>
  <input type="text" id="custid" style="margin-left:100px;border-radius:5px;border-color:blue;" onkeyup="myFunction()" placeholder="Filter payment by order id...">
	<table style="width: 90%;margin-left: 70px;border-collapse: collapse;" id="payments">
		<tr align="left" style="background:blue;">
		    <th>Payment Reference </th>
        <th>Customer id</th>
        <th>Order id</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
        <th>Pesapal_tracking_id</th>
        </tr>

        <?php $conn = mysqli_connect("localhost","root", "","ukulima_enterprise");
        if ($conn-> connect_error) {
       	  die("Connection Failed: ".$conn->connect_error);
       	}

       	$sql ="SELECT * from payment ";
       	$result= $conn->query($sql);

       	if ($result-> num_rows > 0) {
       		while ($row = $result-> fetch_assoc()) {?>
            <tr>

<td bgcolor="#FFFFFF"><?php echo $row['Payment_ref']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Customer_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Order_id']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Amount']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Status']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Date']; ?></td>
<td bgcolor="#FFFFFF"><?php echo $row['Pesapal_tracking_id']; ?></td>



</tr>
<?php

       		}

       		}
       		else{?>
            <br>
       			<p align="center" style="font-size: 20px"><b><i>Sorry! No Payments yet</i></b></p>
            <?php
       		}
       		$conn->close();

        ?>
      </table>
    <script type="text/javascript">
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("custid");
  filter = input.value.toUpperCase();
  table = document.getElementById("payments");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
      <button id="printlabel" onclick="window.print()" style="margin-left:70%;width:20%;background-color:green;">PRINT </button>
</body>
</html>
