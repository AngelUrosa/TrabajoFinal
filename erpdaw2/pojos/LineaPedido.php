<?php 
	class LineaPedido {

		private $id;
		private $idPedido;
		private $idProducto;
		private $unidades;
		private $descripcion;
		private $pvp;
		private $tipoIva;
		private $activo;





	public function __construct($id, $idPedido, $idProducto, $unidades, $descripcion, $pvp, $tipoIva, $activo)
	{
		$this->id = $id;
		$this->idPedido = $idPedido;
		$this->idProducto = $idProducto;
		$this->unidades = $unidades;
		$this->descripcion = $descripcion;
		$this->pvp = $pvp;
		$this->tipoIva = $tipoIva;
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
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * @param mixed $idPedido
     *
     * @return self
     */
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     *
     * @return self
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * @param mixed $unidades
     *
     * @return self
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPvp()
    {
        return $this->pvp;
    }

    /**
     * @param mixed $pvp
     *
     * @return self
     */
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoIva()
    {
        return $this->tipoIva;
    }

    /**
     * @param mixed $tipoIva
     *
     * @return self
     */
    public function setTipoIva($tipoIva)
    {
        $this->tipoIva = $tipoIva;

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