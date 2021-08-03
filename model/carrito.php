<?php
class carrito extends producto{
    private $pUnitario;
    private $cantidad;
    
    public function subtotal(){
        $cantidad = $this -> cantidad;
        $pUnitario = $this -> pUnitario;
        return $cantidad * $pUnitario;

    }

    private function set_pUnitario($pUnitario){
        $this -> pUnitario = $pUnitario;
    }
    private function get_pUnitario(){
        return $this -> pUnitario;
    }

    private function set_cantidad($cantidad){
        $this -> cantidad = $cantidad;
    }
    private function get_cantidad(){
        return $this -> cantidad;
    }
}
$carrito = new carrito();
?>
