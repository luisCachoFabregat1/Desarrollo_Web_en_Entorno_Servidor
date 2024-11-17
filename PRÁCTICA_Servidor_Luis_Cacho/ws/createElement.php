<?php
require_once 'models/Element.php';

$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$numero_serie = $_POST['numero_serie'] ?? '';
$estado = $_POST['estado'] ?? '';
$prioridad = $_POST['prioridad'] ?? '';

$element = new Element($nombre, $descripcion, $numero_serie, $estado, $prioridad);

$file = 'elementos.txt';
$data = $element->toJson() . PHP_EOL;
file_put_contents($file, $data, FILE_APPEND);

echo $element->toJson();
?>