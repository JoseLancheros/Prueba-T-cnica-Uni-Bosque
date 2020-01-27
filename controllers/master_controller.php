<?php
 session_start();
//Llamada al modelo
require_once("models/login_model.php");
require_once("models/personas_model.php");
require_once("models/documentos_model.php");
require_once("models/vehiculos_model.php");
require_once("models/panel_model.php");
require_once("models/rutas_model.php");

 class master_controller{

        private $model_e;
        private $model_p;

		function __construct(){
            $this->model_e=new login_model();
        }
		/* precarga el index */
        function index(){
            include_once('views/header.phtml');
            include_once('views/inicio_view.phtml');
            include_once('views/footer.phtml');
        }
		/* autenticacion de usuarios */
        function login(){
			
			$this->model_e=new login_model();
			$controller=new login_model();
			
            include_once('views/header.phtml');
            include_once('views/login_view.phtml');
            include_once('views/footer.phtml');
        }
		/*desloguearse de la aplicacion */
		function logout(){
			
			$this->model_e=new login_model();
			$_SESSION['conectado']='no';
			$controller=new login_model();
			
			$datos=$controller->logout();
			
			if($datos=='logout'){
				include_once('views/header.phtml');
				include_once('views/inicio_view.phtml');
				include_once('views/footer.phtml');
			}
			
		}
		/* navegacion panel */
		public function panel(){
			
			$this->model_e=new login_model();
			$controller=new login_model();
			
			if ($_SESSION['conectado']=="si"){
				include_once('views/header.phtml');
				include_once('views/inicio_view.phtml');
				include_once('views/footer.phtml');
			}else{
				$user=$_POST['user'];
				//$password=sha1($_POST['pass']);
				$password=$_POST['pass'];
				
				$controller=new login_model();
				$datos=$controller->get_usuario($user,$password);

				if(is_array($datos)) {
					foreach ($datos as $dato) {
										
						if($dato["idestado"]==2){
								include_once('views/header.phtml');
								include_once('views/login_view.phtml');
								include_once('views/footer.phtml');
							}
							else{
								
								$panel=new panel_model();
								
								$_SESSION['conectado']="si";
								include_once('views/header.phtml');
								include_once('views/inicio_view.phtml');
								include_once('views/footer.phtml');
							}
					}
				}else {
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
				}
			}
			
        }
/*========================= VEHICULOS ===============================*/
		/* listar los vehiculos */
		function vehiculos(){
			
			if ($_SESSION['conectado']=="si"){
				$controller= new vehiculo_model();
				$datos=$controller->get_vehiculos();

			if(is_array($datos)) {
						
				include_once('views/header.phtml');
				include_once('views/vehiculos_view.phtml');
				include_once('views/footer.phtml');		
			
				}else {
							
				}
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}
        }
		
		/* llamado a la vista de formulario */
		function NuevoVehiculo(){
			if ($_SESSION['conectado']=="si"){
				$controller= new vehiculo_model();
			
				include_once('views/header.phtml');
				include_once('views/new_vehiculo_view.phtml');
				include_once('views/footer.phtml');
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}					
		}
		
		/* Agregar nuevo Vehiculo */
		function addVehiculo(){
			$idVeh=$_POST['idVeh'];
			$placa=strtoupper($_POST['placa']);
			$capacidad=$_POST['capacidad'];
			$marca=strtoupper($_POST['marca']);
			$modelo=$_POST['modelo'];
			
			$this->model_e=new vehiculo_model();
			$controller=new vehiculo_model();
			
			$datos=$controller->add_vehiculo($idVeh,$placa,$capacidad,$marca,$modelo);
			
			if ($datos='ok'){
				
				$controller= new vehiculo_model();
			    $datos=$controller->get_vehiculos();

			if(is_array($datos)) {
						
					include_once('views/header.phtml');
					include_once('views/vehiculos_view.phtml');
					include_once('views/footer.phtml');		
			
				}else {
					//include_once('views/header.phtml');
					//include_once('views/login_view.phtml');
					//include_once('views/footer.phtml');
				}
			}
		}
		/* optener Vehiculo libre para asignar ruta */
		function get_vehiculo_libre(){
			$this->model_e=new vehiculo_model();
			$controller=new vehiculo_model();
			$vehiculolibre=$controller->free_vehiculo();
		}
				
				
				
		/* traer el vehiculo a editar */
		function editarVehiculo(){
			if ($_SESSION['conectado']=="si"){
					$controller= new vehiculo_model();
				
					$idVeh= $_GET['d'];
					
					$vehiculo=$controller->get_vehiculo($idVeh);
					//$tipDoc=$controller->get_tip_doc();
				    //$placas=$controller->get_placas();
					
						include_once('views/header.phtml');
						include_once('views/new_vehiculo_view.phtml');
						include_once('views/footer.phtml');	
				}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
				}
		}
				
