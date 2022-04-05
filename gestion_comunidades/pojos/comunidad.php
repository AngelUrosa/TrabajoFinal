<?php 	

class Comunidad{
    
    private $idComunidad;
	private $cif;
	private $presidente;
	private $cuota;
	private $direccion;
	private $cp;  


    public function __construct($idComunidad,$cif,$presidente,$cuota,$direccion,$cp)
    {
        $this->idComunidad = $idComunidad;
        $this->cif = $cif;
        $this->presidente = $presidente;
        $this->cuota = $cuota;
        $this->direccion = $direccion;
        $this->cp = $cp;
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

    public function getCif()
    {
        return $this->cif;
    }

    public function setCif($cif)
    {
        $this->cif = $cif;

        return $this;
    }

    public function getPresidente()
    {
        return $this->presidente;
    }

    public function setPresidente($presidente)
    {
        $this->presidente = $presidente;

        return $this;
    }

    public function getCuota()
    {
        return $this->cuota;
    }

    public function setCuota($cuota)
    {
        $this->cuota = $cuota;

        return $this;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

}

?>