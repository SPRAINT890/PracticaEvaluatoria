<?php
class Pedido{
    private $idpedido;
    private $cliente;
    private $fecha;
    private $idvendedor;
    private $montoTotal;

    public function insertPedido(){
        $con = new Conexion;
        $sql = 'INSERT INTO pedido (cliente, fecha, id_vendedor, monto_total) VALUES (?,?,?,?)';
        $query = $con->prepare($sql);
        $query->execute([
            $this->getCliente(), $this->getFecha(), $this->getIdvendedor(), $this->getMontoTotal()
        ]);

        return $con->lastInsertId();
    }

    public function listarPedido($cliente){
        $con = new Conexion;
        $sql = 'SELECT cliente, fecha, monto_total, id_vendedor FROM pedido WHERE cliente = "' . $cliente . '";';
        $consulta = $con->query($sql);
        if ($consulta->fetchColumn() > 0) {
            foreach ($consulta as $row) {
                $data['cliente'] = $row['cliente'];
    
            }
            return $data;
        }else{
            return "no hay data";
        }
    }

    public function calcularMonto($data){
        $resultado = 0;
        for ($i=0; $i < count($data) ; $i++) { 
            $subtotal[$i] = $data[$i]->getSubTotal(); 
            $resultado += $subtotal[$i];
        }
        $this->setMontoTotal($resultado);
        return $resultado;
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
