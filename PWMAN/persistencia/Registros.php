<?php 
    class Registros {
        private static $instancia;
        private $db;

        function __construct() {
            $this->db = Conexion::singleton_conexion();
        }

        public static function singletonRegistros(){
            if (!isset(self::$instancia)) {
                $miclase= __CLASS__;
                self::$instancia = new $miclase;
            }

            return self::$instancia;
        }

        public function addUnRegistro($nombre) {
            try {
                $consulta="INSERT INTO registros_acceso (id, nombre) VALUES (null,?)";
                
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$nombre);
                $query->execute();

                $insertado=true;
            } catch (Exception $e) {
                $insertado = false;
            }

            return $insertado;
        }

        public function getRegistrosPorNombre($nombre, $valor) {
            try {
                $consulta="SELECT * FROM registros_acceso where nombre like ? ORDER BY id DESC LIMIT $valor,10";
                // $consulta="SELECT * FROM registros_acceso where nombre like ? ORDER BY id DESC";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$nombre);
                $query->execute();
                $tRegistros=$query->fetchall();
            } catch(Exception $e) {
                $error=1;
                return $error;
            }

            return $tRegistros;
        }
    }
?>