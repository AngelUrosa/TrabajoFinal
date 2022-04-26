<?php 

require_once 'Conexion.php';
require_once './pojos/persona.php';

	class Personas {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonClientes(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; //this->$instancia

		}

		public function getSesion($usuario,$contraseña){
			$error=0;

			$u=null;
		      try {$consulta="SELECT * FROM personas WHERE usuario=? AND contraseña=?";             
				
	 	 				$query=$this->db->preparar($consulta);            
		 				$query->bindParam(1,$usuario);          
					 	$query->bindParam(2,$contraseña);            
		 				$query->execute();    

						 //Carga en un vector
						$tPersona=$query->fetchall(); 
						
						if (isset($tPersona[0])) {

							if ($perfil == 1 && $tPersona[0]['trabajador'] == true) || $perfil == 2{
								//Solicito acceso administrador


							} else{

								$u=new Persona($tPersona[0]['id_persona'],$tPersona[0]['id_comunidad'],$tPersona[0]['nif'],$tPersona[0]['usuario'],
								$tPersona[0]['contraseña'],$tPersona[0]['email'],$tPersona[0]['trabajador']);
							}

							
						}
						
						
						
						

	  } catch(Exception $e){           
		    $error=1;         
		    return $error;        
	  }     
			
	return $tPersonas;   

	if ($tPersonas.length>0){
		echo "Has entrado";
	}else {
		echo "No has entrado";
	}
  }

    }

    ?>