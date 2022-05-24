<?php

class Proveedor{
    private $id;
    private $idProveedor;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $nif;
    private $codPostal;
    private $localidad;
    private $provincia;
    private $activo;
    

    public function __construct($id, $idProveedor, $nombre, $apellido1, $apellido2, $nif, $codPostal, $localidad, $provincia, $activo)
    {
        $this->id = $id;
        $this->idProveedor = $idProveedor;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->nif = $nif;
        $this->codPostal = $codPostal;
        $this->localidad = $localidad;
        $this->provincia = $provincia;
        $this->activo = $activo;
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    public function getApellido1()
    {
        return $this->apellido1;
    }

    
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    
    public function getApellido2()
    {
        return $this->apellido2;
    }

    
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

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

    
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

   
    public function getLocalidad()
    {
        return $this->localidad;
    }

    
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    
    public function getProvincia()
    {
        return $this->provincia;
    }

    
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    
    public function getActivo()
    {
        return $this->activo;
    }

    
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }
}
?>