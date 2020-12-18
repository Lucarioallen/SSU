

<?php 
	
	function conectar(){

		$user="root";
		$server="localhost";
		$db="semestralbd";
		$conn=mysqli_connect($server,$user,"",$db) or die ("No se ha podido conectar, nombre del error".mysqli_error());
		//mysqli_select_db($db);
		return $conn;

	}
	
 ?>


    
