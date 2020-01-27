<?php
require_once("db/db.php");
require_once("controllers/master_controller.php");


    $controller= new master_controller();
    
    if(!empty($_REQUEST['w'])){
        $metodo=$_REQUEST['w'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->index();
        }
    }else{
        $controller->index();
    }



?>
