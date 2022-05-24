<?php

class LineasPedidos {
    private static $instancia;
    private $db;

    function __construct() {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonLineasPedidos(){
        if (!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }
        return self::$instancia; //this->$instancia

    }


    public function addUnaLineaPedido(LineaPedido $l){
        try {
            $consulta="INSERT INTO lineas_pedidos (id, id_pedido, id_producto, unidades, descripcion, pvp, tipo_iva, activo) VALUES (null,?,?,?,?,?,?,?)";
            $idPedido=$l->getIdPedido();
            $idProducto=$l->getIdProducto();
            $unidades =$l->getUnidades();
            $descripcion=$l->getDescripcion();
            $pvp =$l->getPvp();
            $tipoIVA =$l->getTipoIVA();
            $activo =$l->getActivo();

            $query=$this->db->preparar($consulta);
            @$query->bindParam(1,$l->getIdPedido());
            $query->bindParam(2,$idProducto);
            $query->bindParam(3,$unidades);
            $query->bindParam(4,$descripcion);
            $query->bindParam(5,$pvp);
            $query->bindParam(6,$tipoIVA);
            $query->bindParam(7,$activo);

            $query->execute(); 

            $insertado=true;
            
        } catch (Exception $e) {
            $insertado=false;	
        }
        return $insertado;
    }
    
    public function getLineasPedidos(){
        try {
            $consulta="SELECT * FROM lineas_pedidos";
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
            
            $fp=new LineaPedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7]);
            array_push($t,$fp);
        }
        return $t;

    }

    public function getLineasUnPedido($idPedido){
        try {
            $consulta="SELECT * FROM lineas_pedidos WHERE id_pedido = '$idPedido'";
            
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
            
            $fp=new LineaPedido($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7]);
            array_push($t,$fp);
        }
        return $t;

    }
}
?>