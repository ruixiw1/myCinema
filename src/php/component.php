<?php
function displaySpecialProduct($productname, $productprice, $productimg, $productid)
{
    $originalprice = $productprice + 100;

    $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\" alt=\"\"></a>
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
    <input type='hidden' name='quantity' value='1'>
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
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\" alt=\"\"></a>
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
    <input type='hidden' name='quantity' value='1'>
        Add to cart
    </button>
    </div>
    </form>";
    } else {
        $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">\"$productname\"</p>
    <p style=\"text-align:center\">
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" name=\"add_to_cart\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
    <input type='hidden' name='product_price' value='$productprice'>
    <input type='hidden' name='product_name' value='$productname'>
    <input type='hidden' name='product_img' value='$productimg'>
    <input type='hidden' name='quantity' value='1'>
        Add to cart
    </button>
    </div>
    </form>";
    }
    echo $element;
}

function displayItemDetail($productId, $productName, $productPrice, $productimg, $special, $dateAdded, $detail, $color)
{
    $element = "";
    if ($special == 1) {
        $originalprice = $productPrice + 100;
        $element = "
        <div class=\"itemPic\">
        <div class=\"picContain\">
            <img src=\"$productimg\">
        </div>
    </div>
    <div class=\"itemText\">
        <h1>\"$productName\"</h1>
        <h3>$color</h3>
        <hr>
        <h1>Product Detail</h1>
        <p>$detail</p>
        <h3>Date Added:$dateAdded</h3>
        <h1>Price:
                <s class=\"originalPrice\">$$originalprice</s>
                <span class=\"price\">$$productPrice</span> 
                </h1>
        <div class=\"quantity\">
            <h1>Quantitiy: </h1>
            <div class=\"counter\">
                <button class=\"minus\">-</button>
                <input type=\"number\" id=\"number\" class=\"num\" value='0' name='quantity' min='0'>
                <button type=\"\"class=\"add\">+</button>
            </div>
        </div>
        <hr>
        <button class=\"button2\"  name=\"add_to_cart\" type=\"submit\">Add to Cart
            <input type='hidden' name='product_id' value='$productId'>
            <input type='hidden' name='product_price' value='$productPrice'>
            <input type='hidden' name='product_name' value='$productName'>
            <input type='hidden' name='product_img' value='$productimg'>
        </button>
    </div>";
    } else {
        $element = "<div class=\"itemPic\">
        <div class=\"picContain\">
            <img src=\"$productimg\">
        </div>
    </div>
    <div class=\"itemText\">
        <h1>\"$productName\"</h1>
        <h3>$color</h3>
        <hr>
        <h1>Product Detail</h1>
        <p>$detail</p>
        <h3>Date Added:$dateAdded</h3>
        <h1>Price:
                <span class=\"price\">$$productPrice</span> 
                </h1>
        <div class=\"quantity\">
            <h1>Quantitiy: </h1>
            <div class=\"counter\">
                <button class=\"minus\">-</button>
                <input type=\"number\" id=\"number\" class=\"num\" value='0' min='0'>
                <button class=\"add\">+</button>
            </div>
        </div>
        <hr>
        <button class=\"button2\"  name=\"add_to_cart\" type=\"submit\">Add to Cart
        <input type='hidden' name='product_id' value='$productId'>
        <input type='hidden' name='product_price' value='$productPrice'>
        <input type='hidden' name='product_name' value='$productName'>
        <input type='hidden' name='product_img' value='$productimg'>
        </button>
    </div>";
    }
    echo $element;
}

function displayCartItem($productId,$productName,$productPrice,$productQuantity,$productimg){
    $element='';
    $element="<div class='cartItem'>
    <div class=\"cartItemPic\">
        <div class=\"cartPicWrap\">
            <img src=\"$productimg\">
        </div>
    </div>

    <form class=\"itemText\" method=\"POST\">
        <h2>\"$productName\"</h2>
        <h3>Price: $productPrice </h3>
        <div class=\"quantity\">
            <p>Quantitiy: </p>
            <div class=\"counter\">
                <button type='button' class=\"minus\" onclick=\"minusCheck('$productId')\">-</button>
                <input type=\"number\" id=\"$productId\" name='quantity' class=\"num\" value=\"$productQuantity\" min='0'>
                <button type='button' class=\"add\"  onclick=\"getElementById('$productId').value++\">+</button>
            </div>
        </div>
        <div class=\"cartButtonDiv\">
            <input type='hidden' name='product_id' value='$productId'>
            <button class=\"cartModButton\" name=\"update_product\" type='submit'>Update</button>
            <button class=\"cartModButton\" name=\"remove_product\" type='submit'>Remove</button>
        </div>
    </form>

</div>
<hr>";
echo $element;

}
