<?php
session_start();
class rutas_model{
    private $db;
    private $rutas;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->rutas=array();
    }
	
    /* tarer las rutas que han sido cargadas */
    public function get_rutas(){
        $consulta=$this->db->query("select 
			r.id,
			r.ruta,
			r.origen,
			r.destino,
			r.distancia,
			r.peso,
			r.tipocarga,
			re.nombre as estado
			 from rutas r
			inner join Ruta_Estado re on re.id=r.estado order by r.id; ");
        while($filas=$consulta->fetch_assoc()){
            $this->rutas[]=$filas;
        }
        return $this->rutas;
    }
	
	/* traer la tarifa activa */
	public function get_tarifa(){
        $consulta=$this->db->query("select * from Tarifas where estado=1;");
        while($filas=$consulta->fetch_assoc()){
            $this->tarifas[]=$filas;
        }
        return $this->tarifas;
    }
	
	/*Agregar o editar ruta */
		public function add_ruta($idruta,$nombre,$origen,$destino,$distancia,$peso, $estado,$tipo){
		
		if($idruta){
			$update=$this->db->query("UPDATE rutas SET ruta='$nombre',origen='$origen',destino='$destino',distancia='$distancia',peso='$peso',estado='$estado',tipocarga='$tipo'  WHERE id = $idruta;");
		}else{
			$insert=$this->db->query("INSERT INTO Rutas ( ruta,origen,destino,distancia,peso,estado,tipocarga) 
			VALUES ('$nombre','$origen','$destino',$distancia,$peso, $estado,'$tipo');");
		}       
       
        return "ok";
    }
	/* traer el listado de estados de ruta*/
	public function get_estados_ruta(){
        $consulta=$this->db->query("select * from ruta_estado;");
        while($filas=$consulta->fetch_assoc()){
            $this->rutas[]=$filas;
        }
        return $this->rutas;
    }
	/* traer datos de una ruta */
	public function get_ruta($idruta){

		$consulta=$this->db->query("select * from rutas where id='$idruta';");
        while($filas=$consulta->fetch_assoc()){
            $this->ruta[]=$filas;
        }
        return $this->ruta;
		
	}
	/* listar los rutas libres */
	public function free_ruta(){
		$query="select * from rutas where estado=1";
		
		$consulta=$this->db->query($query);
       
         while($filas=$consulta->fetch_assoc()){
            $this->ruta[]=$filas;
        }
        return $this->ruta;
	}
	/***/
	public function add_enrrutar($idruta,$idvehiculo){
		
		$insert=$this->db->query("INSERT INTO `enrutamiento` (idruta, idvehiculo) VALUES ('$idruta','$idvehiculo');");
		$update=$this->db->query("UPDATE rutas SET estado = '2' WHERE id = '$idruta';");
		
        return "ok";
	}
	
	/**/
	public function ruta_vehiculo(){
		$query="SELECT 
			r.id,
			r.ruta,
			r.origen,
			r.destino,
			r.distancia,
			r.peso,
			r.estado as idestado,
			v.placa,
			es.nombre as estado
				FROM enrutamiento e
				INNER JOIN vehiculo v on v.id=e.idvehiculo
				INNER JOIN rutas r on r.id=e.idruta
				INNER JOIN ruta_estado es on es.id=r.estado
				where r.estado!=1";
		
		$consulta=$this->db->query($query);
       
         while($filas=$consulta->fetch_assoc()){
            $this->rutas[]=$filas;
        }
        return $this->rutas;
	}
	/* listar los tipo de carga  */
	public function tipo_carga(){
		$query="select * from material";
		
		$consulta=$this->db->query($query);
       
         while($filas=$consulta->fetch_assoc()){
            $this->rut[]=$filas;
        }
        return $this->rut;
	}
}

?>
