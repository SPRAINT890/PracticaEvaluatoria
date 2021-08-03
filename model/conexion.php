<?php
$usuario = 'root';
$contraseña = '';
$database = 'ejercicio_web';
$host = 'localhost';
try {
    $cn = new PDO("mysql:host=$host;dbname=$database", $usuario, $contraseña);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}