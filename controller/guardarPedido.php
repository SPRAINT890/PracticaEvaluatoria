<?php
session_start();
$idpedido=$_SESSION['idpedido'];
include('../model/conexion.php');
include('../model/pedido.php');
include('../model/detallePedido.php');

//datos del form
$producto       = $_GET['producto'];
$cantidad       = $_GET['cantidad'];
$precioUnitario = $_GET['precioU'];
$vendedor       = '890';

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

//insertar datos en la tabla
if ($idpedido==null) {
  $pedido->calcularMonto();
  //$pedido->cantidadVentas();
  $idpedio = $pedido->insertPedido();
  $detPedido->setIdpedido($idpedido);
  $_SESSION['idpedido'] = $idpedio; 
}
echo "<script> alert('guardado correctamente');
        location.href = 'index.php';
        </script>";
?>