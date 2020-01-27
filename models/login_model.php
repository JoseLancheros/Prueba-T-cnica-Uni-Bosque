<?php
session_start();
class login_model{
    private $db;
    private $login;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->login=array();
    }
	/**/
    public function get_usuario($user,$password){
        $consulta=$this->db->query("SELECT * FROM persona WHERE  NumIdent='$user' and contrasena='$password'");
        
		while($filas=$consulta->fetch_assoc()){
            $this->usuario[]=$filas;
        }
        return $this->usuario;
    }
	/**/
	 public function logout(){
			session_destroy();
			
			return "logout";
        }
  
}

?>
