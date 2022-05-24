<?php 

require_once 'Conexion.php';
require_once 'pojos/FamiliaProducto.php';
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


		//////// programamos cada una de las funciones que necesitemos
		///// de ataque a la base de datos
		///// CRUD(Create, Read, Update y Delete)

		////create=Insert en SQL

		public function addUnaFamiliaProducto(FamiliaProducto $f){

		try{
//Esta funcion la de alta una familia nueva de productos en la tabla familias_productos.
			$consulta="INSERT INTO familias_productos(id, id_familia, nombre, descripcion, activo) VALUES (null, ?,?,?,?)";
			$idFamilia = $f->getIdFamilia();
			$nombre=$f->getNombre();
			$descripcion=$f->getDescripcion();
			$activo=$f->getActivo();

			$query=$this->db->preparar($consulta);
			$query->bindParam(1,$idFamilia);
			$query->bindParam(2,$nombre);
			$query->bindParam(3,$descripcion);
			$query->bindParam(4,$activo);

			$query->execute();//ejecuta la consulta.
			$insertado=true;
		}catch(Exception $ex){
			$insertado=false;	
		}
		return $insertado;
		}


		public function getFamiliasProductosTodos(){
			//devuelve un array de objetos de FamiliaProducto
		
			try {
			//	$consulta="SELECT * FROM familias_productos";
				$consulta="SELECT id, id_familia, nombre, descripcion, activo FROM familias_productos";
				$query=$this->db->preparar($consulta);
				$query->execute();
		
				$tFamilias=$query->fetchall();//array bidimensional
				$error=0;
		
			} catch (Exception $e) {
				 $error=1;//echo "se ha producido un error en getFamiliasProductosTodas";
				return $error;
			}
			//vamos a construir un array de objetos
			$t=array();
			foreach ($tFamilias as $fila) {
				$fp=new FamiliaProducto($fila[0],$fila[1],$fila[2],$fila[3],$fila[4]); //un objeto de la clase FamliaProdcuto
				array_push($t, $fp);//mete $fp en $t
			}
			return $t;//devolvemos el array de objetos
		}



		

}

 ?>