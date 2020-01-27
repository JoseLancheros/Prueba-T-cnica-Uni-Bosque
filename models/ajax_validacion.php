<?php

	function Conectarse() 
	{ 
		$username="root";  
		$password="";  
		$hostname = "localhost"; 
		$database = "proyecto"; 
		   $link=mysqli_connect($hostname,$username,$password)or die("no se puede conectar a localhost");
		   mysqli_select_db($link,$database)or die("no se puede conectar a la bd del proyecto");
		   return $link; 
	} 

	$conexion=Conectarse(); 
	$NumIdentificacion=$_POST['numident'];

	$query=mysqli_query($conexion,"select * from persona where NumIdent='$NumIdentificacion'");
		while($row=mysqli_fetch_array($query)){
			if($row['NumIdent']){
				echo $row['NumIdent'];
			}
		}

	mysqli_close($conexion); //cierra la conexion
?>
			
	