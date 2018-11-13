<?php
	require_once '../connection.php';
	$obj=new Database();
	$con=$obj->getConnection();

	$tiffin_id=isset($_GET['id']) ? $_GET['id'] : die();
	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
	$hour=$date->format('H');
	
	if($hour>=8 && $hour <=16){
		$query="SELECT t.*,tm.* FROM tiffinwala as t, tiffin_menu as tm where t.tiffin_id=tm.tiffinvo_tiffin_id and t.tiffin_id='$tiffin_id' and tm.typevo_type_id=1 and t.tiffin_flag=1";
	}
	else{
		$query="SELECT t.*,tm.* FROM tiffinwala as t, tiffin_menu as tm where t.tiffin_id=tm.tiffinvo_tiffin_id and t.tiffin_id='$tiffin_id' and tm.typevo_type_id=2 and t.tiffin_flag=1";
	}
	
	$jsonObj=array();
	$res=mysqli_query($con,$query);
	if (mysqli_num_rows($res)>0) 
	{
		while($row = mysqli_fetch_assoc($res))
			$jsonObj[]=$row;
	}
	else{
		$res['Message']='Something Went Wrong';
	}
	
	echo json_encode($jsonObj);
	mysqli_close($con);
?>