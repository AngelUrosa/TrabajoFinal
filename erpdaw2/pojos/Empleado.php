<?php 
class Empleado{
	private $id;
	private $idEmpleado;
	private $idUsuario;
    private $idDepartamento;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $nif;
	private $numCta;
	private $movil;
	private $direccion;
	private $localidad;
	private $codPostal;
	private $provincia;
	private $pais;
	private $rutaFoto;
	private $activo;



	public function __construct($id, $idEmpleado, $idUsuario, $idDepartamento, $nombre, $apellido1, $apellido2, $nif, $numCta, $movil, $direccion, $localidad, $codPostal, $provincia, $pais, $rutaFoto, $activo)
	{
		$this->id = $id;
		$this->idEmpleado = $idEmpleado;
		$this->idUsuario = $idUsuario;
        $this->idDepartamento = $idDepartamento;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->nif = $nif;
		$this->numCta = $numCta;
		$this->movil = $movil;
		$this->direccion = $direccion;
		$this->localidad = $localidad;
		$this->codPostal = $codPostal;
		$this->provincia = $provincia;
		$this->pais = $pais;
		$this->rutaFoto = $rutaFoto;
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


    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

   
    public function setIdDepartamenot($idDepartamento)
    {
        $this->id = $idDepartamento;

        return $this;
    }
    
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

   
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;

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

 
    public function getNumCta()
    {
        return $this->numCta;
    }

  
    public function setNumCta($numCta)
    {
        $this->numCta = $numCta;

        return $this;
    }

  
    public function getMovil()
    {
        return $this->movil;
    }

   
    public function setMovil($movil)
    {
        $this->movil = $movil;

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

 
    public function getLocalidad()
    {
        return $this->localidad;
    }


    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

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

    public function getRutaFoto()
    {
        return $this->rutaFoto;
    }

  
    public function setRutaFoto($rutaFoto)
    {
        $this->rutaFoto = $rutaFoto;

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