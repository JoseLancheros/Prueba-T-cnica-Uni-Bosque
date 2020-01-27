<?php

class Conectar{

    public static function conexion(){
		
		$username="root";  
		$password="";  
		$hostname = "localhost"; 
		$database = "proyecto"; 
	
        $conexion=new mysqli($hostname, $username, $password, $database);
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
