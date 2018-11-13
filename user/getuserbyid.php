<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$user_id=isset($_GET['id']) ? $_GET['id'] : die();
	$query="SELECT * from user where user_id='$user_id' and user_flag=3";

	$jsonObj=array();
	$res=mysqli_query($con,$query);
	
	if (mysqli_num_rows($res)>0) 
	{
		while($row = mysqli_fetch_assoc($res))
			$jsonObj[]=$row;
	}
	else
		$jsonObj['message']='Records not found for User';
	
	echo json_encode($jsonObj);
	mysqli_close($con);
?>