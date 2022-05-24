<?php
class Proveedor{
	private $id;
	private $idProveedor;
	private $nombre;
	private $apellido1;
	private $apellido2;
	private $nif;
	private $codPostal;
	private $localidad;
	private $provincia;
	private $activo;


	
	public function __construct($id, $idProveedor, $nombre, $apellido1, $apellido2, $nif, $codPostal, $localidad, $provincia, $activo)
	{
		$this->id = $id;
		$this->idProveedor = $idProveedor;
		$this->nombre = $nombre;
		$this->apellido1 = $apellido1;
		$this->apellido2 = $apellido2;
		$this->nif = $nif;
		$this->codPostal = $codPostal;
		$this->localidad = $localidad;
		$this->provincia = $provincia;
		$this->activo = $activo;
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
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * @param mixed $idProveedor
     *
     * @return self
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

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

    /**
     * @return mixed
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * @param mixed $apellido1
     *
     * @return self
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * @param mixed $apellido2
     *
     * @return self
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     *
     * @return self
     */
    public function setNif($nif)
    {
        $this->nif = $nif;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * @param mixed $codPostal
     *
     * @return self
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * @param mixed $localidad
     *
     * @return self
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * @param mixed $provincia
     *
     * @return self
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $activo
     *
     * @return self
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }
}
?>