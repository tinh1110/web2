
</style>
<div id="tren">
	<ol>
		<li{ list-style-type: none; }>
			<a href="index.php">
				Trang chủ
			</a>
		</li>
		<li class="menu-guest" style="<?php if(!empty($_SESSION['id'])) {?> display: none; <?php } ?>">
			<!-- <a href="signin.php">
				Đăng Nhập
			</a> -->
			<button type="button"  data-toggle="modal" data-target="#modal-signin">
				Đăng nhập
			</button>
		</li>
		<li class="menu-guest" style="<?php if(!empty($_SESSION['id'])) {?> display: none; <?php } ?>">

			<button type="button"  data-toggle="modal" data-target="#modal-signup">
				Đăng ký
			</button>
		</li>
		<li class="menu-user" style="<?php if(empty($_SESSION['id'])) {?> display: none; <?php } ?>">
			<a href="view_cart.php">
				Xem giỏ hàng
			</a>
		</li>
		<li class="menu-user" style="<?php if(empty($_SESSION['id'])) {?> display: none; <?php } ?>">
			Chào 
			<span id="span-name">
				<?php echo $_SESSION['name']; ?>,
			</span> 
			<br>
			<a href="signout.php">Đăng Xuất</a>
		</li>
	</ol>
</div>


<?php
if(empty($_SESSION['id'])) { 
	include 'signup.php'; 
	include 'signin.php';
}
?>