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


	
	public function __construct($id, $idPedido, $idEmpleadoEmpaqueta, $idEmpresaTransporte, $fechaPedido, $fechaEnvio, $fechaEntrega, $facturado, $idFactura, $fechaFactura, $pagado, $fechaPago, $metodoPago, $idCliente, $activo)
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
    public function getIdEmpleadoEmpaqueta()
    {
        return $this->idEmpleadoEmpaqueta;
    }

    /**
     * @param mixed $idEmpleadoEmpaqueta
     *
     * @return self
     */
    public function setIdEmpleadoEmpaqueta($idEmpleadoEmpaqueta)
    {
        $this->idEmpleadoEmpaqueta = $idEmpleadoEmpaqueta;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEmpresaTransporte()
    {
        return $this->idEmpresaTransporte;
    }

    /**
     * @param mixed $idEmpresaTransporte
     *
     * @return self
     */
    public function setIdEmpresaTransporte($idEmpresaTransporte)
    {
        $this->idEmpresaTransporte = $idEmpresaTransporte;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }

    /**
     * @param mixed $fechaPedido
     *
     * @return self
     */
    public function setFechaPedido($fechaPedido)
    {
        $this->fechaPedido = $fechaPedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * @param mixed $fechaEnvio
     *
     * @return self
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * @param mixed $fechaEntrega
     *
     * @return self
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacturado()
    {
        return $this->facturado;
    }

    /**
     * @param mixed $facturado
     *
     * @return self
     */
    public function setFacturado($facturado)
    {
        $this->facturado = $facturado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFactura()
    {
        return $this->idFactura;
    }

    /**
     * @param mixed $idFactura
     *
     * @return self
     */
    public function setIdFactura($idFactura)
    {
        $this->idFactura = $idFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaFactura()
    {
        return $this->fechaFactura;
    }

    /**
     * @param mixed $fechaFactura
     *
     * @return self
     */
    public function setFechaFactura($fechaFactura)
    {
        $this->fechaFactura = $fechaFactura;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     *
     * @return self
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * @param mixed $fechaPago
     *
     * @return self
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetodoPago()
    {
        return $this->metodoPago;
    }

    /**
     * @param mixed $metodoPago
     *
     * @return self
     */
    public function setMetodoPago($metodoPago)
    {
        $this->metodoPago = $metodoPago;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     *
     * @return self
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

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
