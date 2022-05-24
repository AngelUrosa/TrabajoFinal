<?php 
class Producto{

private $id;
private $idProducto;
private $idFamilia;
private $tipoIva;
private $precioCoste;
private $pvp;
private $descripcion;
private $codigoBarras;
private $idProveedor;
private $stockActual;
private $stockMinimo;
private $stockMaximo;
private $rutaFoto;
private $activo;



	public function __construct($id, $idProducto, $idFamilia, $tipoIva, $precioCoste, $pvp, $descripcion, $codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo, $rutaFoto, $activo)
	{
		$this->id = $id;
		$this->idProducto = $idProducto;
		$this->idFamilia = $idFamilia;
		$this->tipoIva = $tipoIva;
		$this->precioCoste = $precioCoste;
		$this->pvp = $pvp;
		$this->descripcion = $descripcion;
		$this->codigoBarras = $codigoBarras;
		$this->idProveedor = $idProveedor;
		$this->stockActual = $stockActual;
		$this->stockMinimo = $stockMinimo;
		$this->stockMaximo = $stockMaximo;
		$this->rutaFoto = $rutaFoto;
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
    public function getIdFamilia()
    {
        return $this->idFamilia;
    }

    /**
     * @param mixed $idFamilia
     *
     * @return self
     */
    public function setIdFamilia($idFamilia)
    {
        $this->idFamilia = $idFamilia;

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
    public function getPrecioCoste()
    {
        return $this->precioCoste;
    }

    /**
     * @param mixed $precioCoste
     *
     * @return self
     */
    public function setPrecioCoste($precioCoste)
    {
        $this->precioCoste = $precioCoste;

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
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    /**
     * @param mixed $codigoBarras
     *
     * @return self
     */
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;

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
    public function getStockActual()
    {
        return $this->stockActual;
    }

    /**
     * @param mixed $stockActual
     *
     * @return self
     */
    public function setStockActual($stockActual)
    {
        $this->stockActual = $stockActual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMinimo()
    {
        return $this->stockMinimo;
    }

    /**
     * @param mixed $stockMinimo
     *
     * @return self
     */
    public function setStockMinimo($stockMinimo)
    {
        $this->stockMinimo = $stockMinimo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStockMaximo()
    {
        return $this->stockMaximo;
    }

    /**
     * @param mixed $stockMaximo
     *
     * @return self
     */
    public function setStockMaximo($stockMaximo)
    {
        $this->stockMaximo = $stockMaximo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRutaFoto()
    {
        return $this->rutaFoto;
    }

    /**
     * @param mixed $rutaFoto
     *
     * @return self
     */
    public function setRutaFoto($rutaFoto)
    {
        $this->rutaFoto = $rutaFoto;

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