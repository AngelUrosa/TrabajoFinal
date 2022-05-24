<?php
class Pedidos{
		
		private static $instancia;
		private $db;

		function __construct() {
			$this->db = Conexion::singleton_conexion();
		}

		public static function singletonPedidos(){
			if(!isset(self::$instancia)){
				$miclase= __CLASS__;
				self::$instancia = new $miclase;
			}
			return self::$instancia;
		}

		public function addUnPedido(Pedido $p){
			try {
				$consulta="INSERT INTO pedidos (id, id_pedido,id_empleado_empaqueta, id_empresa_transporte, fecha_pedido,
                        fecha_envio, fecha_entrega, facturado, id_factura, fecha_factura, pagado,
                        fecha_pago, metodo_pago, id_cliente, activo)
					    VALUES(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$idPedido=$p->getIdPedido();
				$idEmpleadoEmpaqueta=$p->getIdEmpleadoEmpaqueta();
                $idEmpresaTransporte=$p->getIdEmpresaTransporte();
                $fechaPedido= $p->getFechaPedido();
                $fechaEnvio= $p->getFechaEnvio();
                $fechaEntrega= $p->getFechaEntrega();
                $facturado= $p->getFacturado();
                $idFactura= $p->getIdFactura();
                $fechaFactura= $p->getFechaFactura();
                $pagado= $p->getPagado();
                $fechaPago= $p->getFechaPago();
                $metodoPago= $p->getMetodoPago();
                $idCliente= $p->getIdCliente();
                $activo= $p->getActivo();

				$query=$this->db->preparar($consulta);
				@$query->bindParam(1,$p->getIdPedido());
				$query->bindParam(2,$idEmpleadoEmpaqueta);
                $query->bindParam(3,$idEmpresaTransporte);
                $query->bindParam(4,$fechaPedido);
                $query->bindParam(5,$fechaEnvio);
                $query->bindParam(6,$fechaEntrega);
                $query->bindParam(7,$facturado);
                $query->bindParam(8,$idFactura);
                $query->bindParam(9,$fechaFactura);
                $query->bindParam(10,$pagado);
                $query->bindParam(11,$fechaPago);
                $query->bindParam(12,$metodoPago);
                $query->bindParam(13,$idCliente);
                $query->bindParam(14,$activo);

				$query->execute(); 

				$insertado=true;
				
			} catch (Exception $e) {
				$insertado=false;
				
			}
			return $insertado;
		}

		public function getPedidosPorMes() {

			// Resultado de la consulta inicializado a resultado vacío
			$resultado = array();

			try {
				$consulta="SELECT month(fecha_pedido), count(*) FROM pedidos GROUP BY month(fecha_pedido)";
				$query = $this->db->preparar($consulta); 
				$query->execute();
				
				// Recorre la consulta
				while($registro = $query->fetch(PDO::FETCH_NUM)) {
					$fila = array(
						'label' => $registro[0],
						'y' => $registro[1]
					);
					array_push($resultado, $fila);
				}
			} catch (Exception $ex) {
				$error = -1;
				return $error;
			}

			return $resultado;
		}

		public function convertirMes($registro) {
			$numeroMes = $registro;
			$nombreMes = date("F", mktime(0, 0, 0, $numeroMes, 10));
			return $nombreMes."\n";
		}

		public function getPedidosTodos(){
			try {
				$consulta="SELECT * FROM pedidos";
				$query = $this->db->preparar($consulta);
				$query->execute();

				$tPedidos=$query->fetchall(); 
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$t=array();
			foreach ($tPedidos as $fila) {
				$fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]);
				array_push($t,$fp);
			}
			return $t;

		}
		public function getPedidosEntreFechas($x1,$x2){
			try {
				$consulta="SELECT * FROM pedidos WHERE fecha_pedido BETWEEN ? AND ?";

				$query = $this->db->preparar($consulta);
				$query->bindParam(1,$x1 , PDO::PARAM_INT);
				$query->bindParam(2,$x2 , PDO::PARAM_INT);
				$query->execute();
				
				$tPedidos=$query->fetchall(); 
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$t=array();
			foreach ($tPedidos as $fila) {
				$fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]);
				array_push($t,$fp);
			}
			return $t;
		}

		public function getPedidosPorIdCliente($c){
			try {
				$consulta="SELECT * FROM pedidos WHERE id_cliente = ?";
				$idCliente=$c;
				$query = $this->db->preparar($consulta); 
				$query->bindParam(1,$idCliente);
				$query->execute();

				$tPedidos=$query->fetchall();
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$tablaPedidos=array();
			foreach ($tPedidos as $fila) {
				$fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]);
				array_push($t,$fp);
			}
			return $tablaPedidos;
		}

		public function contarPedidos($anio) {
			try {
				$consulta = "SELECT COUNT(*) FROM pedidos WHERE YEAR(fecha_pedido) = ".$anio;
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tPedidos = $query->fetchAll();

				if (empty($tPedidos)) {
					$numero = 0;
				} else {
					$numero = $tPedidos[0][0];
				}
			} catch (Exception $ex) {
				$numero = -1;
			}
			return $numero;
		}

		public function getUnPedido($idPedido){
			try {
				$consulta="SELECT * FROM pedidos WHERE id_pedido = $idPedido";
				$query = $this->db->preparar($consulta);
				$query->execute();
				$tPedidos=$query->fetchall();
				$error=0;
			} catch (Exception $e) {
				$error=1;
				return $error;
			}
			$t=array();
			foreach ($tPedidos as $fila) {
				$fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]);
				array_push($t,$fp);
			}
			return $t;
		}

	}
?>