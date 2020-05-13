<?php
include('../server.php');
require_once "ShoppingCart.php";
if(isset($_GET['selects'])){
$filter=$_GET['selects'];
echo $filter;

}
if(ISSET($SESSION['usertype'])){
$loggedusertype=$SESSION['usertype'];}

if(!ISSET($SESSION['usertype'])){
$loggedusertype="";}
//search
if(isset($_POST['searchstring'])){
$filter=$_POST['searchstring'];
}

else {
  $filter="showall";
}
if(empty($_SESSION['username'])){
$_SESSION['username']='new';

}
if(empty($_SESSION['usertype'])){
$_SESSION['usertype']='NULL';

}
$user_id = $_SESSION['username']; // you can your integerate authentication module here to get logged in member
$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);

                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $user_id);

                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $user_id);
                }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($user_id);
            break;
    }
}
?>
<HTML>
<HEAD>
<TITLE>PRODUCTS</TITLE>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" type="text/css" rel="stylesheet" />
<script src="jquery-3.2.1.min.js"></script>

<script>
ordersuccess(){
alert("order successfully placed");

}
</script>

<script>
function increment_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val())+1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
}

function decrement_quantity(cart_id, price) {
    var inputQuantityElement = $("#input-quantity-"+cart_id);
    if($(inputQuantityElement).val() > 1)
    {
    var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
    var newPrice = newQuantity * price;
    save_to_db(cart_id, newQuantity, newPrice);
    }
}

function save_to_db(cart_id, new_quantity, newPrice) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
	var priceElement = $("#cart-price-"+cart_id);
    $.ajax({
		url : "update_cart_quantity.php",
		data : "cart_id="+cart_id+"&new_quantity="+new_quantity,
		type : 'post',
		success : function(response) {
			$(inputQuantityElement).val(new_quantity);
            $(priceElement).text("Ksh "+newPrice);
            var totalQuantity = 0;
            $("input[id*='input-quantity-']").each(function() {
                var cart_quantity = $(this).val();
                totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
            });
            $("#total-quantity").text(totalQuantity);
            var totalItemPrice = 0;
            $("div[id*='cart-price-']").each(function() {
                var cart_price = $(this).text().replace("Ksh ","");
                totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
            });
            $("#total-price").text(totalItemPrice);
		}
	});
}
</script>


<style>
#orderfooter{

  display:none;
}
#availabilityfooter{
	display:none;
}
</style>
</HEAD>
<BODY>



<?php
$cartItem = $shoppingCart->getUserCartItem($user_id);
if (! empty($cartItem)) {
    $item_quantity = 0;
    $item_price = 0;
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
else {

  $item_quantity=0;
  $item_price=0;
}
?>
    <div id="shopping-cart">
        <div class="txt-heading" >
            <div class="txt-heading-label" >Shopping Cart</div>

            <a id="btnEmpty" href="product.php?action=empty"><img
                src="empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status">
                <div>Total Quantity: <span id="total-quantity"><?php echo $item_quantity; ?></span></div>
                <div>Total Price: <span id="total-price"><?php echo $item_price; ?></span></div>
            </div>
        </div>
<?php
if (! empty($cartItem)) {
    ?>
<div class="shopping-cart-table"  id="<?php if(ISSET($_SESSION['usertype']) AND $_SESSION['usertype']=='Farmer') echo "orderfooter"; else echo ""; ?>">
            <div class="cart-item-container header">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>
            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
				<div class="cart-item-container">
                <div class="cart-info title">
                    <?php echo $item["name"]; ?>
                </div>

                <div class="cart-info quantity">
                    <div class="btn-increment-decrement" onClick="decrement_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["price"]; ?>')">-</div><input class="input-quantity"
                        id="input-quantity-<?php echo $item["cart_id"]; ?>" value="<?php echo $item["quantity"]; ?>"><div class="btn-increment-decrement"
                        onClick="increment_quantity(<?php echo $item["cart_id"]; ?>, '<?php echo $item["price"]; ?>')">+</div>
                </div>

                <div class="cart-info price" id="cart-price-<?php echo $item["cart_id"]; ?>">
                        <?php echo "Ksh ". ($item["price"] * $item["quantity"]); ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="product.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>

				<?php
    }
    ?>
</div>
<div align="center" style="padding-top:5px;" >
<button onclick="ordersuccess()" style="background-color:blue;"><a href="order.php?userid=<?php echo $user_id;?>" role="button" style="display:cover;text-decoration:none;">Submit order</a></button>
</div>
  <?php



}
?>
</div>

<?php require_once "product-list.php";
?>

</BODY>
</HTML>
