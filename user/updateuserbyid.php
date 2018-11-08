<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$jsonObj = json_decode(file_get_contents("php://input"));
		
	$user_mobile = $jsonObj->user_mobile;
	$user_name = $jsonObj->user_name;
	
	$query="update `user` set `user_mobile`='$user_mobile', `user_name`='$user_name' where `user_id`=$user_id";
	
	$result = mysqli_query($con,$query);

	if (mysqli_num_rows($result)>0)
		$res['Message']='Data Updated Successfully';
	else
		$res['Message']='Data Not Updated';
	
	echo json_encode($res);
	mysqli_close($con);
?>