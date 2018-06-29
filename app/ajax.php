<?php

if (session_status() === PHP_SESSION_NONE){
        @session_start();
    }

require_once '../classes/cart.php';

//check for json
if(isset($_REQUEST['json']))  $json =json_decode($_REQUEST['json'], true);
else $json = [];

//check for either add or delete
if(!empty($json['command']))
switch($json['command']){
    case 'add' : AddProduct($json); break;
    case 'del' : DeleteProduct($json); break;
    default: break;
}




// Functions to add or delete
function AddProduct($json){
    Cart::addToCart( $json['id']);

    ob_start();                        // capture html from bucket partial
    require '../views/partials/bucket.php';
    $ret_json['bucket'] = ob_get_clean();   // put bucket partial into return json
    echo json_encode($ret_json);          // send json back to javascript
}

function DeleteProduct($json){
    Cart::removeFromCart( $json['id'] );

    ob_start();                        // capture html from bucket partial
    require '../views/partials/bucket.php';
    $ret_json['bucket'] = ob_get_clean();   // put bucket partial into return json
    echo json_encode($ret_json);          // send json back to javascript
}
