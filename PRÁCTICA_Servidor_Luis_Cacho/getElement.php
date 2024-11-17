<?php
require '../classes/DB.php';
require '../classes/Element.php';

$element = new Element(); // Creo una instancia de la clase Element.
$id = $_GET['id'] ?? null; // Obtengo el parámetro ID desde la URL, si existe.
$data = $id ? $element->get($id) : $element->get(); // Obtengo el elemento con ID o todos los elementos.

$response = [
    'success' => $data ? true : false, // Devuelvo true si hay datos, false si no.
    'message' => $data ? 'Elementos obtenidos correctamente' : 'No se encontraron elementos',
    'data' => $data // Añado los datos obtenidos al array de respuesta.
];

echo json_encode($response); // Devuelvo la respuesta en formato JSON.
?>