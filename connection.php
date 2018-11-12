<?php
class Database
{
	// get the database connection
    function getConnection(){
		$con=mysqli_connect("edufocus.db.9462939.hostedresource.com","edufocus","Ddrr@9898","edufocus");
		//$con=mysqli_connect("localhost","root","","tiffin_wala");
		if (mysqli_connect_errno($con))
		   echo '{"query_result":"ERROR"}';
		else
			return $con;
    }
}
?>