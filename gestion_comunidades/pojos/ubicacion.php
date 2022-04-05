<?php 	

class Ubicacion{
    
    private $idComunidad;
	private $idUbicacion;
	private $nombre;
	private $descripcion;
	private $foto;
    

    public function __construct($idComunidad,$idUbicacion,$nombre,$descripcion,$foto)
    {
        $this->idComunidad = $idComunidad;
        $this->idUbicacion = $idUbicacion;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->foto = $foto;
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

    public function getIdUbicacion()
    {
        return $this->idUbicacion;
    }

    public function setIdUbicacion($idUbicacion)
    {
        $this->idUbicacion = $idUbicacion;

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

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

}