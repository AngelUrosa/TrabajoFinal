<?php 	

class Incidencia{
    
    private $idIncidencia;
	private $idUbicacion;
    private $registradoPor;
    

    public function __construct($idIncidencia,$idUbicacion,$registradoPor)
    {
        $this->idIncidencia = $idIncidencia;
        $this->idUbicacion = $idUbicacion;
        $this->registradoPor = $registradoPor;
    }

    public function getIdIncidencia()
    {
        return $this->idIncidencia;
    }

    public function setIdIncidencia($idIncidencia)
    {
        $this->idIncidencia = $idIncidencia;

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

    public function getRegistradoPor()
    {
        return $this->registradoPor;
    }

    public function setRegistradoPor($registradoPor)
    {
        $this->registradoPor = $registradoPor;

        return $this;
    }
    
    
}

?>