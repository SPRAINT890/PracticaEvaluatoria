<?php
class Pedido{
    private $idpedido;
    private $cliente;
    private $fecha;
    private $idvendedor;
    private $montoTotal;

    //metodos
    public function insertPedidio(){
        $sql = 'INSERT INTO pedido (cliente, fecha, id_vendedor, monto_total) VALUES (?,?,?,?)';
        $con = new Conexion;
        $query = $con->prepare($sql);
        $query->execute([
            $this->getCliente(), $this->getFecha(), $this->getIdvendedor(), $this->getMontoTotal()
        ]);

        return $con->lastInsertId();
    }

    public function calcularMonto(){

    }
    public function cantidadVentas($idvendedor){

    }

    /**
     * Getters
     */ 
    public function getIdpedido()
    {
        return $this->idpedido;
    }
    public function getCliente()
    {
        return $this->cliente;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getIdvendedor()
    {
        return $this->idvendedor;
    }
    public function getMontoTotal()
    {
        return $this->montoTotal;
    }

    /**
     * Setters
     */ 
    public function setIdpedido($idpedido)
    {
        $this->idpedido = $idpedido;

        return $this;
    }
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
    public function setIdvendedor($idvendedor)
    {
        $this->idvendedor = $idvendedor;

        return $this;
    }
    public function setMontoTotal($montoTotal)
    {
        $this->montoTotal = $montoTotal;

        return $this;
    }
}
