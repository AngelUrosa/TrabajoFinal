<?php


class Departamentos{
    private static $instancia;
    private $bd;

    function __construct(){
        $this->bd = Conexion::singleton_conexion();

    }

    public static function singletonDepartamentos(){
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
    return self::$instancia;

    }

    public function addDepartamento(Departamento $f){

        try{
            $consulta="INSERT INTO departamentos (id, id_departamentos, nombre, activo) VALUES (
                null,?,?,?)";
            $idDepartamento=$f->getIdDepartamento();
            $nombre =$f->getNombre();
            $activo = $f->getActivo();

            $query = $this->bd->preparar($consulta);
            $query->bindParam(1,$idDepartamento);
            $query->bindParam(2,$nombre);
			$query->bindParam(3,$activo);
            
            $query->execute();

            $insertado=true;

        }catch(Exception $ex){
            $insertado=false;
        }
        return $insertado;
    }





}


?>