<?php

session_start();

global $RemoteBase;
$RemoteBase = 'http://localhost/webshop_final/';

$LocalBase = __DIR__ . '/../';
require_once $LocalBase.'classes/db.php';
require_once $LocalBase.'classes/cart.php';


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
