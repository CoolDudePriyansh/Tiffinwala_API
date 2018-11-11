<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	$user_email = $jsonObj->user_email;
	$user_flag = $jsonObj->user_flag;
	$user_mobile = $jsonObj->user_mobile;
	$user_name = $jsonObj->user_name;
	$user_password = $jsonObj->user_password;
	$user_address = $jsonObj->user_address;
	
	$query="INSERT INTO `user`(`user_email`, `user_flag` , `user_mobile` , `user_name` , `user_password`, `user_address`) VALUES ('$user_email', $user_flag, '$user_mobile', '$user_name', '$user_password', '$user_address')";
	
	$result = mysqli_query($con,$query);

	if($result) {	
		$res['Message']='User Registered Successfully';
		$res['status']='True';
		
		$query="SELECT * from user where `user_email`='$user_email' and `user_password`='$user_password'";
		$result = mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($result))
			$res['data']=$row;
	}
	else{
		$res['Message']='User Not Registered Successfully';
		$res['status']='False';
	}	
	echo json_encode($res);
	mysqli_close($con);
?>
<!--
{
	"user_email":"sp@gmail.com",
	"user_flag":"1",
	"user_mobile":"123",
	"user_name":"sp",
	"user_password":"12",
	"user_address":"Paldi Ahmedabad"
}
-->