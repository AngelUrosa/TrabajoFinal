<?php 

class DireccionCliente{


private $id;
private $idUsuario;
private $idCliente;
private $direccion;
private $codPostal;
private $localidad;
private $provincia;
private $pais;
private $activo;


	public function __construct($id, $idUsuario, $idCliente, $direccion, $codPostal, $localidad, $provincia, $pais, $activo)
	{
		$this->id = $id;
		$this->idUsuario = $idUsuario;
		$this->idCliente = $idCliente;
		$this->direccion = $direccion;
		$this->codPostal = $codPostal;
		$this->localidad = $localidad;
		$this->provincia = $provincia;
		$this->pais = $pais;
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

    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

  
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

   
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

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

   
    public function getPais()
    {
        return $this->pais;
    }


    public function setPais($pais)
    {
        $this->pais = $pais;

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