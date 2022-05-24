<?php 

	class FamiliasProductos {
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonFamiliasProductos(){
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


		public function addUnaFamiliaProducto(FamiliaProducto $f){
			//Esta función da de alta una familia nueva en la tabla familias_productos
			try {
				$consulta="INSERT INTO familias_productos (id, id_familia, nombre, descripcion, activo) VALUES (null,?,?,?,?)";
				$idFamilia=$f->getIdFamilia();
				$nombre=$f->getNombre();
				$descripcion=$f->getDescripcion();
				$activo=$f->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$f->getIdFamilia());
				$query->bindParam(2,$nombre);
				$query->bindParam(3,$descripcion);
				$query->bindParam(4,$activo);

				$query->execute(); //ejecuta la consulta

				$insertado=true; //
				
			} catch (Exception $e) {
				//echo "Se ha producido un error";
				$insertado=false;	
			}
			return $insertado;
		}

		public function getFamiliasProductos(){
			//Devuelve un array de objetos de FamiliaProducto
			try {
				$consulta="SELECT id, id_familia, nombre, descripcion, activo FROM familias_productos";
				$query = $this->db->preparar($consulta);
				$query->execute();

				$tFamilias=$query->fetchall(); //array bidimensional
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
				//echo "Se ha producido un error en getFamiliasProductos";
			}
			$t=array();
			foreach ($tFamilias as $fila) {
				//un objeto de la clase FamiliaProducto
				$fp=new FamiliaProducto($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]);
				array_push($t,$fp);//mete fp en t
			}
			return $t;// devolvemos el array de objetos

		}

		

		


}

 ?>