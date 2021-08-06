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
  include('../view/navBar.html');
  $cliente = "Gaspar Morales";
  $arrayPedido = $pedido->listarPedido($cliente);

  $arrayDetPedido = $detPedido->listarDetallePedido($cliente);

  ?>

  <h1 class="h2 text-center my-5">Historial Pedido</h2>
    <div class="mx-auto my-3 p-2 bg-lista w-75 rounded shadow-lg">
      <table class="table table-hover">
        <?php
        if ($arrayPedido == "No hay historial") {
          echo "<h2 class='text-center'>" . $arrayPedido . "</h2>";
        } else {
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
      <div class="mx-auto my-3 mb-5 p-2 bg-lista w-75 rounded shadow-lg">
        <table class="table table-hover">
          <?php
          if ($arrayDetPedido == "No hay historial") {
            echo "<h2 class='text-center'>" . $arrayDetPedido . "</h2>";
          } else {
            include('../view/listaHeadDetPedido.html');
            $cont = 1;
            foreach ($arrayDetPedido as $row) {
              include('../view/listaContDetPedido.php');
              $cont++;
            }
          }
          ?>
        </table>
      </div>

      <?php
      include('../view/footer.html');
      ?>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>