<?php

class DireccionesClientes{
    private static $instancia;
    private $bd;

    function __construct(){
        $this->bd = Conexion::singleton_conexion();

    }

    public static function singletonDireccionesClientes(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }
        return self::$instancia;

    }


    public function addDireccionCliente(DireccionCliente $f){
       try{
        $consulta="INSERT INTO direcciones_clientes (id, id_clientes, id_usuarios, direccion, cd_postal, localidad, provincia, pais, activo) VALUES (
            null,?,?,?,?,?,?,?,?)";

            $idCliente = $f->getIdCliente();
            $idUsuario=$f->getIdUsuario();
            $direccion=$f->getDireccion();
            $cdPostal=$f->getCodPostal();
            $localidad=$f->getLocalidad();
            $provincia=$f->getProvincia();
            $pais = $f->getPais();
            $activo = $f->getActivo();

            $query= $this->bd->preparar($consulta);
            $query->bindParam(1,$idCliente);
            $query->bindParam(2,$idUsuario);
			$query->bindParam(3,$direccion);
            $query->bindParam(4,$cdPostal);
			$query->bindParam(5,$localidad);
			$query->bindParam(6,$provincia);
            $query->bindParam(7,$pais);
			$query->bindParam(8,$activo);

            $query->execute();

            $insertado = true;
            
       } catch(Exception $ex){
           $insertado = false;
       }

       return $insertado;
    }



}



?>