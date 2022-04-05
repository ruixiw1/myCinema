<?php
function printSpecialProduct($productname, $productprice, $productimg, $productid)
{
    $originalprice= $productprice + 100;

    $element = "<div class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <s class=\"originalPrice\">$$originalprice</s>
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
        Add to cart
    </button>
    </div>
    </div>";
    echo $element;
}
function displayAllProduct($productname, $productprice, $productimg, $productid,$special){
    $element="";
    
    if($special==1){
        $originalprice= $productprice + 100;
        $element = "<div class=\"dealItem\">
    <a href=\"\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <s class=\"originalPrice\">$$originalprice</s>
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
        Add to cart
    </button>
    </div>
    </div>";
    }
    else{
        $element = "<div class=\"dealItem\">
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
    </div>";
    }
    echo $element;
}
