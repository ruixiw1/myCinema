<?php
function printSpecialProduct($productname, $productprice, $productimg, $productid)
{
    $specialPrice = $productprice - 200;

    $element = "<div class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <div>
    <button type=\"submit\" href=\"\" class=\"button1\">
        Add to cart
    </button>
    </div>
    </div>";
    echo $element;
}
