<?php

//when form pass data over
if (isset($_POST["add_to_cart"])) {
	// is the cart is initialized, read the data from existing cart
	if (isset($_COOKIE["shopping_cart"])) {
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
	} else {
		//else create 'cart_data' variable to store data
		$cart_data = array();
	}
	//convert data to array 
	$item_id_list = array_column($cart_data, 'product_id');
	//if current product is exited in the cart
	if (in_array($_POST["product_id"], $item_id_list)) {
		//update the quantity respectively to the quantity passed
		foreach ($cart_data as $keys => $values) {
			if ($cart_data[$keys]["product_id"] == $_POST["product_id"]) {
				$cart_data[$keys]["product_quantity"] = $cart_data[$keys]["product_quantity"] + $_POST["quantity"];
			}
		}
	} else {
		//if product not existing in cart, initialize new product and store the info passed
		$item_array = array(
			'product_id'		=>	$_POST["product_id"],
			'product_name'		=>	$_POST["product_name"],
			'product_price'		=>	$_POST["product_price"],
			'product_image'		=>	$_POST["product_img"],
			'product_quantity'  =>  $_POST["quantity"],
			'special'		=>  $_POST['special']
		);
		$cart_data[] = $item_array;
	}

	//json endcode
	$item_data = json_encode($cart_data);
	//update cookie_data
	setcookie('shopping_cart', $item_data, time() + (86400 * 30),'/');
	//refresh page
	header("Refresh:0");
}
//when remove data is set
if (isset($_POST["remove_product"])) {
	//read current cookie data
	$cookie_data = stripslashes($_COOKIE['shopping_cart']);
	//decode json
	$cart_data = json_decode($cookie_data, true);
	//update cookie_data
	foreach ($cart_data as $keys => $values) {
		if ($cart_data[$keys]['product_id'] == $_POST["product_id"]) {
			unset($cart_data[$keys]);
			$item_data = json_encode($cart_data);
			//delete previous cookie
			setcookie('shopping_cart', '', time() - 3600,'/');
			//set new cookie 
			setcookie("shopping_cart", $item_data, time() + (86400 * 30),'/');
			header("Refresh:0");
		}
	}
}

//when update is set
if (isset($_POST["update_product"])) {
	//variable for new quantity
	$newQuantity = $_POST['quantity'];
	//decode json
	$cookie_data = stripslashes($_COOKIE['shopping_cart']);
	$cart_data = json_decode($cookie_data, true);
	//update quantity
	foreach ($cart_data as $keys => $values) {
		if ($cart_data[$keys]['product_id'] == $_POST["product_id"]) {
			$cart_data[$keys]['product_quantity'] = $newQuantity;
			$item_data = json_encode($cart_data);
			//remove and set new cookie
			setcookie('shopping_cart', '', time() - 3600,'/');
			setcookie("shopping_cart", $item_data, time() + (86400 * 30),'/');
			header("Refresh:0");
		}
	}
}
