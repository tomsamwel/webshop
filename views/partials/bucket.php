<h2>Cart</h2>
<div class="bucket-content">
	<table class="table">
		<thead>
			<tr>
				<th>Products</th>
				<th>Quantity</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($_SESSION['cart']['products'] as $item) { ?>
				<tr>
					<td><?php echo $item['title']; ?></td>
					<td class="oneline">
						<?php echo $item['quantity']; ?>
						<button type="button" class="btn btn-success btn-xs addProduct" data-product="<?= $item['id'];?>">+</button>
						<button type="button" class="btn btn-danger btn-xs delProduct" data-product="<?= $item['id'];?>">-</button>
					</td>
					<td>&euro; <?php echo $item['price']; ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td>Subtotal</td>
				<td></td>
				<td class="oneline">&euro; <?php echo $_SESSION['cart']['total']; ?></td>
			</tr>
		</tfoot>
	</table>

	<a href="<?= $RemoteBase .'public/register.php'; ?>" class="btn btn-success">Order now</a>
</div>
