<?php
class producto{
    private $pUnitario;
    
    private function set_pUnitario($pUnitario){
        $this -> pUnitario = $pUnitario;
    }
    private function get_pUnitario(){
        return $this -> pUnitario;
    }
}
