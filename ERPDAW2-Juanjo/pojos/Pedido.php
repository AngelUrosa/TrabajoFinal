<?php 

class Pedido{

	private $id;
    private $idPedido;
	private $idEmpleadoEmpaqueta;
	private $idEmpresaTransporte;
	private $fechaPedido;
	private $fechaEnvio;
	private $fechaEntrega;
	private $facturado;
	private $idFactura;
    private $fechaFactura;
	private $pagado;
	private $fechaPago;
	private $metodoPago;
	private $idCliente;
    private $activo;

	
	public function __construct($id, $idPedido, $idEmpleadoEmpaqueta, $idEmpresaTransporte, $fechaPedido, $fechaEnvio, $fechaEntrega, $facturado, $idFactura,$fechaFactura, $pagado, $fechaPago, $metodoPago, $idCliente, $activo)
	{
		$this->id = $id;
        $this->idPedido = $idPedido;
		$this->idEmpleadoEmpaqueta = $idEmpleadoEmpaqueta;
		$this->idEmpresaTransporte = $idEmpresaTransporte;
		$this->fechaPedido = $fechaPedido;
		$this->fechaEnvio = $fechaEnvio;
		$this->fechaEntrega = $fechaEntrega;
		$this->facturado = $facturado;
		$this->idFactura = $idFactura;
        $this->fechaFactura = $fechaFactura;
		$this->pagado = $pagado;
		$this->fechaPago = $fechaPago;
		$this->metodoPago = $metodoPago;
		$this->idCliente = $idCliente;
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

    
    public function getIdEmpleadoEmpaqueta()
    {
        return $this->idEmpleadoEmpaqueta;
    }

    
    public function setIdEmpleadoEmpaqueta($idEmpleadoEmpaqueta)
    {
        $this->idEmpleadoEmpaqueta = $idEmpleadoEmpaqueta;

        return $this;
    }

    
    public function getIdEmpresaTransporte()
    {
        return $this->idEmpresaTransporte;
    }

    
    public function setIdEmpresaTransporte($idEmpresaTransporte)
    {
        $this->idEmpresaTransporte = $idEmpresaTransporte;

        return $this;
    }

    
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }

    
    public function setFechaPedido($fechaPedido)
    {
        $this->fechaPedido = $fechaPedido;

        return $this;
    }

    
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    
    public function getFacturado()
    {
        return $this->facturado;
    }

    
    public function setFacturado($facturado)
    {
        $this->facturado = $facturado;

        return $this;
    }

    
    public function getIdFactura()
    {
        return $this->idFactura;
    }

    
    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    
    public function getPagado()
    {
        return $this->pagado;
    }

    
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    
    public function getMetodoPago()
    {
        return $this->metodoPago;
    }

    
    public function setMetodoPago($metodoPago)
    {
        $this->metodoPago = $metodoPago;

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

    
    public function getActivo()
    {
        return $this->activo;
    }

    
    public function setActivo($activo)
    {
        $this->activo = $activo;

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

    
    public function getFechaFactura()
    {
        return $this->fechaFactura;
    }

    
    public function setFechaFactura($fechaFactura)
    {
        $this->fechaFactura = $fechaFactura;

        return $this;
    }
}


 ?>