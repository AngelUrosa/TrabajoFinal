<?php

class Empleados{
    private static $instancia;
    private $db;

function __construct(){
    $this->db = Conexion::singleton_conexion();

}

public static function singletonEmpleados(){
    if(!isset(self::$instancia)){
        $miclase = __CLASS__;
        self::$instancia = new $miclase;
    }
    return self::$instancia;
}
/*
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
*/


public function addEmpleado(Empleado $f){
    try{
        $consulta= "INSERT INTO empleados(id, id_empleado, id_departamento, id_usuario,
         nombre, apellido1, apellido2, nif, numcta, movil, direccion, localidad, cod_postal, provincia, pais, ruta_foto, activo) VALUES (
            null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";    

$idEmpleado=$f->getIdEmpleado();
$idDepartamento=$f->getId();
$idUsuario=$f->getIdUsuario();
$nombre=$f->getNombre();
$apellido1=$f->getApellido1();
$apellido2=$f->getApellido2();
$nif=$f->getNif();
$numCta=$f->getNumCta();
$movil=$f->getMovil();
$direccion=$f->getDireccion();
$localidad=$f->getLocalidad();
$codPostal=$f->getCodPostal();
$provincia=$f->getProvincia();
$pais=$f->getPais();
$rutaFoto=$f->getRutaFoto();
$activo=$f->getActivo();

$query=$this->db->preparar($consulta);
$query->bindParam(1,$idEmpleado);
$query->bindParam(2,$idDepartamento);
$query->bindParam(3,$idUsuario);
$query->bindParam(4,$nombre);
$query->bindParam(5,$apellido1);
$query->bindParam(6,$apellido2);
$query->bindParam(7,$nif);
$query->bindParam(8,$numCta);
$query->bindParam(9,$movil);
$query->bindParam(10,$direccion);
$query->bindParam(11,$localidad);
$query->bindParam(12,$codPostal);
$query->bindParam(13,$provincia);
$query->bindParam(14,$pais);
$query->bindParam(15,$rutaFoto);
$query->bindParam(16,$activo);

$query->execute(); 

$insertado=true;


}catch(Exception $ex){
    $insertado = false;
}

return $insertado;
}
}




?>