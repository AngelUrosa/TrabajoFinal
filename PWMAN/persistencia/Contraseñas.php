<?php 
    class Contraseñas {
        private static $instancia;
        private $db;

        function __construct() {
            $this->db = Conexion::singleton_conexion();
        }

        public static function singletonContraseñas(){
            if (!isset(self::$instancia)) {
                $miclase= __CLASS__;
                self::$instancia = new $miclase;
            }

            return self::$instancia;
        }

        public function addUnaContraseña($nombre, $usuario, $url, $contraseña, $notas) {
            try {
                $consulta="INSERT INTO passwords (id, nombre, usuario, password, url, notas) VALUES (null,?,?,?,?,?)";
                
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$nombre);
                $query->bindParam(2,$usuario);
                $query->bindParam(3,$contraseña);
                $query->bindParam(4,$url);
                $query->bindParam(5,$notas);
                $query->execute();

                $insertado=true;
            } catch (Exception $e) {
                $insertado = false;
            }

            return $insertado;
        }

        public function editUnaContraseña($id, $contraseña, $notas) {
            try {
                $consulta="UPDATE passwords SET password = ?, notas = ? WHERE id like ?";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$contraseña);
                $query->bindParam(2,$notas);
                $query->bindParam(3,$id);
                $query->execute();

                $insertado=true;
            } catch (Exception $e) {
                $insertado = false;
            }

            return $insertado;
        }

        public function getContraseñas(){
            try {
                $consulta="SELECT * FROM passwords";
                $query = $this->db->preparar($consulta);
                $query->execute();

                $tContraseñas=$query->fetchall(); 
                $error=0;
            } catch (Exception $e) {
                $error=1;
                return $error;
            }

            $t=array();
            foreach ($tContraseñas as $fila) {
                $fp=new Contraseña($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7]);
                array_push($t,$fp);
            }

            return $t;
        }

        public function getContraseñaPorNombre($nombre) {
            try {
                $consulta="SELECT id, nombre, usuario, password, url, notas FROM passwords where nombre like ?";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$nombre);
                $query->execute();
                $tContraseñas=$query->fetchall();
            } catch(Exception $e) {
                $error=1;
                return $error;
            }

            return $tContraseñas;
        }

        public function getContraseñaPorWeb($web) {
            try {
                $consulta="SELECT id, nombre, usuario, password, url, notas FROM passwords where url like ?";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$web);
                $query->execute();
                $tContraseñas=$query->fetchall();
            } catch(Exception $e) {
                $error=1;
                return $error;
            }

            return $tContraseñas;
        }

        public function getContraseñaPorNotas($notas) {
            try {
                $consulta="SELECT id, nombre, usuario, password, url, notas FROM passwords where notas like ?";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1,$notas);
                $query->execute();
                $tContraseñas=$query->fetchall();
            } catch(Exception $e) {
                $error=1;
                return $error;
            }

            return $tContraseñas;
        }
    
        public function borrarContraseñaPorId($id){
            try {
                $consulta="DELETE FROM passwords where id = ?";
                $query=$this->db->preparar($consulta);
                $query->bindParam(1, $id);
                $query->execute();
                return $query->rowCount();
            } catch(Exception $e) {
                $error=1;
                return $error;
            }
        }
    }
?>