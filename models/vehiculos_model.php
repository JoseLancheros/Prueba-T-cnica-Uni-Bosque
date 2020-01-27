<?php
session_start();
class vehiculo_model{
    private $db;
    private $vehiculo;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->vehiculo=array();
    }
	
/* obtener lista de vehiculos */
    public function get_vehiculos(){
        $consulta=$this->db->query("select * from vehiculo;");
        while($filas=$consulta->fetch_assoc()){
            $this->vehiculo[]=$filas;
        }
        return $this->vehiculo;
    }
	/* agregar o editar vehiculo*/
	public function add_vehiculo($idVeh,$placa,$capacidad,$marca,$modelo){
		if($idVeh){
			$update=$this->db->query("UPDATE vehiculo SET placa='$placa', capacidad='$capacidad', marca='$marca', modelo='$modelo' WHERE id = $idVeh;");
		}else{
			$consulta=$this->db->query("INSERT INTO vehiculo ( placa, capacidad, marca, modelo, idsoat, idtecnicomecanica, idtarjeta) 
				VALUES ('$placa', $capacidad, '$marca', $modelo, '0', '0', '0');");
       }  
	   
        
        return "ok";
    }
	
	public function update_vehiculo($idvehiculo,$tipodocumento,$numero){
		
		if($tipodocumento==1){
			$query="UPDATE vehiculo SET idsoat = '$numero' WHERE vehiculo.id = $idvehiculo;";
		}
		if($tipodocumento==2){
			$query="UPDATE vehiculo SET idtecnicomecanica = '$numero' WHERE vehiculo.id = $idvehiculo;";
		}
		if($tipodocumento==3){
			$query="UPDATE vehiculo SET idtarjeta = '$numero' WHERE vehiculo.id = $idvehiculo;";
		}
		
        $consulta=$this->db->query($query);
       
        return "ok";
    }
	/* listar los vehiculos libres */
	public function free_vehiculo(){
	
		$query="select * from vehiculo v 
			where v.idsoat!=0 and v.idtecnicomecanica!=0 and v.idtarjeta!=0 
			and v.id not in(select idvehiculo from enrutamiento);";
		
		$consulta=$this->db->query($query);
       
        while($filas=$consulta->fetch_assoc()){
            $this->vehiculo[]=$filas;
        }
        return $this->vehiculo;
	}
	
	
	public function get_vehiculo($idVeh){

		$consulta=$this->db->query("select * from vehiculo where id='$idVeh';");
        while($filas=$consulta->fetch_assoc()){
            $this->ruta[]=$filas;
        }
        return $this->ruta;
	}

	 
}

?>
