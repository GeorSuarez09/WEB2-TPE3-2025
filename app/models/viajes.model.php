<?php
class viajesModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=uber_viajes;charset=utf8', 'root', '');
    }

    function getViajes(){
        $query = $this->db->prepare('SELECT * FROM viaje');
        $query->execute();
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);

        return $viajes;
    }

    function getViajesById($ID_viaje){
        $query = $this->db->prepare('SELECT * FROM viaje WHERE ID_viaje = ?');
        $query->execute([$ID_viaje]);

        $viaje = $query->fetch(PDO::FETCH_OBJ);

        return $viaje;
    }

    public function getAllFilteredBy($campo, $valor) {
        $query = $this->db->prepare("SELECT * FROM viaje WHERE $campo = ?");
        $query->execute([$valor]);
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);

        return $viajes;
    }

    public function getAllOrderedBy($campo, $orden) {
        $query = $this->db->prepare("SELECT * FROM viaje ORDER BY $campo $orden");
        $query->execute();
        $viajes = $query->fetchAll(PDO::FETCH_OBJ);

        return $viajes;
}




    function agregarViaje($fecha, $origen, $destino, $ID_conductor, $ID_usuario){
        $query = $this->db->prepare('INSERT INTO viaje (fecha, origen, destino, ID_conductor, ID_usuario) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$fecha, $origen, $destino, $ID_conductor, $ID_usuario]);
        return $this->db->lastInsertId();
    }

    function editarViaje($fecha, $origen, $destino, $ID_conductor, $ID_usuario, $ID_viaje){
        $query = $this->db->prepare('UPDATE viaje SET fecha = ?, origen = ?, destino = ?, ID_conductor = ?, ID_usuario = ? WHERE ID_viaje = ?');
        return $query->execute([$fecha, $origen, $destino, $ID_conductor, $ID_usuario, $ID_viaje]);
    }

    function eliminarViaje($ID_viaje){
        $query = $this->db->prepare('DELETE FROM viaje WHERE ID_viaje = ?');
        $query->execute([$ID_viaje]);
    }
}