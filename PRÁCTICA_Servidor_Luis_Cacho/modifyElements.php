<?php
require '../classes/DB.php';
require '../classes/Element.php';

$element = new Element(); // Creo una instancia de la clase Element.
$id = $_GET['id'] ?? null; // Obtengo el ID desde la URL.

if ($id) {
    // Filtro los datos para excluir valores nulos o vacíos.
    $data = array_filter($_POST, fn($value) => $value !== null && $value !== '');
    $updated = $element->update($id, $data); // Actualizo el elemento con los datos filtrados.

    $response = [
        'success' => $updated > 0, // Devuelvo true si se actualizó algún registro.
        'message' => $updated > 0 ? 'Elemento actualizado correctamente' : 'Elemento no encontrado o sin cambios',
        'data' => $updated > 0 ? ['id' => $id] + $data : null
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