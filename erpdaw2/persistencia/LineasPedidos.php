<?php

class LineasPedidos{

private static $instancia;
private $db;

function __construct(){
    $this->db = Conexion::singleton_conexion();
}

public static function singletonLineasPedidos(){
if(!isset(self::$instancia)){
    $miclase=__CLASS__;
    self::$instancia = new $miclase;
}
return self::$instancia;
}



public function addLineaPedido(LineaPedido $f){

    try{
        $consulta = "INSERT INTO(lineas_pedidos(id, id_pedido, id_producto, unidades, descripcion, pvp, tipo_iva, activo) VALUES( null,?,?,?,?,?,?,?) ";
        $idPedido = $f->getIdPedido();
        $idProductos= $f->getIdProducto();
        $unidades = $f->getUnidades();
        $descripcion = $f->getDescripcion();
        $pvp = $f->getPvp();
        $tipoIva = $f->getTipoIva();
        $activo = $f->getActivo();
        
        
        $query = $this->db->preparar($consulta);
        $query->bindParam(1,$idPedido);
        $query->bindParam(2,$idProductos);
        $query->bindParam(3,$unidades);
        $query->bindParam(4,$descripcion);
        $query->bindParam(5,$pvp);
        $query->bindParam(6,$tipoIva);
        $query->bindParam(7,$activo);
        

        $query->execute();
        $insertado = true;

    }catch(Exception $ex){
        $insertado = false;
    }
    return$insertado;
}

public function getLineasUnPedido( $idPedido){
try{
    $consulta= "SELECT id, id_pedido, id_producto, unidades, descripcion, pvp, tipo_iva, activo FROM lineas_pedidos where id_pedido=?";

        

$query =$this->db->preparar($consulta);
$query->bindParam(1,$idPedido);
$query ->execute();
$lPedidos = $query->fetchall();
$error=0;
}catch(Exception $e){
    $error=1;
    return $error;
}

$t = array();
foreach ($lPedidos as $fila) {
    $flp=new LineaPedido($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);
    array_push($t, $flp);
}
return $t;
}




}

?>