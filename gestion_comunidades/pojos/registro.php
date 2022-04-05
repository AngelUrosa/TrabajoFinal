<?php 	

class Registro{
    
    private $idIncidencia;
	private $idEntrada;
	private $descripcion;
	private $idPersona;
	private $ts;
    

    public function __construct($idIncidencia,$idEntrada,$descripcion,$idPersona,$ts) 
    {
        $this->idIncidencia = $idIncidencia;
        $this->idEntrada = $idEntrada;
        $this->descripcion = $descripcion;
        $this->idPersona = $idPersona;
        $this->ts = $ts;
    }

    public function getIdIncidencia(){}
    {
        return $this->idIncidencia;
    }

    public function setIdIncidencia($idIncidencia)
    {
        $this->idIncidencia = $idIncidencia;

        return $this;
    }

    public function getIdEntrada()
    {
        return $this->idEntrada;
    }

    public function setIdEntrada($idEntrada)
    {
        $this->idEntrada = $idEntrada;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
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

    public function getTs()
    {
        return $this->ts;
    }

    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

}

?>