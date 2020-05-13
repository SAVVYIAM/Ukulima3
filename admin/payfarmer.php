<?php
include("../server.php");
if(isset($_GET['invoiceidpay']))
{
  $invidpay=$_GET['invoiceidpay'];
$query=" UPDATE submitted_invoice
      set Status='PAID'
      WHERE Invoice_id='$invidpay' ";
  mysqli_query($conn,$query);

  $querys=" UPDATE farmer_payout
        set Status='PAID'
        WHERE Invoice_id='$invidpay' ";
    mysqli_query($conn,$querys);



header('location:invoicepayouts.php');


}


?>
