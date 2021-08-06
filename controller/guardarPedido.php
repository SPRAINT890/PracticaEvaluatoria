<?php
session_start();
include('../model/conexion.php');
include('../model/pedido.php');
include('../model/detallePedido.php');

$idvendedor         = '890';
$fecha              = date("Y-m-d");
$cliente            = $_SESSION['CustomerName'];

/*------------------------Pedido------------------------------*/
$pedido         = new Pedido;

$pedido->setCliente($cliente);
$pedido->setFecha($fecha);
$pedido->setIdvendedor($idvendedor);

/*------------------------Producto Uno------------------------*/

$productoUno    = new DetallePedido;

$productoUno->setProducto($_GET['productoUno']);
$productoUno->setCantidad($_GET['cantidadUno']);
$productoUno->setPrecioUnitario($_GET['precioUUno']);

/*------------------------Producto Dos------------------------*/

$productoDos    = new DetallePedido;

$productoDos->setProducto($_GET['productoDos']);
$productoDos->setCantidad($_GET['cantidadDos']);
$productoDos->setPrecioUnitario($_GET['precioUDos']);


/*------------------------Producto Tres------------------------*/

$productoTres   = new DetallePedido;

$productoTres->setProducto($_GET['productoTres']);
$productoTres->setCantidad($_GET['cantidadTres']);
$productoTres->setPrecioUnitario($_GET['precioUTres']);


/*------------------------Producto Cuatro-----------------------*/

$productoCuatro = new DetallePedido;

$productoCuatro->setProducto($_GET['productoCuatro']);
$productoCuatro->setCantidad($_GET['cantidadCuatro']);
$productoCuatro->setPrecioUnitario($_GET['precioUCuatro']);


/*------------------------Producto Cinco-----------------------*/

$productoCinco  = new DetallePedido;

$productoCinco->setProducto($_GET['productoCinco']);
$productoCinco->setCantidad($_GET['cantidadCinco']);
$productoCinco->setPrecioUnitario($_GET['precioUCinco']);

/*------------------------Producto Seis-----------------------*/

$productoSeis   = new DetallePedido;

$productoSeis->setProducto($_GET['productoSeis']);
$productoSeis->setCantidad($_GET['cantidadSeis']);
$productoSeis->setPrecioUnitario($_GET['precioUSeis']);

/*------------------------Llamado a funciones-----------------------*/

$obj[0] = $productoUno;
$obj[1] = $productoDos;
$obj[2] = $productoTres;
$obj[3] = $productoCuatro;
$obj[4] = $productoCinco;
$obj[5] = $productoSeis;

$monto = $pedido->calcularMonto($obj);
$idpedido = $pedido->insertPedido();


for ($i=0; $i < count($obj) ; $i++) { 
        if ($obj[$i]->getCantidad() > 0) {
                $obj[$i]->setIdpedido($idpedido);
                $obj[$i]->insertDetallePedido();
        }
}

echo "<script> alert('guardado correctamente" . '\n' . "su coste total es de: $" . $monto . "');
        location.href = 'tienda.php';
        </script>";
?>