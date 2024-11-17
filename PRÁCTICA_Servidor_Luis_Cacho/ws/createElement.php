<?php
// Incluir el archivo de la clase Element para poder usarla
require_once __DIR__ . '/../models/Element.php';

// Obtener el cuerpo de la solicitud JSON enviada (usualmente POST o PUT)
$requestBody = file_get_contents('php://input');

// Decodificar el JSON en un array asociativo
$data = json_decode($requestBody, true);

// Validar los datos recibidos y asignar valores por defecto si faltan
// Si no se recibe un valor en el JSON, se asigna un valor vacío a las variables
$nombre = $data['nombre'] ?? '';        // Asigna el valor del 'nombre' o vacío si no existe
$descripcion = $data['descripcion'] ?? '';  // Asigna el valor de 'descripcion' o vacío si no existe
$numero_serie = $data['numero_serie'] ?? '';  // Asigna el valor de 'numero_serie' o vacío si no existe
$estado = $data['estado'] ?? '';            // Asigna el valor de 'estado' o vacío si no existe
$prioridad = $data['prioridad'] ?? '';      // Asigna el valor de 'prioridad' o vacío si no existe

// Crear un nuevo objeto de la clase Element con los datos recibidos
$element = new Element($nombre, $descripcion, $numero_serie, $estado, $prioridad);

// Definir la ruta del archivo donde se guardarán los datos
$file = __DIR__ . '/../data/elementos.txt'; // Ruta relativa al archivo de datos

// Convertir el objeto 'Element' a formato JSON y añadir un salto de línea al final
$jsonData = $element->toJson() . PHP_EOL;

// Guardar los datos JSON en el archivo especificado (agregando al final del archivo)
file_put_contents($file, $jsonData, FILE_APPEND);

// Establecer el tipo de contenido de la respuesta como JSON
header('Content-Type: application/json');

// Enviar el JSON del objeto Element como respuesta al cliente
echo $element->toJson();
?>
