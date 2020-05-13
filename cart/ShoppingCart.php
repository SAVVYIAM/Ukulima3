<?php
require_once "DBController.php";

class ShoppingCart extends DBController
{

    function getAllProduct($query)
    {
        //$query = "SELECT * FROM products";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getUserCartItem($user_id)
    {
        $query = "SELECT products.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM products, tbl_cart WHERE
            products.id = tbl_cart.product_id AND tbl_cart.user_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $user_id
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM products WHERE code=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $user_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND user_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $user_id
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($product_id, $quantity, $user_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,user_id) VALUES (?, ?, ?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "s",
                "param_value" => $user_id
            )
        );

        $this->updateDB($query, $params);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET  quantity = ? WHERE id= ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }

    function emptyCart($user_id)
    {
        $query = "DELETE FROM tbl_cart WHERE user_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $user_id
            )
        );

        $this->updateDB($query, $params);
    }
}
