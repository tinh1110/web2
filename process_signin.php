<?php 

$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['remember'])){
	$remember=true;
}else{
	$remember=false;
}

require 'admin/connect.php';
$sql= "select * from customers 
where email='$email' and password='$password' ";
$result= mysqli_query($connect,$sql);
$number_rows= mysqli_num_rows($result);

if($number_rows==1){
	session_start();
	$each=mysqli_fetch_array($result);
	$id=$each['id'];
	$_SESSION['id']=$id;
	$_SESSION['name']=$each['name'];
	if($remember){
		$token = uniqid('user_',true);
		$sql= "update customers 
		set 
		token='$token'
		where
		id='$id'";
		mysqli_query($connect,$sql);
		setcookie('remember',$token,time()+86400);
		
mysqli_close($connect);
	}
	echo 1;
}
else{
	echo 0;
}