/*========================= PERSONAS ===============================*/
		/* listar personas */
		function personal(){

			if ($_SESSION['conectado']=="si"){
				$controller= new personas_model();
				$datos=$controller->get_personas();

				if(is_array($datos)) {
							
						include_once('views/header.phtml');
						include_once('views/personas_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
								
					}
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}
        }
	/* agregar una persona */
		function NuevaPersona(){
			if ($_SESSION['conectado']=="si"){
				$controller= new personas_model();
				$estados_persona=$controller->get_estados_persona();
				$roles_persona=$controller->get_rol_persona();
				$tipo_documento=$controller->get_tip_doc_per();
			
				include_once('views/header.phtml');
				include_once('views/new_persona_view.phtml');
				include_once('views/footer.phtml');
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}	
		}
		
		/* guarda los datos del persona */
		function addPersona(){
			$nombres=$_POST['nombres'];
			$apellidos=$_POST['apellidos'];
			$tipdocumento=$_POST['tipdocumento'];
			$numident=$_POST['numident'];
			$numlic=$_POST['numlic'];
			$rol=$_POST['rol'];
			$contrasena=$_POST['contrasena'];
			$estado=$_POST['estado'];
			
			$this->model_e=new personas_model();
			$controller=new personas_model();
			
			$datos=$controller->add_persona($nombres, $apellidos, $tipdocumento, $numident,$numlic, $rol, $contrasena, $estado);
			if ($datos=='ok'){
				$controller= new personas_model();
				$datos=$controller->get_personas();

				if(is_array($datos)) {
						include_once('views/header.phtml');
						include_once('views/personas_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
						//include_once('views/header.phtml');
						//include_once('views/login_view.phtml');
						//include_once('views/footer.phtml');
					}
			}
		
		}
		
/*========================= DOCUMENTOS ===============================*/
		/* listado de documentos */
		function documentos(){
			if ($_SESSION['conectado']=="si"){
				$controller= new documentos_model();
				$datos=$controller->get_documentos();

				if(is_array($datos)) {
							
						include_once('views/header.phtml');
						include_once('views/documentos_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
					}
			}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');

			}
        }
		/* carga vista de formulario */
		function NuevoDocumento(){
			
			if ($_SESSION['conectado']=="si"){
				$controller= new documentos_model();
				$tipDoc=$controller->get_tip_doc();
				$placas=$controller->get_placas();
				
					include_once('views/header.phtml');
					include_once('views/new_documento_view.phtml');
					include_once('views/footer.phtml');	
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}	
		}
		/* guarda los datos del documento */
		function addDocumento(){
			$idDoc=$_POST['idDoc'];
			$numero=$_POST['numero'];
			$tipodocumento=$_POST['tipodocumento'];
			$fechaini=$_POST['fechaini'];
			$fechafin=$_POST['fechafin'];
			$idvehiculo=$_POST['idvehiculo'];
			
			$this->model_e=new documentos_model();
			$controller=new documentos_model();
			
			$controllervehiculo=new vehiculo_model();
			$datoupdate=$controllervehiculo->update_vehiculo($idvehiculo,$tipodocumento,$numero);
			
			$datos=$controller->add_documento($idDoc,$numero,$tipodocumento,$fechaini,$fechafin,$idvehiculo);
			
			if ($datos=='ok'){
				$controller= new vehiculo_model();
				$datos=$controller->get_vehiculos();

				if(is_array($datos)) {
						
						$controller= new documentos_model();
						$datos=$controller->get_documentos();
				
						include_once('views/header.phtml');
						include_once('views/documentos_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
								//include_once('views/header.phtml');
								//include_once('views/login_view.phtml');
								//include_once('views/footer.phtml');
					}
			}
		}

		/* traer el listado de estados de la ruta */
		function editarDocumento(){
			if ($_SESSION['conectado']=="si"){
					$controller= new documentos_model();
				
					$idDoc= $_GET['d'];
					
					$documento=$controller->get_documento($idDoc);
					$tipDoc=$controller->get_tip_doc();
				    $placas=$controller->get_placas();
					
						include_once('views/header.phtml');
						include_once('views/new_documento_view.phtml');
						include_once('views/footer.phtml');	
				}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
				}
		}
/*========================= RUTAS ===============================*/
		/* listado de rutas */
		function rutas(){
			if ($_SESSION['conectado']=="si"){
				$this->model_e=new rutas_model();
				$controller=new rutas_model();

				$datos=$controller->get_rutas();
				$tipocarga=$controller->tipo_carga();
				$tarifas=$controller->get_tarifa();
				
				
				
				if(is_array($datos)) {
							
						include_once('views/header.phtml');
						include_once('views/rutas_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
					}
			}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
			}
        }
		
		/* carga vista de formulario */
		function NuevaRuta(){
			
			if ($_SESSION['conectado']=="si"){
				$controller= new documentos_model();
				$tipDoc=$controller->get_tip_doc();
				$placas=$controller->get_placas();
				
				$cont = new rutas_model();
				$estados_ruta=$cont->get_estados_ruta();
				$tipocarga=$cont->tipo_carga();
				
				
					include_once('views/header.phtml');
					include_once('views/new_ruta_view.phtml');
					include_once('views/footer.phtml');	
			}else{
				include_once('views/header.phtml');
				include_once('views/login_view.phtml');
				include_once('views/footer.phtml');
			}
		}
		
		/* guarda los datos del documento */
		function addRuta(){
			$idruta=$_POST['idruta'];
			$nombre=strtoupper($_POST['nombre']);
			$origen=$_POST['origen'];
			$destino=$_POST['destino'];
			$distancia=$_POST['distancia'];
			$peso=$_POST['peso'];
			$estado=$_POST['estado'];
					
			 $tipocarga=$_POST['carga'];
			
			if(is_array($tipocarga)){
				for ($i=0;$i<count($tipocarga); $i++){
				
				if((count($tipocarga)-1)==$i){
					$tipo= $tipo.$tipocarga[$i];
				}else{
					$tipo=$tipo.$tipocarga[$i].",";
				}
			
				}
			}else {
				$tipo=$tipocarga;
			}
			
			
			
			
			$this->model_e=new rutas_model();
			$controller=new rutas_model();
			
			$datos=$controller->add_ruta($idruta,$nombre,$origen,$destino,$distancia,$peso, $estado,$tipo);
			 
			if ($datos=='ok'){
				$controller= new rutas_model();
				$datos=$controller->get_rutas();
				
				$tarifas=$controller->get_tarifa();

				if(is_array($datos)) {
							
						include_once('views/header.phtml');
						include_once('views/rutas_view.phtml');
						include_once('views/footer.phtml');		
				
					}else {
								//include_once('views/header.phtml');
								//include_once('views/login_view.phtml');
								//include_once('views/footer.phtml');
					}
			}
		}
		/* traer el listado de estados de la ruta */
		function editarRuta(){
			if ($_SESSION['conectado']=="si"){
					$controller= new rutas_model();
				
					$idruta= $_GET['d'];
					
					$ruta=$controller->get_ruta($idruta);
					$estados_ruta=$controller->get_estados_ruta();
					$tipocarga=$controller->tipo_carga();
						include_once('views/header.phtml');
						include_once('views/new_ruta_view.phtml');
						include_once('views/footer.phtml');	
				}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
				}
		}
	
		function enrutamiento(){
			if ($_SESSION['conectado']=="si"){
					$controller= new rutas_model();
					$controller1= new vehiculo_model();
					
					$rutalibre=$controller->free_ruta();
					$vehiculolibre=$controller1->free_vehiculo();
					$rutavehiculo=$controller->ruta_vehiculo();
					$tarifas=$controller->get_tarifa();
						include_once('views/header.phtml');
						include_once('views/enrutamiento_view.phtml');
						include_once('views/footer.phtml');	
				}else{
					include_once('views/header.phtml');
					include_once('views/login_view.phtml');
					include_once('views/footer.phtml');
				}
		}
		
		
		function Enrutar(){
			$idruta=$_POST['idruta'];
			$idvehiculo=$_POST['idvehiculo'];
			
			$this->model_e=new rutas_model();
			$controller=new rutas_model();
			
			$datos=$controller->add_enrrutar($idruta,$idvehiculo);
			 
			if ($datos=='ok'){
				$controller= new rutas_model();
					$controller= new rutas_model();
					$controller1= new vehiculo_model();
					
					$rutalibre=$controller->free_ruta();
					$vehiculolibre=$controller1->free_vehiculo();
					$rutavehiculo=$controller->ruta_vehiculo();
					$tarifas=$controller->get_tarifa();
							
						include_once('views/header.phtml');
						include_once('views/enrutamiento_view.phtml');
						include_once('views/footer.phtml');	
				
					
			}
			
		}
 }
	
?>
