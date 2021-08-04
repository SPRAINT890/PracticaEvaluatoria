<?php
include('../model/conexion.php');
include('../model/pedido.php');
include('../model/detallePedido.php');

//$productoDos        = $_GET['productoDos'];
//$cantidadDos        = $_GET['cantidadDos'];
//$precioUnitarioDos  = $_GET['precioUDos'];

//$productoTres       = $_GET['productoTres'];
//$cantidadTres       = $_GET['cantidadTres'];
//$precioUnitarioTres = $_GET['precioUTres'];

//$productoCuatro       = $_GET['productoCuatro'];
//$cantidadCuatro       = $_GET['cantidadCuatro'];
//$precioUnitarioCuatro = $_GET['precioUCuatro'];

//$productoCinco       = $_GET['productoCinco'];
//$cantidadCinco       = $_GET['cantidadCinco'];
//$precioUnitarioCinco = $_GET['precioUCinco'];

//$productoSeis       = $_GET['productoSeis'];
//$cantidadSeis       = $_GET['cantidadSeis'];
//$precioUnitarioSeis = $_GET['precioUSeis'];

$idvendedor         = '890';

$fecha              = date("Y-m-d");
$cliente            = 'Gaspar Morales';

//declarar objetos
$pedido         = new Pedido;

$pedido->setCliente($cliente);
$pedido->setFecha($fecha);
$pedido->setIdvendedor($idvendedor);

$productoUno    = new DetallePedido;

$productoUno->setProducto($_GET['productoUno']);
$productoUno->setCantidad($_GET['cantidadUno']);
$productoUno->setPrecioUnitario($_GET['precioUUno']);

/*
$productoDos    = new DetallePedido;
$productoTres   = new DetallePedido;
$productoCuatro = new DetallePedido;
$productoCinco  = new DetallePedido;
$productoSeis   = new DetallePedido;
*/
//guardo datos del objeto pedido


//guardo datos del objeto detpedido


/*
$productoDos->setProducto($productoDos);
$productoDos->setCantidad($cantidadDos);
$productoDos->setPrecioUnitario($precioUnitarioDos);

$productoTres->setProducto($productoTres);
$productoTres->setCantidad($cantidadTres);
$productoTres->setPrecioUnitario($precioUnitarioTres);

$productoCuatro->setProducto($productoCuatro);
$productoCuatro->setCantidad($cantidadCuatro);
$productoCuatro->setPrecioUnitario($precioUnitarioCuatro);

$productoCinco->setProducto($productoCinco);
$productoCinco->setCantidad($cantidadCinco);
$productoCinco->setPrecioUnitario($precioUnitarioCinco);

$productoSeis->setProducto($productoSeis);
$productoSeis->setCantidad($cantidadSeis);
$productoSeis->setPrecioUnitario($precioUnitarioSeis);
*/
$monto = $pedido->calcularMonto($productoUno);
$idpedido = $pedido->insertPedido();

$productoUno->setIdpedido($idpedido);

$productoUno->insertDetallePedido();

echo "<script> alert('guardado correctamente" . '\n' . "su coste total es de: $" . $monto . "');
        location.href = 'index.php';
        </script>";
?>