<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	$user_email = $jsonObj->user_email;
	$user_password = $jsonObj->user_password;	
	
	$query="SELECT * from user where `user_email`='$user_email' and `user_password`='$user_password'";
	
	$result = mysqli_query($con,$query);
	
	if($result) {
		$res['Message']='User Logged in Successfully';
	}
	else{	
		$res['Message']='User Not Logged in Successfully';
	}
	
	echo json_encode($res);
	mysqli_close($con);
?>