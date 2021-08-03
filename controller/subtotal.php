<?php
include('../model/conexion.php');
$cantidad = $_GET['cantidad'];
$pUnitario = $_GET['pUnitario'];
include('../model/producto.php');
include('../model/carrito.php');
$carrito -> subtotal();

?>