<?php

class Usuarios{
    private static $instancia;
    private $bd;

    function __construct() {
        $this->bd = Conexion::singleton_conexion();
    }

    public static function singletonUsuarios(){
        if (!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }
        return self::$instancia; //this->$instancia

    }

    public function addUsuario(Usuario $f){

        try{
            $consulta="INSERT INTO usuarios (id, id_usuario, id_rol, login, password, activo) VALUES (
				null,?,?,?,?,?)";
            
             $idUsuario=$f->getIdUsuario();
             $idRol=$f->getIdRol();
             $login=$f->getLogin();
             $password=$f->getPassword();
             $activo=$f->getActivo();

             $query=$this->bd->preparar($consulta);
             $query->bindParam(1,$idUsuario);
             $query->bindParam(2,$idRol);
             $query->bindParam(3,$login);
             $query->bindParam(4,$password);
             $query->bindParam(5,$activo);

             $query->execute();

             $insertado=true;
        }catch(Exception $ex){
            $insertado = false;
        }
        return $insertado;


    }

}
?>