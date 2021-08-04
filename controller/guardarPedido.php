<?php
include('../model/conexion.php');
include('../model/pedido.php');
include('../model/detallePedido.php');

//datos del form
$vendedor       = $_GET['vendedor'];
$producto       = $_GET['producto'];
$cantidad       = $_GET['cantidad'];
$precioUnitario = $_GET['precioU'];

$fecha->date();
$cliente        = 'Gaspar Morales';

//declarar objetos
$pedido     = new Pedido;
$detPedido  = new DetallePedido;

//guardo datos del objeto pedido
$pedido->setCliente($cliente);
$pedido->setFecha($fecha);
$pedido->setIdvendedor($vendedor);

//guardo datos del objeto detpedido
$detPedido->setProducto($producto);
$detPedido->setCantidad($cantidad);
$detPedido->setPrecioUnitario($precioUnitario);

?>