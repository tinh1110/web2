<?php 

session_start();
$id=$_GET['id'];
$type= $_GET['type'];
if($type==='0'){

	if($_SESSION['cart'][$id]['quantity']>1){
		$_SESSION['cart'][$id]['quantity']--;

		
	}else{
		unset($_SESSION['cart'][$id]);
	}
}else{
	$_SESSION['cart'][$id]['quantity']++;
}
