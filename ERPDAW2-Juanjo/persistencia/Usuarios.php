<?php
class Usuarios{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonUsuarios(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnUsuario(Usuario $u){
			try {
				$consulta="INSERT INTO usuarios (id, id_usuario, id_rol, login, password, activo) 
							VALUES(null,?,?,?,?,?)";
				$idUsuario=$u->getIdUsuario();
                $idRol=$u->getIdRol();
                $login=$u->getLogin();
                $password=$u->getPassword();
                $activo=$u->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$u->getIdUsuario());
				$query->bindParam(2,$idRol);
                $query->bindParam(3,$login);
                $query->bindParam(4,$password);
                $query->bindParam(5,$activo);

				$query->execute(); 

				$insertado=true;
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}
	}
?>