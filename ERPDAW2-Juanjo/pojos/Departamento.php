<?php 

class Departamento
{
	private $id;
	private $idDepartamento;
	private $nombre;
	private $activo;


	
	public function __construct($id, $idDepartamento, $nombre, $activo)
	{
		$this->id = $id;
		$this->idDepartamento = $idDepartamento;
		$this->nombre = $nombre;
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

    
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

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