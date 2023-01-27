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
			height: 20%;
			background: pink;
		}
		#giua{
			width: 100%;
			height: 75%;
			background: red;
		}
		#duoi{
			width: 100%;
			height: 5%;
			background: purple;
		}
	</style>
</head>
<body>
<div id="tong">
	<?php include 'menu.php' ?>
	<?php include 'id.php' ?>
	<?php include 'footer.php'; ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

</body>
</html>