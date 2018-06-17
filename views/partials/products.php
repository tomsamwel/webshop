<?php

$db->query('SELECT * FROM `products`');
$products = $db->select('products');

?>
<div class="row" style="width:71%;">
<?php foreach( $products as $p) { ?>
<div class="col-sm-4">
  <div class="card">
    <img class="card-img-top" src="<?= $RemoteBase .'public/images/'. $p->image ?>" alt="<?= $RemoteBase .'public/images/'. $p->slug ?>">
    <div class="card-body">
      <a href="products/<?php echo lcfirst( $p->title); ?>.php"><?php echo $p->title; ?></a>

      <p class="card-text"><?php echo $p->description; ?></p>
      <p class="card-text">€<?php echo $p->price; ?></p>

      <button class="addProduct btn btn-info" data-product="<?php echo $p->id; ?>" type="button">+</button>
      <button class="delProduct btn btn-danger" data-product="<?php echo $p->id; ?>" type="button">-</button>
    </div>
  </div>
</div>
<?php } ?>
</div>
