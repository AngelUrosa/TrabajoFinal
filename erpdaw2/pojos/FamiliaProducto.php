<?php 

class FamiliaProducto{



	private $id;
	private $idFamilia;
	private $nombre;
	private $descripcion;
	private $activo;


	public function __construct($id, $idFamilia, $nombre, $descripcion, $activo)
	{
		$this->id = $id;
		$this->idFamilia = $idFamilia;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
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

  
    public function getIdFamilia()
    {
        return $this->idFamilia;
    }

    public function setIdFamilia($idFamilia)
    {
        $this->idFamilia = $idFamilia;

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