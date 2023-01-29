 <?php 

if(isset($_COOKIE['remember'])){
	$token=$_COOKIE['remember'];
	require 'admin/connect.php';
	$sql="select * from customers
	where token='$token'
	limit 1";
	$result= mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	if($number_rows==1){
		$each=mysqli_fetch_array($result);
		$_SESSION['id']=$each['id'];
		$_SESSION['name']=$each['name'];
	}
}
// if(isset($_SESSION['id'])){
// 	header('location:user.php');
// 	exit;
// }

?> 

<div id="modal-signin" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1>Form đăng nhập</h1>
			</div>
			<div class="modal-body">
				<form method="post" id="form-signin">
					Email
					<input type="email" name="email">
					<br>
					Mật khẩu
					<input type="password" name="password">
					<br>
					Ghi nhớ đăng nhập
					<input type="checkbox" name="remember">
					<br>
					<button>Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	// $(document).ready(function() {
	// // 		$("#form-signin").submit(function(event) {
	// // 	event.preventDefault();
	// // });
	// 	$("#form-signin")
	// 		$.ajax({
	// 			url: 'process_signin.php',
	// 			type: 'post',
	// 			dataType: 'html',
	// 			data: $("#form-signin").serializeArray(),
	// 		})
	// 		.done(function(response) {
	// 		if (response === '1') {
	// 			alert("thanh cong");
	// 			// $("#modal-signin").toggle();
	// 			// $(".modal-backdrop").hide();
	// 			// $(".menu-guest").hide();
	// 			// $(".menu-user").show();
	// 			// $("#span-name").text($("input[name='email']").val());
	// 		}else{
	// 			alert("that bai");
	// 		}	
	// 	}
	// });
	$(document).ready(function() {
		$("#form-signin").submit(function() {
			event.preventDefault();
			$.ajax({
				url: 'process_signin.php',
				type: 'post',
				dataType: 'html',
				data: $("#form-signin").serializeArray(),
			})
			.done(function(response) {
			if (response) {
				console.log(response);
				alert("thanh cong");
				$("#modal-signin").toggle();
				$(".modal-backdrop").hide();
				$(".menu-guest").hide();
				$(".menu-user").show();
				$("#span-name").text(response);
			}else{
				alert("that bai");
				console.log(response);
			}	
			});
		});
	});
</script>
