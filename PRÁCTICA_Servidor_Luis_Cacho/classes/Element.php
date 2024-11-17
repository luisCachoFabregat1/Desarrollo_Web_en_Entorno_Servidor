<?php

class Element
{
    private $db; // Aquí guardaré la instancia de la conexión.

    public function __construct()
    {
        // Obtengo la conexión a la base de datos usando la clase DB.
        $this->db = DB::getInstance();
    }

    public function get($id = null)
    {
        // Este método sirve para obtener uno o todos los elementos.
        if ($id) {
            // Si recibo un ID, preparo la consulta para obtener solo ese elemento.
            $stmt = $this->db->prepare("SELECT * FROM elementos WHERE id = :id");
            $stmt->execute(['id' => $id]); // Ejecuto la consulta con el ID.
            return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelvo un solo resultado como array asociativo.
        } else {
            // Si no recibo ID, obtengo todos los elementos de la tabla.
            $stmt = $this->db->query("SELECT * FROM elementos");
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelvo todos los resultados como un array.
        }
    }

    public function delete($id)
    {
        // Este método elimina un elemento según el ID proporcionado.
        $stmt = $this->db->prepare("DELETE FROM elementos WHERE id = :id");
        $stmt->execute(['id' => $id]); // Ejecuto la consulta con el ID.
        return $stmt->rowCount(); // Devuelvo cuántas filas fueron afectadas.
    }

    public function create($data)
    {
        // Este método inserta un nuevo elemento en la base de datos.
        $stmt = $this->db->prepare("INSERT INTO elementos (campo1, campo2) VALUES (:campo1, :campo2)");
        $stmt->execute($data); // Uso los datos proporcionados para ejecutar la consulta.
        return $this->db->lastInsertId(); // Devuelvo el ID del elemento recién creado.
    }

    public function update($id, $data)
    {
        // Este método actualiza un elemento según su ID.
        $set = []; // Aquí construyo dinámicamente los campos a actualizar.
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key"; // Añado cada campo con su marcador.
        }
        $setString = implode(', ', $set); // Combino todos los campos para la consulta.
        $data['id'] = $id; // Añado el ID al array de datos.
        $stmt = $this->db->prepare("UPDATE elementos SET $setString WHERE id = :id");
        $stmt->execute($data); // Ejecuto la consulta con los datos proporcionados.
        return $stmt->rowCount(); // Devuelvo cuántas filas fueron afectadas.
    }
}
?>