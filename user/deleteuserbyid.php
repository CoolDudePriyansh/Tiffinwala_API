<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();
	
	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$query="delete from `user` where `user_id`=$user_id";
	$result = mysqli_query($con,$query);

	if($result)
		$res['Message']='Data Deleted Successfully';
	
	else
		$res['Message']='Data Not Deleted';
	
	echo json_encode($res);
	mysqli_close($con);
?>