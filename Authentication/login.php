<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	//$jsonObj = json_decode(file_get_contents("php://input"));
	
	// $user_email = $jsonObj->user_email;
	// $user_password = $jsonObj->user_password;
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$query="SELECT * from user where `user_email`='$user_email' and `user_password`='$user_password'";
	$result = mysqli_query($con,$query);
	
	if (mysqli_num_rows($result)>0) {
		$res['Message']='User Logged in Successfully';
		$res['status']='True';
		while($row = mysqli_fetch_assoc($result))
			$res['data']=$row;
	}
	else{	
		$res['Message']='User Not Logged in Successfully';
		$res['status']='False';
	}
	echo json_encode($res);
	mysqli_close($con);
?>