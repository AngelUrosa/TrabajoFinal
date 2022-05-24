<?php

class Productos{

    private static $instancia;
    private $db;
    function __construct(){
        $this->db = Conexion::singleton_conexion();

    }

    public static function singletonProductos(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
    return self::$instancia;
    }

public function addProducto(Producto $f){
    try{
        $consulta = "INSERT INTO productos(id, id_producto, id_familia, tipo_iva, precio_coste, pvp, descripcion, codigo_barras, id_proveedor, stock_actual, stock_minimo, stock_maximo, ruta_foto, activo)
         VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?)";

     $idProducto=$f->getIdProducto();
    $idFamilia=$f->getIdFamilia();
    $tipoIva=$f->getTipoIva();
    $precioCoste=$f->getPrecioCoste();
    $pvp=$f->getPvp();
    $descripcion=$f->getDescripcion();
    $codigoBarras=$f->getCodigoBarras();
    $idProveedor=$f->getIdProveedor();
    $stockActual=$f->getStockActual();
    $stockMinimo=$f->getStockMinimo();
    $stockMaximo=$f->getStockMaximo();
    $rutaFoto=$f->getRutaFoto();
    $activo=$f->getActivo();


    $query = $this->db->preparar($consulta);
    $query->bindParam(1,$idProducto);
    $query->bindParam(2,$idFamilia);
    $query->bindParam(3,$tipoIva);
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


    } catch(Exception $ex){
        $insertado = false;
    }

    return $insertado;
}


public function getUnIdProducto( $idProducto){
            try {
                $consulta="SELECT * FROM productos WHERE id = ?";
                $query = $this->db->preparar($consulta);
                $query = bindParam(1,$idProducto);
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
        $consulta ="SELECT ruta_foto FROM productos WHERE id_producto= ?";
        $query = $this->db->preparar($consulta);
        $query = bindParam(1,$idProducto);
        $query->execute();
        $tProductos= $query->fetchall();
        return $tProductos[0];
    } catch (Exception $e) {
        $error=0;
    }
    
}
public function getUltimoProductoFamilia($familia){
    try{
        $consulta= "SELECT id FROM familias_productos WHERE id_familia = '$familia'";
        $query = $this->db->preparar($consulta);
        $query->execute();
        $uProducto=$query->fetchall();

        $idProducto = intval(end($uProducto));
        return $idProducto;
    }catch (Exception $e){
        $error= 0;
        return $error;
    }

}
public function getProductosTodos(){
    try{
        $consulta="SELECT id, id_producto, id_familia, tipo_iva, precio_coste, pvp, descripcion, codigo_barras, id_proveedor, stock_actual, stock_minimo, stock_maximo, ruta_foto, activo FROM productos";
        $query= $this->db->preparar($consulta);
        $query->execute();
        $tProductos=$query->fetchall();
        $error=0;
    }catch(Exception $e){
        $error=1;
        return $error;
    }
    $t=array();
    foreach ($tProductos as $fila) {
        $fp=new Producto($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9],$fila[10],$fila[11],$fila[12],$fila[13]);
        array_push($t, $fp);
    }
    return $t;
}
}
