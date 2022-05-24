<?php 

	class DireccionClientes{
		private static $instancia;
		private $db;

		function __construct(){
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonDireccionClientes(){
			if (!isset(self::$instancia)) {
				$miclase=__CLASS__;
				self::$instancia = new $miclase;
			}

			return self::$instancia;
		}

		public function addUnDireccionClientes(DireccionCliente $dc){
			try{
				$consulta="INSERT INTO DireccionClientes (id, id_cliente, id_usuario,
				direccion, codpostal, localidad, provincia, pais, activo) VALUES(
				null,?,?,?,?,?,?,?,?)";
                $idCliente=$dc->getIdCliente();
				$idUsuario=$dc->getIdUsuario();
                $direccion = $dc->getDireccion();
                $codPostal = $dc->getCodpostal();
                $localidad = $dc->getLocalidad();
                $provincia = $dc->getPronvicia();
                $pais = $dc->getPais();
                $activo = $dc->getActivo();

				$query=$this->db->preparar($consulta);
				$query->bindParam(1,$idCliente);
				$query->bindParam(2,$idUsuario);
				$query->bindParam(3,$direccion);
				$query->bindParam(4,$codPostal);
				$query->bindParam(5,$provincia);
				$query->bindParam(6,$localidad);
				$query->bindParam(7,$pais);
				$query->bindParam(8,$activo);

				$query->execute(); 

				$insertado=true;

			}catch(Exception $e){
				$insertado=false;
			}
			return $insertado;
		}

	}
 ?>