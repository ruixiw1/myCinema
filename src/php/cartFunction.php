<?php 


if(isset($_POST["add_to_cart"]))
{
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'product_id');

	if(in_array($_POST["product_id"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["product_id"] == $_POST["product_id"])
			{
				$cart_data[$keys]["product_quantity"] = $cart_data[$keys]["product_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'product_id'		=>	$_POST["product_id"],
			'product_name'		=>	$_POST["product_name"],
			'product_price'		=>	$_POST["product_price"],
			'product_image'		=>	$_POST["product_img"],
            'product_quantity'  =>  $_POST["quantity"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
	header("Refresh:0");
}

if(isset($_POST["remove_product"]))
{

		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['product_id'] == $_POST["product_id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("Refresh:0");
			}
		}
}

if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_POST["update_product"]))
{	
		$newQuantity=$_POST['quantity'];
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['product_id'] == $_POST["product_id"])
			{
				$cart_data[$keys]['product_quantity']=$newQuantity;
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				header("Refresh:0");
			}
		}
}
?>