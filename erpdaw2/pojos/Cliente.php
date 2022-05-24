<?php 
	class Cliente {
		private $id;
		private $idCliente;
		private $idUsuario;
		private $nombre;
		private $apellido1;
		private $apellido2;
		private $nif;
		private $numCta;
		private $comoNosConocio;
		private $activo;



	public function __construct($id, $idCliente, $idUsuario, $nombre, $apellido1, $apellido2, $nif, $numCta, $comoNosConocio, $activo)
	{
		$this->id = $id;
		$this->idCliente = $idCliente;
		$this->idUsuario = $idUsuario;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->nif = $nif;
		$this->numCta = $numCta;
		$this->comoNosConocio = $comoNosConocio;
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

   
    public function getComoNosConocio()
    {
        return $this->comoNosConocio;
    }

 
    public function setComoNosConocio($comoNosConocio)
    {
        $this->comoNosConocio = $comoNosConocio;

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