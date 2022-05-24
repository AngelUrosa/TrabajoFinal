<?php

    class Departamentos {
        private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonDepartamentos(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
    }
    
    public function addUnDepartamento(Departamento $d){

        try {
            $consulta = "INSERT INTO departamentos (id, id_departamento, nombre, activo)
            VALUES( null,?,?,?)";
            $idDepartamento =$d->getIdDepartamento();
            $nombre =$d->getNombre();
            $activo=$d->getActivo();

            $query=$this->db->preparar($consulta);
            @$query->bindParam(1,$d->getIdDepartamento());
			$query->bindParam(2,$nombre);
			$query->bindParam(3,$activo);
            

            $query->execute();

			$insertado=true;
        } catch (Exception $e) {
            $insertado=false;
        }

        return $insertado;
    }
}
?>