
<div id="modal-signup" class="modal fade">
	<div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h1>Form đăng ký</h1>
				<div class="alert alert-danger" id="div-error" style="display: none;">

				</div>
			</div>
			<div class="modal-body">
			<form method="post" id="form-signup">
				Tên
				<input type="text" name="name">		
				<br>
				Email
				<input type="email" name="email">
				<br>
				Mật khẩu
				<input type="password" name="password">
				<br>
				Số điện thoại
				<input type="text" name="phone_number">
				<br>
				Địa chỉ
				<input type="text" name="address">
				<br>
				<button>Đăng ký</button>
			</form>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	// $("#form-signup"). submit(function(event) {
	// 	event.preventDefault();
	// });
	$("#form-signup").validate({
				rules: {
					"name": {
						required: true,
						maxlength: 15
					},
					"email": {
						required: true,
						email: true

					},
					"password": {
						required: true,
						minlength: 8
					}
				},messages: {
			"name": {
				required: "Bắt buộc nhập tên",
				maxlength: "Hãy nhập tối đa 15 ký tự"
			},
			"email": {
				required: "bắt buộc phải nhập email",
				email: " nhập email sai rồi"
			},
			"password": {
				equalTo: "băt buộc phải nhập password",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			}
		},
			submitHandler: function() {
			$.ajax({
			url: 'process_signup.php',
			type: 'post',
			dataType: 'html',
			data: $("#form-signup").serializeArray(),
		})
		.done(function(response) {
			if (response !== '1') {
				$("#div-error").text(response);
				$("#div-error").show();
			}
			else{
				$("#modal-signup").toggle();
				$(".modal-backdrop").hide();
				$(".menu-guest").hide();
				$(".menu-user").show();
				$("#span-name").text($("input[name='name']").val());

			}
		});
				}
			});
});
</script>