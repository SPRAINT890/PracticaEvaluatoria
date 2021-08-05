<?php
include('../model/conexion.php');
include('../model/pedido.php');
include('../model/detallePedido.php');

$pedido  = new Pedido;
$detPedido = new DetallePedido;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Historial</title>
</head>
<body>
  <?php
  
  $cliente = "Gaspar Morales";
  $arrayPedido[] = $pedido->listarPedido($cliente);


  $arrayDetPedido[] = $detPedido->listarDetallePedido($cliente);

  foreach ($arrayPedido as $row) {
    echo $row['cliente'];

  }
  echo "<br>";
  foreach ($arrayDetPedido as $row) {
    echo $row['cliente'];

  }

  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>