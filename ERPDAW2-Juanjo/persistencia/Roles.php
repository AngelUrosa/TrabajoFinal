<?php
class Roles{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonRoles(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnRol(Rol $r){
			try {
				$consulta="INSERT INTO roles (id, id_rol, nombre)
							VALUES(null,?,?)";
				$idRol=$r->getIdRol();
				$nombre=$r->getNombre();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$r->getIdRol());
				$query->bindParam(2,$nombre);

				$query->execute(); 

				$insertado=true;
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}
	}
?>