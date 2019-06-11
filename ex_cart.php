<?php
$item_id = $_POST['item'];
$item = Product::find_by_id($item_id);
$cart = new ShoppingCart();
$cart -> add($item);
$_SESSION['cart'] = serialize($cart);
