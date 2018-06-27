
<div class="row" style="width:71%;">
<?php foreach( $products as $p) { ?>
<div class="col-lg-10">
  <div class="card">
    <img class="card-img-top" src="<?= $RemoteBase .'public/images/'. $p->image ?>" alt="<?= $RemoteBase .'public/images/'. $p->slug ?>">
    <div class="card-body">
      <a href="<?php echo ($p->slug); ?>"><?php echo $p->title; ?></a>

      <p class="card-text"><?php echo $p->description; ?></p>
      <p class="card-text">€<?php echo $p->price; ?></p>

      <button class="addProduct btn btn-success" data-product="<?php echo $p->id; ?>" type="button">+</button>
      <button class="delProduct btn btn-danger" data-product="<?php echo $p->id; ?>" type="button">-</button>
    </div>
  </div>
</div>
<?php } ?>
</div>
