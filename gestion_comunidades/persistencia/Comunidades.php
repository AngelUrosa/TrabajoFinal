<?php 

require_once 'Conexion.php';
require_once './pojos/comunidad.php';

	class Comunidades {
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


		//////// programamaos cada una de las funciones que necesitemos
		///// de ataque a la base de datos
		///// CRUD (Create, Read,Update y Delete)

		//Create====Insert

/*
		public function addUnCliente(Cliente $c){
			//Esta función da de alta una familia nueva en la tabla familias_productos
			try {
				$consulta="INSERT INTO clientes (id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo) VALUES (null,?,?,?,?,?,?,?,?,?)";
				$idCliente=$c->getIdCliente();
				$idUsuario=$c->getIdUsuario();
				$nombre=$c->getNombre();
				$apellido1=$c->getApellido1();
				$apellido2=$c->getApellido2();
				$nif=$c->getNif();
				$numCta=$c->getNumCta();
				$comoNosConocio=$c->getComoNosConocio();
				$activo=$c->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$c->getIdCliente());
				@$query->bindParam(2,$c->getIdUsuario());
				$query->bindParam(3,$nombre);
				$query->bindParam(4,$apellido1);
				$query->bindParam(5,$apellido2);
				$query->bindParam(6,$nif);
				$query->bindParam(7,$numCta);
				$query->bindParam(8,$comoNosConocio);
				$query->bindParam(9,$activo);

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
			} catch (Exception $e) {
				//echo "Se ha producido un error";
				$insertado=false;	
			}
			return $insertado;
		}
				//A partir de aqui listado
		public function getClientes(){
			//Devuelve un array de objetos de FamiliaProducto
			$error=0;
			try {
				$consulta="SELECT id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo FROM clientes";

				$query=$this->db->preparar($consulta);
				$query->execute();

				$tClientes=$query->fetchall(); //array bidimensional
				$error=1;
			} catch (Exception $e) {
				$error=1;
				//echo "Se ha producio un error en getFamiliasProductosTodas";
			}
			//Vamos a construir un array de objetos
			$t=[];
			foreach ($tClientes as $fila) {
				$fp=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]);//un objeto de la clase FamiliaProducto
				array_push($t, $fp); //mete $fp en $t
			}
			return $t; //devolvemos el array de objetos
		}


		

*/
}

 ?>