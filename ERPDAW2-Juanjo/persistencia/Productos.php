<?php
class Productos{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonProductos(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnProducto(Producto $p){
			try {
				$consulta="INSERT INTO productos (id, id_producto, id_familia, tipo_iva, precio_coste, pvp,
							descripcion, codigo_barras, id_proveedor, stock_actual, stock_minimo, stock_maximo,
							ruta_foto, activo) 
							VALUES(null,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				
				$idProducto = $p->getIdProducto();
				$idFamilia = $p->getIdFamilia();
				$tipoIVA = $p->getTipoIVA();
				$precioCoste = $p->getPrecioCoste();
				$pvp = $p->getPvp();
				$descripcion = $p->getDescripcion();
				$codigoBarras = $p->getCodigoBarras();
				$idProveedor = $p->getIdProveedor();
				$stockActual = $p->getStockActual();
				$stockMinimo = $p->getStockMinimo();
				$stockMaximo = $p->getStockMaximo();
				$rutaFoto = $p->getRutaFoto();
				$activo= $p->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$p->getIdProducto());
				$query->bindParam(2,$idFamilia);
                $query->bindParam(3,$tipoIVA);
                $query->bindParam(4,$precioCoste);
                $query->bindParam(5,$pvp);
				$query->bindParam(6,$descripcion);
				$query->bindParam(7,$codigoBarras);
				$query->bindParam(8,$idProveedor);
				$query->bindParam(9,$stockActual);
				$query->bindParam(10,$stockMinimo);
				$query->bindParam(11,$stockMaximo);
				$query->bindParam(12,$rutaFoto);
				$query->bindParam(13,$activo);

				$query->execute(); 

				$insertado=true;
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}

		public function getProductosTodos(){
            //Devuelve un array de objetos de FamiliaProducto
            try {
                $consulta="SELECT id, id_producto, id_familia, tipo_iva, precio_coste, pvp, descripcion, codigo_barras, id_proveedor, stock_actual, stock_minimo, stock_maximo, ruta_foto, activo FROM productos";

                $query=$this->db->preparar($consulta);
                $query->execute();

                $tProductos=$query->fetchall(); //array bidimensional
                $error=0;
            } catch (Exception $e) {
                $error=1;
                return $error;
                //echo "Se ha producido un error en getFamiliasProductosTodas";
            }
            //Vamos a construir un array de objetos
            $t=[];

            foreach ($tProductos as $fila) {
                $tp=new Producto($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13]); //Un objeto de la clase FamiliaProducto
                array_push($t, $tp);//Mete $fp en $t
            }
            return $t; //Devolvemos el array de objetos
        }


		public function getUnIdProducto($idProducto){
            try {
                $consulta="SELECT * FROM productos WHERE id = $idProducto";
                $query = $this->db->preparar($consulta);
                $query->execute();
    
                $tLPedidos=$query->fetchall();
                $error=0;
            } catch (Exception $e) {
                $error=1;
                return $error;
                
            }
            $t=array();
            foreach ($tLPedidos as $fila) {
                
                $fp=new LineaPedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13]);
                array_push($t,$fp);
            }
            return $t;
    
        }

		public function getFotoProducto($idProducto){
			try {
                $consulta="SELECT ruta_foto FROM productos WHERE id_producto = '$idProducto'";
                $query = $this->db->preparar($consulta);
				$query->execute();
                $tLPedidos=$query->fetchall();
				return $tLPedidos[0];
            } catch (Exception $e) {
				$error=1;
                return $error;
			}
            
                
    
    
		}
		public function getUltimoProductoFamilia($familia){
			try {
				$consulta="SELECT COUNT(id_producto) as ultimo FROM productos WHERE id_familia = $familia";
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tProductos = $query->fetchAll();
			} catch (Exception $e) {
				echo "Se ha producido un error en getUltimoProducto";
			}

			return $tProductos[0]['ultimo'];
		}

		public function getProductoPorIdProducto($idProducto){
            try {
                $consulta="SELECT * FROM productos WHERE id_producto = $idProducto";
                $query = $this->db->preparar($consulta);
                $query->execute();
    
                $tLPedidos=$query->fetchall();
                $error=0;
            } catch (Exception $e) {
                $error=1;
                return $error;
                
            }
            $t=array();
            foreach ($tLPedidos as $fila) {
                
                $fp=new LineaPedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13]);
                array_push($t,$fp);
            }
            return $t[0];
    
        }

	}
?>