<?php

class Proveedores{
	private static $instancia;
    private $db;

    function __construct (){
        $this ->db = conexion::singleton_conexion();
    }
    public static function singletonProveedores(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
public function addUnProveedor(Proveedor $f){
	try{
		$consulta= "INSERT INTO proveedores(id, id_proveedor, nombre, apellido1, apellido2, nif, cod_postal, localidad, provincia, activo) VALUES( 
                null,?,?,?,?,?,?,?,?,?)";
                $idProveedor = $f->getIdProveedor();
                $nombre=$f->getNombre();
                $apellido1=$f->getApellido1();
                $apellido2=$f->getApellido2();
                $nif=$f->getNif();
                $codPostal=$f->getCodPostal();
                $localidad= $f->getLocalidad();
                $provincia=$f->getProvincia();
                $activo=$f->getActivo();

                $query=$this->db->preparar($consulta);
                $query ->bindParam(1,$idProveedor);
                $query ->bindParam(2,$nombre);
                $query ->bindParam(3,$apellido1);
                $query ->bindParam(4,$apellido2);
                $query ->bindParam(5,$nif);
                $query ->bindParam(6,$codPostal);
                $query ->bindParam(7,$localidad);
                $query ->bindParam(8,$provincia);
                $query ->bindParam(9,$activo);

                $query->execute();
                $insertado=1;

	}catch(Exception $e){
		$insertado = 0;

	}
	return $insertado;
}

public function getProveedoresTodos(){
	try{
		$consulta="SELECT id, id_proveedor, nombre, apellido1, apellido2, nif, cod_postal, localidad, provincia, activo FROM proveedores";
		$query= $this->db->preparar($consulta);
		$query->execute();

		$tProveedores=$query->fetchall();
		$error=0;
	}catch(Exception $e){
		$error=1;
		return $error;
	}

	$t=array();
	foreach ($tProveedores as $fila) {
		$fp=new Proveedor($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5],$fila[6],$fila[7],$fila[8],$fila[9]);

		array_push($t, $fp);
	}
	return $t;
}

public function getIdUltimoSegunCp(String $cp){
	$codPostal=$cp;
	try {
		$consulta="SELECT id FROM proveedores WHERE cod_postal= ? ORDER BY id ASC ";

		$query=$this->db->preparar($consulta);
        $query ->bindParam(1,$codPostal);

        $query->execute();
        $ilod=$query->fetchall();
        
	} catch (Exception $e) {	
	}
//devuelve un array con otro array dentro, por lo que tenemos que sacar el array de dentro de eso.

$ar=end($ilod);

$definitivo=end($galleta);
var_dump($definitivo);
	//$ultimo=end($ilod['id']);
	
return $definitivo;

}



function verificardni($dni){
  $letra = substr($dni, -1);
  $numeros = substr($dni, 0, -1);
  $valido;
  if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
    $valido=true;
  }else{
    $valido=false;
  }
}

}
?>