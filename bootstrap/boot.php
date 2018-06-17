<?php

session_start();

global $Remotebase;
$RemoteBase = 'http://localhost/webshop_final/';

$root = __DIR__ . '/../';
require_once $root.'classes/db.php';
require_once $root.'classes/cart.php';
require $root.'views/home.php';



// make all urls complete
function asset($path) {
  return 'http://localhost/webshop/public/' . $path;
}

//reset cart if empty
if(! isset($_SESSION['cart'])) {
	Cart::reset();
}

// load basic functions
function dd($text)
{
	if(is_array($text) || is_object($text)) {
		var_dump($text);
		die();
	}
	else {
		die($text);
	}
}
