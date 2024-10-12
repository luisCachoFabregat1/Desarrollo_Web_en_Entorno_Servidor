<?php
class Persona {
    protected $nombre;
    protected $apellido;
    protected $altura;
    protected $edad;

    public function __construct($nombre, $apellido, $altura, $edad) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->altura = $altura;
        $this->edad = $edad;
    }

    public function hablar() {
        return "Estoy hablando.";
    }

    public function caminar() {
        return "Estoy caminando.";
    }
}

class Informatico extends Persona {
    protected $lenguajes;
    protected $experienciaProgramador;

    public function __construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador) {
        parent::__construct($nombre, $apellido, $altura, $edad);
        $this->lenguajes = $lenguajes;
        $this->experienciaProgramador = $experienciaProgramador;
    }

    public function programar() {
        return "Estoy programando.";
    }

    public function repararOrdenador() {
        return "Estoy reparando un ordenador.";
    }

    public function hacerOfimatica() {
        return "Estoy haciendo ofimática.";
    }
}

class TecnicoRedes extends Informatico {
    private $auditarRedesExperiencia;

    public function __construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador, $auditarRedesExperiencia) {
        parent::__construct($nombre, $apellido, $altura, $edad, $lenguajes, $experienciaProgramador);
        $this->auditarRedesExperiencia = $auditarRedesExperiencia;
    }

    public function auditarRedes() {
        return "Estoy auditando redes.";
    }
}

$tecnico = new TecnicoRedes("Juan", "Pérez", 1.75, 30, "PHP, JavaScript", 5, 3);
echo $tecnico->hablar(); 
echo $tecnico->auditarRedes(); 
?>
