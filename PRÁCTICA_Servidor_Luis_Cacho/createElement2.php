<?php
require '../classes/DB.php';
require '../classes/Element.php';

$element = new Element(); // Creo una instancia de la clase Element.
$data = [
    'campo1' => $_POST['campo1'] ?? null, // Obtengo los datos del formulario y evaluo que los resultados no sean null.
    'campo2' => $_POST['campo2'] ?? null
];

$id = $element->create($data); // Inserto el nuevo elemento en la base de datos.

$response = [
    'success' => true, // Siempre será true porque el método create no falla en esta implementación.
    'message' => 'Elemento creado correctamente',
    'data' => ['id' => $id] + $data // Devuelvo el ID y los datos creados.
];

echo json_encode($response); // Devuelvo la respuesta en formato JSON.
?>