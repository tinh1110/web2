<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<title></title>
	<style type="text/css">
		#tong{
			width: 100%;
			height: 800px;
			background: black;
		}
		#tren{
			width: 100%;
			height: 15%;
			background: pink;
		}
		#giua{
			width: 100%;
			height: 80%;
			background: red;
		}
		#duoi{
			width: 100%;
			height: 5%;
			background: white;
		}
	</style>
</head>
<body>
	<div id="tong">
		<?php include 'menu.php' ?>

		<?php include 'products.php' ?>

		<?php include 'footer.php'; ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".btn-add-to-cart").click(function(event) {
				let id = $(this).data('id');
				$.ajax({
					url: 'add_to_cart.php',
					type: 'GET',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: {id},
				})
				.done(function(data) {
					if(data==1){
						alert('thanh cong');
					}else{
						alert('that bai');
					}
				});
			});
		});
	</script>
</body>
</html>