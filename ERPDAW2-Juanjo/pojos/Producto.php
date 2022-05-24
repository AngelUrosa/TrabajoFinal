<?php 

class Producto
{
	
	private $id;
	private $idProducto;
	private $idFamilia;
	private $tipoIVA;
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


	public function __construct($id, $idProducto, $idFamilia, $tipoIVA, $precioCoste, $pvp, $descripcion, $codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo, $rutaFoto, $activo)
	{
		$this->id = $id;
		$this->idProducto = $idProducto;
		$this->idFamilia = $idFamilia;
		$this->tipoIVA = $tipoIVA;
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


    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

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

    
    public function getTipoIVA()
    {
        return $this->tipoIVA;
    }

    
    public function setTipoIVA($tipoIVA)
    {
        $this->tipoIVA = $tipoIVA;

        return $this;
    }

    
    public function getPrecioCoste()
    {
        return $this->precioCoste;
    }

    
    public function setPrecioCoste($precioCoste)
    {
        $this->precioCoste = $precioCoste;

        return $this;
    }

    
    public function getPvp()
    {
        return $this->pvp;
    }

    
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

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

    
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

    
    public function setCodigoBarras($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;

        return $this;
    }

    
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

     
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    
    public function getStockActual()
    {
        return $this->stockActual;
    }

    
    public function setStockActual($stockActual)
    {
        $this->stockActual = $stockActual;

        return $this;
    }

    
    public function getStockMinimo()
    {
        return $this->stockMinimo;
    }

    
    public function setStockMinimo($stockMinimo)
    {
        $this->stockMinimo = $stockMinimo;

        return $this;
    }

    
    public function getStockMaximo()
    {
        return $this->stockMaximo;
    }

    
    public function setStockMaximo($stockMaximo)
    {
        $this->stockMaximo = $stockMaximo;

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