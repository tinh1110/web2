<style type="text/css">
	.search{
		width: 100%;
		height: 40px;
		float: left;
		text-align:center;

	}
	.tung_san_pham{
		width: 33%;
		border: 2px solid black;
		height: 250px;
		float: left;
	}
	.sp{
		width: 100%;
		height: 504px;
		float: left;
	}
	.sotrang{
		width: 100%;
		height: 50px;
		float: left;
		text-align:center;

	}
</style>
<?php require 'admin/connect.php';
if(isset($_GET['trang'])){
	$trang=$_GET['trang'];
}else{
	$trang=1;
}


$sql_so_sp = "select count(*) from products";
$mang_so_sp = mysqli_query($connect,$sql_so_sp);
$ket_qua_so_sp = mysqli_fetch_array($mang_so_sp);
$so_sp = $ket_qua_so_sp['count(*)'];

$so_sp_1_trang = 6;
$so_trang = ceil($so_sp/$so_sp_1_trang);
$bo_qua =($trang-1)*$so_sp_1_trang;
$tim_kiem='';
if(isset($_GET['tim_kiem'])){
	$tim_kiem=$_GET['tim_kiem'];
	
}

$sql="select * from products
where name like '%$tim_kiem%' 
limit $so_sp_1_trang offset $bo_qua";
$result = mysqli_query($connect,$sql);
?>
<div id="giua">
	<div class="search">
		<form>
			<input type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>">
			</form>
	</div>
	<br>
	<div class="sp">
	<?php foreach ($result as $each): ?>
		<div class="tung_san_pham">
			<h1><?php echo $each['name'] ?></h1>
			<img src="admin/products/photos/<?php echo $each['photo'] ?>" height='80'>
			<p><?php echo $each['price'] ?>$</p>
			<a href="product.php?id=<?php echo $each['id'] ?>">
				Xem chi tiết
			</a>
		<?php if(!empty($_SESSION['id'])){ ?>
			<br>
			<button
			 data-id='<?php echo $each['id'] ?>'
			 class='btn-add-to-cart'
			 >
			Thêm vào giỏ hàng
			</button>
		<?php } ?>
		</div>
	<?php endforeach ?>
	</div>
	<br>
	<div class="sotrang">
		<br>
		<?php for ($i=1; $i<=$so_trang  ; $i++) { ?>
	 	<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
	<?php echo $i  ?>
</a>
	<?php } ?></div>
</div>
 

