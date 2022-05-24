<?php 

class LineaPedido{
private $id;
private $idPedido;
private $idProducto;
private $unidades;
private $descripcion;
private $pvp;
private $tipoIVA;
private $activo;


	
	public function __construct($id, $idPedido, $idProducto, $unidades, $descripcion, $pvp, $tipoIVA, $activo)
	{
		$this->id = $id;
		$this->idPedido = $idPedido;
		$this->idProducto = $idProducto;
		$this->unidades = $unidades;
		$this->descripcion = $descripcion;
		$this->pvp = $pvp;
		$this->tipoIVA = $tipoIVA;
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

    
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

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

    public function getUnidades()
    {
        return $this->unidades;
    }

    
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

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

    
    public function getPvp()
    {
        return $this->pvp;
    }

    
    public function setPvp($pvp)
    {
        $this->pvp = $pvp;

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
