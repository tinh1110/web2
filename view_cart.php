<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 
	session_start();
	$cart=$_SESSION['cart'];
	$total = 0;
	?>
	<table border="1" width="100%">
		<tr>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số Lượng</th>
			<th>Tổng tiền</th>
			<th>Xóa</th>
		</tr>
		<?php foreach ($cart as $id => $each): ?>

			<tr>
				<td><img height="100" src="admin/products/photos/<?php echo $each['photo'] ?> "></td>
				<td><?php echo $each['name'] ?></td>
				<td><span class="span-price">
					<?php echo $each['price'] ?>
				</span></td>
				<td>
					<button class="btn-update-quantity" data-id='<?php echo $id ?>' data-type='0'>
						-
					</button>

					<span class="span-quantity">
						<?php echo $each['quantity'] ?>
					</span>
					<button class="btn-update-quantity" data-id='<?php echo $id ?>' data-type='1'>
						+
					</button>
				</td>
				<td>
					<span class="span-sum">
						<?php 
						$sum = $each['quantity']*$each['price'];
						$total +=$sum;
						echo $sum;

						?>
					</span>
				</td>
				<td>
					<button class="btn-delete" data-id='<?php echo $id; ?>'>
						X
					</button>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<h1>
		Tổng tiền hóa đơn:
		$
		<span id="span-total">
			<?php echo $total ?>
		</span>

	</h1>
	<?php 
	$id=$_SESSION['id'];
	require 'admin/connect.php';
	$sql= "select * from customers where id = '$id'";
	$result= mysqli_query($connect,$sql);
	$each=mysqli_fetch_array($result);
	?>
	<form method="post" action="process_checkout.php">
		Tên người nhận:
		<input type="text" name="name_receiver"value = '<?php echo $each['name'] ?>'>
		<br>
		SĐT Người nhận:
		<input type="text" name="phone_receiver"value = '<?php echo $each['phone_number'] ?>'>
		<br>
		Địa chỉ:
		<input type="text" name="address_receiver"value = '<?php echo $each['address'] ?>'>
		<br>
		<button>Đặt hàng</button>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".btn-update-quantity").click(function() {
				let btn = $(this);
				let id = btn.data('id');
				let type = parseInt(btn.data('type'));
				$.ajax({
					url: 'update_quantity_in_cart.php',
					type: 'GET',
					data: {id,type},
				})
				.done(function() {

					let parent_tr = btn.parents('tr');
					let price = parent_tr.find('.span-price').text();
					let quantity = parent_tr.find('.span-quantity').text();
					if (type==1) {
						quantity++;
					}else{
						quantity--;
					}
					if (quantity===0) {
						parent_tr.remove();
					}else{
						parent_tr.find('.span-quantity').text(quantity);
						let sum = price*quantity;
						parent_tr.find('.span-sum').text(sum);
					}
					getTotal();
				});

			});

			$(".btn-delete").click(function(){
				let btn = $(this);
				let id = btn.data('id');
				$.ajax({
					url: 'delete_from_cart.php',
					type: 'GET',
					data: {id},
				})
				.done(function() {
					btn.parents('tr').remove();
					getTotal();
				});
			});
		});
		function getTotal(){
			let total = 0;
			$(".span-sum").each(function(index, el) {
				total+=parseFloat($(this).text());
			});
			$("#span-total").text(total);

		}
	</script>
</body>
</html>