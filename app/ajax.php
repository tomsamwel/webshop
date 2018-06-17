<?php

session_start();

require_once __DIR__.'/../classes/cart.php';



if(isset($_REQUEST['json']))  $json =json_decode($_REQUEST['json'], true);
else $json = [];

if(!empty($json['command']))
switch($json['command']){
    case 'add' : AddProduct($json); break;
    case 'del' : DeleteProduct($json); break;
    default: break;
}



// Runtime Code Above
// Function Below

function AddProduct($json){
  Cart::addToCart( $json['id'], 1 );

  ob_start();                        // capture html from bucket partial
  require __DIR__.'/../views/partials/bucket.php';
  $ret_json['bucket'] = ob_get_clean();   // put bucket partial into return json
  echo json_encode($ret_json);          // send json back to javascript
}

function DeleteProduct($json){
  Cart::removeFromCart( $json['id'] );

  ob_start();                        // capture html from bucket partial
  require __DIR__.'/../views/partials/bucket.php';
  $ret_json['bucket'] = ob_get_clean();   // put bucket partial into return json
  echo json_encode($ret_json);          // send json back to javascript
}

?>