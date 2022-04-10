<?php
function printSpecialProduct($productname, $productprice, $productimg, $productid)
{
    $originalprice = $productprice + 100;

    $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <s class=\"originalPrice\">$$originalprice</s>
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" name=\"add_to_cart\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
    <input type='hidden' name='product_price' value='$productprice'>
    <input type='hidden' name='product_name' value='$productname'>
    <input type='hidden' name='product_img' value='$productimg'>
        Add to cart
    </button>
    </div>
    </form>";
    echo $element;
}
function displayAllProduct($productname, $productprice, $productimg, $productid, $special)
{
    $element = "";

    if ($special == 1) {
        $originalprice = $productprice + 100;
        $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <s class=\"originalPrice\">$$originalprice</s>
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" name=\"add_to_cart\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
    <input type='hidden' name='product_price' value='$productprice'>
    <input type='hidden' name='product_name' value='$productname'>
    <input type='hidden' name='product_img' value='$productimg'>
        Add to cart
    </button>
    </div>
    </form>";
    } else {
        $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
        Add to cart
    </button>
    </div>
    </form>";
    }
    echo $element;
}
