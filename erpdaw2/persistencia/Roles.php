<?php 



	class Roles {
		private static $instancia;
		private $bd;

		function __construct() {
			$this->bd = Conexion::singleton_conexion();
		}

		public static function singletonRoles(){
			if (!isset(self::$instancia)){
				$miclase = __CLASS__;
				self::$instancia = new $miclase;

			}
			return self::$instancia; 

		}
        public function addRol(Rol $f){

            try{
                $consulta = "INSERT INTO rol (id, id_roles, nombre) VALUES (
                    null,?,?)";

                $idRol= $f->getIdRol();
                $nombre=$f->getNombre();    

                $query=$this->bd->preparar($consulta);
                $query->bindParam(1,$idRol);
                $query->bindParam(2,$nombre);

                $query->execute();

                $insertado= true;

            }catch(Exception $ex){
                $insertado=false;
            }
            return $insertado;
        }


    }
?>