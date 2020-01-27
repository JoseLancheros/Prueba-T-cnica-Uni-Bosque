<?php
session_start();
class personas_model{
    private $db;
    private $personas;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->personas=array();
    }
	
	/* listar los datos de todas las personas */
    public function get_personas(){
        $consulta=$this->db->query("select 
			p.nombres,
			p.apellidos,
			tdp.nombre as TipoDocumento,
			p.NumIdent,
			p.NumLic,
			r.nombre as Rol,
			pe.nombre as Estado
			from Persona p
			inner join tipo_doc_per tdp on p.TipDoc=tdp.id
			inner join Rol r on p.idRol=r.id
			inner join Persona_Estado pe on p.idestado=pe.id;");
        while($filas=$consulta->fetch_assoc()){
            $this->personas[]=$filas;
        }
        return $this->personas;
    }
	/* traer el listado de estados de personas*/
	 public function get_estados_persona(){
        $consulta=$this->db->query("select * from persona_estado;");
        while($filas=$consulta->fetch_assoc()){
            $this->person[]=$filas;
        }
        return $this->person;
    }
	
	/* traer el listado de roles de personas*/
	 public function get_rol_persona(){
        $consulta=$this->db->query("select * from rol;");
        while($filas=$consulta->fetch_assoc()){
            $this->personas[]=$filas;
        }
        return $this->personas;
    }
	/* traer el listado de tipo de documento*/
	 public function get_tip_doc_per(){
        $consulta=$this->db->query("select * from tipo_doc_per;");
        while($filas=$consulta->fetch_assoc()){
            $this->persona[]=$filas;
        }
        return $this->persona;
    }
	/* Agrega una nueva persona */
	public function add_persona($nombres, $apellidos, $tipdocumento, $numident, $numlic, $rol, $contrasena, $estado){
        $consulta=$this->db->query("INSERT INTO persona ( nombres, apellidos, TipDoc, NumIdent, NumLic, idRol, contrasena, idestado)
		VALUES ( '$nombres', '$apellidos', '$tipdocumento', '$numident', '$numlic', '$rol', '$contrasena', '$estado')");
       
        return "ok";
    }
	
	
}

?>
