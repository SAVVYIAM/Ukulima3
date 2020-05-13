<html>
<head>


</head>
<div class="photo">
  <input type="file" name="image" accept="image/*">
  <div class="photo_helper">
    <div class="photo__frame photo__frame--circle ">
    </div></div>


    <?php
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
    echo $code;



    $you="MIne";
    echo $you."you are ";
date_default_timezone_set("Africa/Nairobi");
    echo date('Y-m-d');?>
</html>


  <input class="form-control mr-sm-2" type="text" placeholder="Search product" aria-label="Search" id="inputcategory" name="searchstring" value="Vegetable">

</script>


//search script
<script type="text/javascript">
function myFunction(searchstring) {
  var search=searchstring;
  document.write("");
window.location.href="cart/product.php?selects="+ search;
}
</script>


        <a href="cart/product.php?selects=Vegetable" target="displaymain">Vegetables</a>
        <a href="cart/product.php?selects=Tuber" target="displaymain">Tubers</a>
        <a href="cart/product.php?selects=Fruit" target="displaymain">Fruits</a>
        <a href="cart/product.php?selects=Cereal" target="displaymain">Cereals</a>
        <a href="cart/product.php?selects=Poultry" target="displaymain">Poultry</a>
        <a href="cart/product.php?selects=Animal" target="displaymain">Animal</a>
