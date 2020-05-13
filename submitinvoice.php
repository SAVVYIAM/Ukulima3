<?php include('server.php');
$uid=$_SESSION['username'];
$orderid=$_GET['order_id'];
$productid=$_GET['product_id'];
$Invoicedate=date("Y-m-d");
$quantity=$_GET['quantity'];

echo "Welcome to your invoices";
echo $orderid."<br/>";
echo $productid;
echo "qty ".$quantity;
echo $uid;
echo $Invoicedate;

$result = mysqli_query($conn,"SELECT Farmer_id FROM farmer where Email='$uid' ");

while($row = mysqli_fetch_array($result))
{
        echo "<br /><b>ID:</b> ".$row['Farmer_id'];
        $Farmer_id=$row['Farmer_id'];
        echo $Farmer_id;
        $query = "INSERT INTO submitted_invoice (Farmer_id,Order_id,Invoice_date,Product_id,Quantity)
              VALUES('$Farmer_id', '$orderid','$Invoicedate','$productid','$quantity')";
        mysqli_query($conn, $query);
mysqli_close($conn);
echo "successful";
header('location:myinvoices.php');
}
?>
