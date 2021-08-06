<?php
class DetallePedido{
    private $id;
    private $idpedido;
    private $producto;
    private $cantidad;
    private $precioUnitario;

    public function insertDetallePedido(){
        $con = new Conexion;
        $sql = 'INSERT INTO detalle_pedido (id_pedido, producto, cantidad, precio_unitario) VALUES (?,?,?,?)';
        $query = $con->prepare($sql);

        $query->execute([
            $this->getIdpedido(), $this->getProducto(), $this->getCantidad(), $this->getPrecioUnitario() 
        ]);
    }

    public function listarDetallePedido($cliente){
        $con = new Conexion;
        $sql = 'SELECT d.id_pedido, p.cliente, d.producto, d.cantidad, d.precio_unitario, p.fecha
        FROM pedido p, detalle_pedido d 
        WHERE p.id_pedido=d.id_pedido AND p.cliente = "' . $cliente .'" and fecha BETWEEN DATE_SUB(NOW(), INTERVAL 15 DAY) AND NOW();';
        $consulta = $con->query($sql);
        if ($consulta->rowCount() > 0) {
            return $consulta;
        }else {
            return "No hay historial";
        }
    }

    public function getSubTotal(){
        $cantidad = $this->getCantidad();
        $precioUnitario = $this->getPrecioUnitario();
        return $cantidad * $precioUnitario;
    }

    /**
     * Getters
     */
    public function getId(){
        return $this->id;
    }
    public function getIdpedido(){
        return $this->idpedido;
    }
    public function getProducto(){
        return $this->producto;
    }
    public function getCantidad(){
        return $this->cantidad;
    }
    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }


    /**
     * Setter
     */
    public function setId($id): self{
        $this->id = $id;

        return $this;
    }
    public function setIdpedido($idpedido): self{
        $this->idpedido = $idpedido;

        return $this;
    }
    public function setProducto($producto): self{
        $this->producto = $producto;

        return $this;
    }
    public function setCantidad($cantidad): self{
        $this->cantidad = $cantidad;

        return $this;
    }
    public function setPrecioUnitario($precioUnitario): self{
        $this->precioUnitario = $precioUnitario;

        return $this;
    }
}
?>
