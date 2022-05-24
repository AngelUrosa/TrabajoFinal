<?php 

class DireccionCliente
{
	private $id;
	private $idCliente;
	private $idUsuario;
	private $direccion;
	private $codpostal;
	private $localidad;
	private $pronvicia;
	private $pais;
	private $activo;


	public function __construct($id, $idCliente, $idUsuario, $direccion, $codpostal, $localidad, $pronvicia, $pais, $activo)
	{
		$this->id = $id;
		$this->idCliente = $idCliente;
		$this->idUsuario = $idUsuario;
		$this->direccion = $direccion;
		$this->codpostal = $codpostal;
		$this->localidad = $localidad;
		$this->pronvicia = $pronvicia;
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

    
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

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

    
    public function getDireccion()
    {
        return $this->direccion;
    }

    
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    
    public function getCodpostal()
    {
        return $this->codpostal;
    }

    
    public function setCodpostal($codpostal)
    {
        $this->codpostal = $codpostal;

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

   
    public function getPronvicia()
    {
        return $this->pronvicia;
    }

    
    public function setPronvicia($pronvicia)
    {
        $this->pronvicia = $pronvicia;

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