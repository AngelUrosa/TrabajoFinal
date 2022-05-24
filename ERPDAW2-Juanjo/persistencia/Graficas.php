<?php 

	class Clientes{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonClientes(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnoCliente(Cliente $f){
			try {
				$consulta="INSERT INTO clientes (id, id_cliente,
					id_usuario, nombre, apellido1, apellido2, nif,
					numcta,como_nos_conocio,activo) VALUES(
					null,?,?,?,?,?,?,?,?,?)";
				$idCliente=$f->getIdCliente();
				$idUsuario=$f->getIdUsuario();
				$nombre=$f->getNombre();
				$apellido1=$f->getApellido1();
				$apellido2=$f->getApellido2();
				$nif=$f->getNif();
				$numcta=$f->getNumcta();
				$comoNosConocio=$f->getcomoNosConocio();
				$activo=$f->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$f->getIdCliente());
				$query->bindParam(2,$idUsuario);
				$query->bindParam(3,$nombre);
				$query->bindParam(4,$apellido1);
				$query->bindParam(5,$apellido2);
				$query->bindParam(6,$nif);
				$query->bindParam(7,$numcta);
				$query->bindParam(8,$comoNosConocio);
				$query->bindParam(9,$activo);

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}

		public function getClientes(){
			try {
				$consulta="SELECT id, id_cliente,
				id_usuario, nombre, apellido1, apellido2, nif,
				numcta, como_nos_conocio, activo FROM clientes";
				$query = $this->db->preparar($consulta);
				$query->execute();

				$tClientes=$query->fetchall(); 
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$t=array();
			foreach ($tClientes as $fila) {
				$fp=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]);
				array_push($t,$fp);
			}
			return $t;

		}
	}
 ?>