<?php
session_start();
class panel_model{
    private $db;
    private $panel;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->panel=array();
    }
	 
}

?>
