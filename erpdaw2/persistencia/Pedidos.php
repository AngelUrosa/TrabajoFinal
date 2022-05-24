<?php

class Pedidos{
    private static $instancia;
    private $db;

    function __construct(){
        $this->db = Conexion::singleton_conexion();

    }
    
    public static function singletonPedidos(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function addPedido(Pedido $f){

        try{
            $consulta = "INSERT INTO pedidos(id, id_pedidos, id_empleados_empaqueta, id_empresas_transporte, fecha_pedido, fecha_envios, fecha_entregas, 
            facturados, id_facturas, fechas_facturas, pagados, fechas_pagos, metodos_pagos, id_clientes, activo VALUES(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";


        
        $idPedido=$f->getIdPedido();
        $idEmpleadoEmpaqueta=$f->getIdEmpleadoEmpaqueta();
        $idEmpresaTransporte=$f->getIdEmpresaTransporte();
        $fechaPedido=$f->getFechaPedido();
        $fechaEnvio=$f->getFechaEnvio();
        $fechaEntrega=$f->getFechaEntrega();
        $facturado=$f->getFacturado();
        $idFactura=$f->getIdFactura();
        $fechaFactura=$f->getFechaFactura();
        $pagado=$f->getPagado();
        $fechaPago=$f->getFechaPago();
        $metodoPago=$f->getMetodoPago();
        $idCliente=$f->getIdCliente();
        $activo=$f->getActivo();

        $query = $this->db->preparar($consulta);
        $query->bindParam(1,$idPedido);
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
        $insertado = true;
        }catch(Exception $ex){
            $insertado = false;
        }
return $insertado;
    }
    public function getPedidosTodos(){
        //devuelve un array de objetos de FamiliaProducto
    
        try {
        //	$consulta="SELECT * FROM familias_productos";
            $consulta="SELECT id, id_pedido, id_empleado_empaqueta, id_empresa_transporte, fecha_pedido, fecha_envio, fecha_entrega, facturado, id_factura, fecha_factura, metodo_pago, pagado, fecha_pago, id_cliente, activo FROM pedidos";
            $query=$this->db->preparar($consulta);
            $query->execute();
    
            $tPedidos=$query->fetchall();//array bidimensional
            $error=0;
    
        } catch (Exception $e) {
             $error=1;//echo "se ha producido un error en getFamiliasProductosTodas";
            return $error;
        }
        //vamos a construir un array de objetos
        $t=array();
        foreach ($tPedidos as $fila) {
            $fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]); //un objeto de la clase FamliaProdcuto
            array_push($t, $fp);//mete $fp en $t
        }
        return $t;//devolvemos el array de objetos
    }




public function getPedidosPorCliente($c){
    $idCliente = $c;
    try{
        $consulta="SELECT id, id_pedido, id_empleado_empaqueta, id_empresa_transporte, fecha_pedido, fecha_envio, fecha_entrega, facturado, id_factura, fecha_factura, metodo_pago, pagado, fecha_pago, id_cliente, activo FROM pedidos WHERE id=?";
    
$query=$this->db->preparar($consulta);
$query->bindParam(1,$idCliente);
$query->execute();
$tPedidos=$query->fetchall();
}catch(Exception $e){
    $error=1;
    return $error;
}
$t=array();
foreach (tPedidos as $fila) {
    $fp=new Pedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13],$fila[14]);
    array_push($t, $fp);
}
return $t;
}
}
?>