<?php
    class Conexion {
        private static $instancia;
        private $dbh;

        private function __construct() {
            try {
                $host="localhost";
                $database="bd_pwman_joseantonio";
                $usuario="root";
                $password="";
                
                $this->dbh=new PDO("mysql:host=$host;dbname=$database",
                        $usuario,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                if ($this->dbh) {
                    $this->dbh->exec("SET CHARSET utf8");
                    $this->dbh->query("SET NAMES 'utf8'");
                }
            } catch (Exception $ex) {
                echo "Error en la conexión" . $ex->getMessage(). "<br>";
                die();
            }
        }
            
        function preparar($sql) {
            return $this->dbh->prepare($sql);
        }
        
        public static function singleton_conexion() {
            if (!isset(self::$instancia)) {
                $miclase=__CLASS__;
                self::$instancia=new $miclase;
            }
                    
            return self::$instancia;     
        }        
        
        public function __clone() {
            echo "Error. No se puede clonar";
        }
    }
?>