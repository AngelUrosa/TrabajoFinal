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
		      try {$consulta="SELECT trabajador FROM personas WHERE usuario=$1, contraseña=$2";             
				
	 	 				$query=$this->db->preparar($consulta);            
		 				$query->bindParam(1,$usuario);          
					 	$query->bindParam(2,$contraseña);            
		 				$query->execute();    
						$tPersonas=$query->fetchall();        
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