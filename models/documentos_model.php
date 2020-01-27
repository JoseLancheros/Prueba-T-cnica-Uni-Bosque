<?php
session_start();
class documentos_model{
    private $db;
    private $documentos;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->documentos=array();
    }
	/**/
    public function get_documentos(){
        $consulta=$this->db->query("select 	
			d.id,
			d.numero,
			d.fecha_inicio,
			d.fecha_vencimiento,
			tdv.nombre as TipDocumento,
			v.placa as vehiculo
			from Documentos d
			INNER JOIN tip_doc_veh tdv on d.tipdocumento=tdv.id
			INNER JOIN vehiculo v on v.id=d.idvehiculo order by d.id;");
        while($filas=$consulta->fetch_assoc()){
            $this->documentos[]=$filas;
        }
        return $this->documentos;
    }
	
	/* traer el listado de tipo de documento*/
	 public function get_tip_doc(){
        $consulta=$this->db->query("select * from tip_doc_veh;");
        while($filas=$consulta->fetch_assoc()){
            $this->documentos[]=$filas;
        }
        return $this->documentos;
    }
	
	/* traer el listado de  vehiculos */
	 public function get_placas(){
        $consulta=$this->db->query("select id,placa  from vehiculo;");
        while($filas=$consulta->fetch_assoc()){
            $this->placas[]=$filas;
        }
        return $this->placas;
    }
	
	/* Agrega un nuevo documento */
	public function add_documento($idDoc,$numero,$tipodocumento,$fechaini,$fechafin,$idvehiculo){
     
		if($idDoc){
			$update=$this->db->query("UPDATE Documentos SET numero='$numero',tipdocumento='$tipodocumento', fecha_inicio='$fechaini', fecha_vencimiento='$fechafin',idvehiculo='$idvehiculo' WHERE id = $idDoc;");
		}else{
			$insert=$this->db->query("INSERT INTO Documentos (numero,tipdocumento, fecha_inicio, fecha_vencimiento,idvehiculo) 
			VALUES ( $numero, $tipodocumento, '$fechaini', '$fechafin', $idvehiculo)");
       }  
		
		
        return "ok";
    }
	
	
	/* traer datos de una ruta */
	public function get_documento($idDoc){

		$consulta=$this->db->query("select * from documentos where id='$idDoc';");
        while($filas=$consulta->fetch_assoc()){
            $this->ruta[]=$filas;
        }
        return $this->ruta;
	}
	
	 
}

?>
