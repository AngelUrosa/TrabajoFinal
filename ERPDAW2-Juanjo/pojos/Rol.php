<?php 

class Rol{
	private $id;
	private $idRol;
	private $nombre;


	
	public function __construct($id, $idRol, $nombre)
	{
		$this->id = $id;
		$this->idRol = $idRol;
		$this->nombre = $nombre;
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

    
    public function getIdRol()
    {
        return $this->idRol;
    }

    
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

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
}


 ?>