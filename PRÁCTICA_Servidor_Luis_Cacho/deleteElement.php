<?php
require '../classes/DB.php';
require '../classes/Element.php';

$element = new Element(); // Creo una instancia de la clase Element.
$id = $_GET['id'] ?? null; // Obtengo el parámetro ID desde la URL.

if ($id) {
    $deleted = $element->delete($id); // Intento eliminar el elemento con el ID proporcionado.
    $response = [
        'success' => $deleted > 0, // Devuelvo true si se eliminó algún registro.
        'message' => $deleted > 0 ? 'Elemento eliminado correctamente' : 'Elemento no encontrado',
        'data' => $deleted > 0 ? ['id' => $id] : null // Si se eliminó, incluyo el ID eliminado.
    ];
} else {
    // Si no hay ID en la URL, devuelvo un error.
    $response = [
        'success' => false,
        'message' => 'ID no proporcionado',
        'data' => null
    ];
}

echo json_encode($response); // Devuelvo la respuesta en formato JSON.
?>