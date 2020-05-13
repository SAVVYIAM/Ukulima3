
<div id="product-grid">
    <div class="txt-heading">
        <div class="txt-heading-label">Products</div>

    </div>
    <div class="product-footer" id="<?php if(ISSET($_SESSION['usertype']) AND $_SESSION['usertype']=='Farmer') echo ""; else echo "availabilityfooter"; ?>"><h3>AVAILABILITY</h3></div>
    <?php
if($filter=="showall"){
    $query = "SELECT * FROM products";
}
else{
    $query = "SELECT * FROM products WHERE description='$filter' OR name LIKE '%$filter%' ";
  }
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {


          //product availability check
          if(ISSET($_SESSION['username']) AND $_SESSION['usertype']=='Farmer'){
       $farmerusername=$_SESSION['username'];
          $queryt="SELECT * from farmer where Email='$farmerusername'";
          $resultt=mysqli_query($conn,$queryt);
          while($rowt=mysqli_fetch_array($resultt)){

          $farmerid=$rowt['Farmer_id'];

          }

       $prodcode=$product_array[$key]["code"];
          $queryy="SELECT * from products where code='$prodcode'";
          $resulty=mysqli_query($conn,$queryy);
          while($rowy=mysqli_fetch_array($resulty)){

          $prodid=$rowy['id'];

        }

          $querya="SELECT Quantity from product_availability where Product_id='$prodid' and Farmer_id='$farmerid'";
          $resulta=mysqli_query($conn,$querya);
          if (mysqli_num_rows($resulta) >0){
            while($rowa=mysqli_fetch_array($resulta)){
              $quantityavailable=$rowa['Quantity'];
            }
}
else{
  $quantityavailable=0;
}}
else{$quantityavailable=10;}

          //end of check
            ?>
        <div class="product-item">
        <form method="post"
            action="product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div class="product-image">
                <img src="<?php echo $product_array[$key]["image"]; ?>">
                <div class="product-title">
                    <?php echo $product_array[$key]["name"]; ?>
                </div>
            </div>

            <div class="product-footer" id="<?php if(ISSET($_SESSION['usertype']) AND $_SESSION['usertype']=='Farmer') echo "orderfooter"; else echo ""; ?>">
                <div class="float-right">
                    <input type="text" name="quantity" value="1"
                        size="2" class="input-cart-quantity" /><input type="image"
                        src="add-to-cart.png" class="btnAddAction" />
                </div>
                <div class="product-price float-left" id="product-price-<?php echo $product_array[$key]["code"]; ?>"><?php echo "Ksh ".$product_array[$key]["price"]; ?></div>

            </div>


        </form>
        <form method="post" action="updateavailability.php?code=<?php echo $product_array[$key]["code"];  ?>" id="availabilityform">
        <div class="product-footer" id="<?php if(ISSET($_SESSION['usertype']) AND $_SESSION['usertype']=='Farmer') echo ""; else echo "availabilityfooter"; ?>">
            <div class="float-right">

                <input type="text" name="quantity" value="<?php echo $quantityavailable; ?>"
                    size="1" class="input-cart-quantity" placeholder="qty" /><input type="submit"
                    value="Add" class="btnAddAction" />
            </div>
            <div class="product-price float-left" id="product-price-<?php echo $product_array[$key]["code"]; ?>"><?php echo "Ksh ".$product_array[$key]["price"]; ?></div>
        </div>
      </form>
    </div>
    <?php
        }
    }
    else{

      echo "No products to show";
    }
    ?>
</div>
