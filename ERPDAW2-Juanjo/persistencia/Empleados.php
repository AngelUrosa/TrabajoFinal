<?php 

	class Empleados{
		private static $instancia;
		private $db;

		function __construct(){
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonEmpleados(){
			if (!isset(self::$instancia)) {
				$miclase=__CLASS__;
				self::$instancia = new $miclase;
			}

			return self::$instancia;
		}

		public function addUnEmpleado(Empleado $c){
			try{
				$consulta="INSERT INTO empleados (id, id_empleado, id_departamento,
				id_usuario, nombre, apellido1, apellido2, nif, numcta, movil, direccion,localidad,
				cod_postal, provincia, pais, ruta_foto, activo) VALUES(
				null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$idEmpleado=$c->getIdEmpleado();
				$idDepartamento=$c->getIdDepartamento();
				$idUsuario=$c->getidUsuario();
				$nombre=$c->getNombre();
				$apellido1=$c->getApellido1();
				$apellido2=$c->getApellido2();
				$nif=$c->getNif();
				$numcta=$c->getNumcta();
				$movil=$c->getMovil();
				$direccion=$c->getDireccion();
				$codPostal=$c->getCodPostal();
				$provincia=$c->getProvincia();
				$localidad=$c->getLocalidad();
				$pais=$c->getPais();
				$rutaFoto=$c->getRutaFoto();
				$activo=$c->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$c->getIdEmpleado());
				$query->bindParam(2,$idDepartamento);
				$query->bindParam(3,$idUsuario);
				$query->bindParam(4,$nombre);
				$query->bindParam(5,$apellido1);
				$query->bindParam(6,$apellido2);
				$query->bindParam(7,$nif);
				$query->bindParam(8,$numcta);
				$query->bindParam(9,$movil);
				$query->bindParam(10,$direccion);
				$query->bindParam(11,$codPostal);
				$query->bindParam(12,$provincia);
				$query->bindParam(13,$localidad);
				$query->bindParam(14,$pais);
				$query->bindParam(15,$rutaFoto);
				$query->bindParam(16,$activo);

				$query->execute(); 

				$insertado=true;

			}catch(Exception $e){
				$insertado=false;
			}
			return $insertado;
		}

		public function getEmpleados(){
			try {
				$consulta="SELECT id, id_empleado, id_departamento,
				id_usuario, nombre, apellido1, apellido2, nif, numcta, movil, direccion,localidad,
				cod_postal, provincia, pais, ruta_foto, activo FROM empleados";
				$query = $this->db->preparar($consulta);
				$query->execute();

				$tEmpleados=$query->fetchall();
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
				
			}
			$t=array();
			foreach ($tEmpleados as $fila) {
				$fp=new Empleado($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14],$fila[15],$fila[16]);
				array_push($t,$fp);
			}
			return $t;

		}

	}
 ?>