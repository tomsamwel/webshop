<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="webshop" content="">
  	<meta name="Tom's webshop" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<title>Webshop - product</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="<?= $RemoteBase. 'public/css/style.css' ;?>">
</head>
<body>

  <?php include $LocalBase.'views/partials/navbar.php'; ?>

  <aside class="bucket" id="bucket">
    <?php include $LocalBase.'views/partials/bucket.php'; ?>
  </aside>

  <?php
    $db->query('SELECT * FROM `products` ');
    $products = $db->select('products');

    include $LocalBase.'views/partials/products.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="public/js/cart.js"></script>
  <script>
  $(document).ready(function(){
    $(".addProduct").click( AddProduct );
    $(".delProduct").click( DeleteProduct );
  });
  </script>
</body>
</html>
