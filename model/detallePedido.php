<?php
class DetallePedido extends Conexion{
    private $id;
    private $idpedido;
    private $producto;
    private $cantidad;
    private $precioUnitario;

    public function insertDetallePedidio(){
        $sql = 'INSERT INTO detalle_pedido (id, id_pedido, producto, cantidad, precio_unitario) VALUES (?,?,?,?,?)';
        $con = new Conexion;
        $query = $con->prepare($sql);
        $query->execute([
            
        ]);
        
        return $con->lastInsertId();
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
