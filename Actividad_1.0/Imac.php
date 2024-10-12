<?php
interface iMac {
    const MARCA = "Apple";

    public function getSoftware();
    public function setSoftware($software);
}

class Mac implements iMac {
    public $software;

    public function getSoftware() {
        return $this->software;
    }

    public function setSoftware($software) {
        $this->software = $software;
    }
}

$miMac = new Mac();
$miMac->setSoftware("macOS");
echo "Marca: " . iMac::MARCA . ", Software: " . $miMac->getSoftware();
?>
