<?php 	

class Persona{

    private $idPersona;
	private $nif;
	private $idComunidad;
	private $usuario;
	private $contraseña;
	private $email;  
    private $trabajador;  

    public function __construct($idPersona,$nif,$idComunidad,$usuario,$contraseña,$email,$trabajador)
    {
        $this->idPersona = $idPersona;
        $this->nif = $nif;
        $this->idComunidad = $idComunidad;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->email = $email;
        $this->trabajador = $trabajador;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    public function getNif()
    {
        return $this->nif;
    }

    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    public function getIdComunidad()
    {
        return $this->idComunidad;
    }

    public function setIdComunidad($idComunidad)
    {
        $this->idComunidad = $idComunidad;

        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getContraseña()
    {
        return $this->contraseña;
    }

    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getTrabajador()
    {
        return $this->trabajador;
    }

    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;

        return $this;
    }


}

?>