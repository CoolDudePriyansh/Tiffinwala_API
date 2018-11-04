<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$query="SELECT * from user";

	$jsonObj=array();
	$res=mysqli_query($con,$query);
	if (mysqli_num_rows($res)>0) 
	{
		while($row = mysqli_fetch_assoc($res)) {
			$jsonObj[]=$row;
		}
	}
	else
		$jsonObj['message']='Records not found';

	echo json_encode($jsonObj);
	mysqli_close($con);
?>