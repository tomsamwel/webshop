<?php

if (session_status() === PHP_SESSION_NONE){
        @session_start();
    }

// global $RemoteBase;
// $RemoteBase = 'http://localhost/webshop_final/';
// $LocalBase = __DIR__ . '/../';

//have it your way matthijs! >_>;;
require_once '../classes/http.php';
Http::boot();

function asset($path) {
    return Http::webroot() .$path;
}


require_once '../classes/db.php';
require_once '../classes/cart.php';



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
