<?php
//generate DOM element for special products
function displaySpecialProduct($productname, $productprice, $productimg, $productid)
{
    $originalprice = $productprice + 50;

    $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\"></a>
    <p class=\"product-text\">$productname</p>
    <p style=\"text-align:center\">
            <s class=\"originalPrice\">$$originalprice</s>
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    </div>
    </form>";
    echo $element;
}
//generate DOM element for all products
function displayAllProduct($productname, $productprice, $productimg, $productid, $special)
{
    $element = "";
    //if product is on sale
    if ($special == 1) {
        $originalprice = $productprice + 50;
        $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\" alt=\"\"></a>
    <p class=\"product-text\">$productname</p>
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
    <input type='hidden' name='special' value='$special'>
    <input type='hidden' name='quantity' value='1'>
        Add to cart
    </button>
    </div>
    </form>";
    } else {
    //regular products
        $element = "<form method=\"post\" class=\"dealItem\">
    <a href=\"./singleProduct.php?product_id=$productid\"><img src=\"$productimg\"></a>
    <p class=\"product-text\">$productname</p>
    <p style=\"text-align:center\">
            <span class=\"price\">$$productprice</span>
    </p>
    <div>
    <button type=\"submit\" name=\"add_to_cart\" href=\"\" class=\"button1\">
    <input type='hidden' name='product_id' value='$productid'>
    <input type='hidden' name='product_price' value='$productprice'>
    <input type='hidden' name='product_name' value='$productname'>
    <input type='hidden' name='product_img' value='$productimg'>
    <input type='hidden' name='special' value='$special'>
    <input type='hidden' name='quantity' value='1'>
        Add to cart
    </button>
    </div>
    </form>";
    }
    echo $element;
}
//generate DOM element for item detal page
function displayItemDetail($productId, $productName, $productPrice, $productimg, $special, $dateAdded, $detail, $color)
{
    $element = "";
    if ($special == 1) {
        $originalprice = $productPrice + 50;
        $element = "
        <div class=\"itemPic\">
        <div class=\"picContain\">
            <img src=\"$productimg\">
        </div>
    </div>
    <div class=\"itemText\">
        <h1>$productName</h1>
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
                <input type=\"number\" id=\"number\" class=\"num\" value='1' name='quantity' min='0'>
                <button type=\"\"class=\"add\">+</button>
            </div>
        </div>
        <hr>
        <button class=\"button2\"  name=\"add_to_cart\" type=\"submit\">Add to Cart
            <input type='hidden' name='product_id' value='$productId'>
            <input type='hidden' name='product_price' value='$productPrice'>
            <input type='hidden' name='product_name' value='$productName'>
            <input type='hidden' name='product_img' value='$productimg'>
            <input type='hidden' name='special' value='$special'>
        </button>
    </div>";
    } else {
        $element = "<div class=\"itemPic\">
        <div class=\"picContain\">
            <img src=\"$productimg\">
        </div>
    </div>
    <div class=\"itemText\">
        <h1>$productName</h1>
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
                <input type=\"number\" id=\"number\" class=\"num\" value='1' name='quantity' min='0'>
                <button class=\"add\">+</button>
            </div>
        </div>
        <hr>
        <button class=\"button2\"  name=\"add_to_cart\" type=\"submit\">Add to Cart
        <input type='hidden' name='product_id' value='$productId'>
        <input type='hidden' name='product_price' value='$productPrice'>
        <input type='hidden' name='product_name' value='$productName'>
        <input type='hidden' name='product_img' value='$productimg'>
        <input type='hidden' name='special' value='$special'>
        </button>
    </div>";
    }
    echo $element;
}
//generate DOM element for items in cart
function displayCartItem($productId,$productName,$productPrice,$productQuantity,$productimg,$special){
    $element='';
    if($special==0){
    $element="<div class='cartItem'>
    <div class=\"cartItemPic\">
        <div class=\"cartPicWrap\">
            <img src=\"$productimg\">
        </div>
    </div>

    <form class=\"itemText\" method=\"POST\">
        <h2>$productName</h2>
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
<hr>";}
else{
    $originalprice = $productPrice+50;
    $element="<div class='cartItem'>
    <div class=\"cartItemPic\">
        <div class=\"cartPicWrap\">
            <img src=\"$productimg\">
        </div>
    </div>

    <form class=\"itemText\" method=\"POST\">
        <h2>$productName</h2>
        <h3>Price: <s class=\"originalPrice\">$$originalprice</s> $productPrice </h3>
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

}

echo $element;

}


////generate DOM element for item summary in check out page
function displayCheckOutItem($productId,$productName,$productPrice,$productQuantity,$productimg){
    $element='';    
    $element="<div class='checkOutItem'>
    <div class=\"itemText\">
    <p><b>$productName <br> $$productPrice <br> (x$productQuantity)</b></p>
   </div> 
    <div class=\"checkOutItemPic\">
        <div class=\"checkOutPicWrap\">
            <img src=\"$productimg\">
        </div>
    </div>
</div>
<hr>";

echo $element;

}
//encrypt and decrypt method
function encrypt_decrypt($string, $action = 'encrypt')
{
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'SHOPSTER'; // user define private key
    $secret_iv = '5fgf5HJ5g27'; // user define secret key
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}