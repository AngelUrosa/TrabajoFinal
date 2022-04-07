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

		public function verificarPersona(){
			//Devuelve un array de objetos de FamiliaProducto
			$error=0;
			try {
				$consulta="SELECT nombre, contraseña FROM personas";

				$query=$this->db->preparar($consulta);
				$query->execute();

				$tPersonas=$query->fetchall(); //array bidimensional
				$error=1;
			} catch (Exception $e) {
				$error=1;
				//echo "Se ha producio un error en getFamiliasProductosTodas";
			}
			//Vamos a construir un array de objetos
			$t=[];
			foreach ($tEmpleados as $fila) {
				$fp=new Empleado($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14],$fila[15]);//un objeto de la clase FamiliaProducto
				array_push($t, $fp); //mete $fp en $t
			}
			return $t; //devolvemos el array de objetos
		}

    }

    ?>