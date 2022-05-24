<?php

class Clientes{
    private static $instancia;
    private $db;

    function __construct(){
        $this ->db = conexion::singleton_conexion();
    }
    public static function singletonClientes(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }



    public function addUnCliente(Cliente $f){

        try{
            $consulta= "INSERT INTO clientes(id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo) VALUES( 
                null,?,?,?,?,?,?,?,?,?)";
                $idCliente=$f->getIdCliente();
                $idUsuario=$f->getIdUsuario();
                $nombre=$f->getNombre();
                $apellido1=$f->getApellido1();
                $apellido2=$f->getApellido2();
                $nif=$f->getNif();
                $numCta=$f->getNumCta();
                $comoNosConocio= $f->getComoNosConocio();
                $activo = $f->getActivo();
        
                $query=$this->db->preparar($consulta);
                $query ->bindParam(1,$idCliente);
                $query ->bindParam(2,$idUsuario);
                $query ->bindParam(3,$nombre);
                $query ->bindParam(4,$apellido1);
                $query ->bindParam(5,$apellido2);
                $query ->bindParam(6,$nif);
                $query ->bindParam(7,$numCta);
                $query ->bindParam(8,$comoNosConocio);
                $query ->bindParam(9,$activo);
                
                $query->execute();
                $insertado=true;
            } catch (Exception $e){
                $insertado = false;
            }

            return $insertado;

    }
	public function getClientesTodos(){
        //devuelve un array de objetos de FamiliaProducto
    
        try {
        //	$consulta="SELECT * FROM familias_productos";
            $consulta="SELECT id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo FROM clientes";
            $query=$this->db->preparar($consulta);
            $query->execute();
    
            $tClientes=$query->fetchall();//array bidimensional
            $error=0;
    
        } catch (Exception $e) {
             $error=1;//echo "se ha producido un error en getFamiliasProductosTodas";
            return $error;
        }
        //vamos a construir un array de objetos
        $t=array();
        foreach ($tClientes as $fila) {
            $fp=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]); //un objeto de la clase FamliaProdcuto
            array_push($t, $fp);//mete $fp en $t
        }
        return $t;//devolvemos el array de objetos
    }

    public function getClientePorNif($nif){
        try {
            $consulta="SELECT id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo FROM clientes where nif=?";
        
            $query=$this->db->preparar($consulta);
            $query->bindParam(1,$nif);
            $query->execute();
            $tClientes=$query->fetchall();

        } catch(Exception $e){
            $error=1;
            return $error;
        }

        $t=array();
        foreach ($tClientes as $fila) {
    
            $fc=new Cliente($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]);
            array_push($t, $fc);
        }
    
        return $t;
    }

	public function getClientePorNombreFA($nombre){
        try {
            $consulta="SELECT id, id_cliente, id_usuario, nombre, apellido1, apellido2, nif, numcta, como_nos_conocio, activo FROM clientes where nombre like ?";
        
            $query=$this->db->preparar($consulta);
            $query->bindParam(1,$nombre);
            $query->execute();
            $tClientes=$query->fetchall();

        } catch(Exception $e){
            $error=1;
            return $error;
        }
        return $tClientes;
    }

    public function borrarClientePorId($id){
        try {
            $consulta="DELETE FROM clientes where id = ?";
        
            $query=$this->db->preparar($consulta);
            $query->bindParam(1, $id);
            $query->execute();
            
            return $query->rowCount();

        } catch(Exception $e){
            $error=1;
            return $error;
        }
    }
}

?>
