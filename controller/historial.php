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
  <link rel="stylesheet" href="../view/css/main.css">
  <title>Historial</title>
</head>
<body>
  <?php
  
  $cliente = "Gaspar Morales";
  $arrayPedido = $pedido->listarPedido($cliente);

  $arrayDetPedido = $detPedido->listarDetallePedido($cliente);

  ?>
  <h1 class="h2 text-center my-5">Historial Pedido</h2>
  <div class="mx-auto my-3 p-2 bg-lista w-75 rounded shadow-lg">
    <table class="table">
    <?php
    if (!$arrayPedido) {
      echo "<h2 class='text-center'>No hay data</h2>";
    }else {
      include('../view/listaHeadPedido.html');
      $cont = 1;
      foreach ($arrayPedido as $row) {
        include('../view/listaContPedido.php');
        $cont++;
      }
    }
    ?>
    </table>
  </div>
  <h1 class="h2 text-center my-5">Historial Detalle Pedido</h2>
  <div class="mx-auto my-3 p-2 bg-lista w-75 rounded shadow-lg">
    <?php
    if (!$arrayDetPedido) {
      echo "<h2 class='text-center'>No hay data</h2>";
    }else {
      include('../view/listaHeadDetPedido.html');
      $cont = 1;
      foreach ($arrayDetPedido as $row) {
        include('../view/listaContDetPedido.php');
        $cont++;
      }
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>