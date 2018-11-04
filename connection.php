<?php
class Database
{
	// get the database connection
    function getConnection(){
		$con=mysqli_connect("localhost","root","","tiffin_wala");
		if (mysqli_connect_errno($con))
		   echo '{"query_result":"ERROR"}';
		else
			return $con;
    }
}
?>