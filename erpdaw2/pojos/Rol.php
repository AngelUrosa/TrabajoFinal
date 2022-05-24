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



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     *
     * @return self
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}



 ?>