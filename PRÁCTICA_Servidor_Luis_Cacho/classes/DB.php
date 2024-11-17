<?php

class DB
{
    private static $instance = null; // Esta variable estática para mantener una sola instancia de conexión.
    private $pdo; // Aquí guardo la conexión PDO.

    private function __construct()
    {
        // Cargo los datos de configuración desde el archivo database.php.
        $config = require __DIR__ . '/../config/database.php';
        // Creo el DSN para PDO y me conecto a la base de datos.
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
        try {
            // Aquí creo la conexión usando PDO.
            $this->pdo = new PDO($dsn, $config['username'], $config['password']);
            // Configuro PDO para que lance excepciones si hay errores.
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si ocurre un error, muestro un mensaje y detengo la ejecución.
            die("Error en la conexión: " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        // Aquí implemento un patrón Singleton para garantizar que solo haya una conexión activa.
        if (self::$instance === null) {
            self::$instance = new DB();
        }
        return self::$instance->pdo; // Devuelvo la instancia de PDO.
    }
}
?>