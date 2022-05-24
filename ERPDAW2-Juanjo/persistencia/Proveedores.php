<?php 

	class Proveedores{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonProveedores(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnProveedor(Proveedor $p){
			try {
				$consulta="INSERT INTO proveedores (id,id_proveedor,nombre, apellido1, apellido2, nif, cod_postal, localidad, provincia, activo) VALUES(
					null,?,?,?,?,?,?,?,?,?)";
				$idProveedor =$p->getIdProveedor();
				$nombre=$p->getNombre();
				$apellido1=$p->getApellido1();
				$apellido2=$p->getApellido2();
				$nif=$p->getNif();
				$codPostal=$p->getCodPostal();
				$localidad=$p->getLocalidad();
				$provincia=$p->getProvincia();
				$activo=$p->getActivo();

				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$idProveedor);
				$query->bindParam(2,$nombre);
				$query->bindParam(3,$apellido1);
				$query->bindParam(4,$apellido2);
				$query->bindParam(5,$nif);
				$query->bindParam(6,$codPostal);
				$query->bindParam(7,$localidad);
				$query->bindParam(8,$provincia);
				$query->bindParam(9,$activo);

				$query->execute();

				$insertado=true;
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}

		public function getProveedores(){
			try {
				$consulta="SELECT * FROM proveedores";
				$query = $this->db->preparar($consulta);
				$query->execute();

				$tProveedores=$query->fetchall(); 
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$t=array();
			foreach ($tProveedores as $fila) {
				$fp=new Proveedor($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]);
				array_push($t,$fp);
			}
			return $t;

		}

		public function crearIdProveedor($codPostal){
			try {
				$consulta = "SELECT id_proveedor FROM proveedores WHERE cod_postal='$codPostal' ORDER BY ID DESC LIMIT 1";
				$query=$this->db->preparar($consulta);
				$query->execute();
				$ultimoId = $codPostal."000P";

				if (!empty($query)) {
					$tProveedor = $query ->fetchall();	
					$ultimoId = $tProveedor[0][0];		
				}
			} catch (Exception $e) {
				$error = 1;
				return $error;
				
			}
			$ida = substr($ultimoId, 5,3) + 1;
			$ida2 = str_pad($ida, 3,"0",STR_PAD_LEFT);
			$id = $codPostal.$ida2."P";
			return $id;
		}	
	}
		
 ?>