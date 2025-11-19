<?php
require_once './app/models/viajes.model.php';

class viajesApiController {
    private $model;

    function __construct() {
        $this->model = new viajesModel();
    }

    function getViajes($req, $res) {
        if (isset($req->query->campo) && isset($req->query->valor)) {
        $campo = $req->query->campo;
        $valor = $req->query->valor;

        $viajes = $this->model->getAllFilteredBy($campo, $valor);
    } 

        else if (isset($req->query->campo) && isset($req->query->orden)) {
        $campo = $req->query->campo;   // ejemplo: fecha, origen, destino
        $orden = $req->query->orden;   // ejemplo: ASC o DESC

        $viajes = $this->model->getAllOrderedBy($campo, $orden);
    }else{
        $viajes = $this->model->getViajes();
        if (empty($viajes)) {
            return $res->json("No hay viajes registrados", 404);
        }
    }
        return $res->json($viajes);
    }

    function getViajesById($req, $res) {
        $idviaje = $req->params->id;  // CORREGIDO
        $viaje = $this->model->getViajesById($idviaje);
        if (!$viaje) {
            return $res->json("El viaje con el id=$idviaje no existe", 404);
        }
        return $res->json($viaje);
    }

    function insertViaje($req, $res) {
      
        if (empty($req->body->fecha) || empty($req->body->origen) || empty($req->body->destino) || empty($req->body->ID_conductor) || empty($req->body->ID_usuario)) {
            return $res->json('Faltan datos', 400);
        }

        $fecha = $req->body->fecha;
        $origen = $req->body->origen;
        $destino = $req->body->destino;
        $ID_conductor = $req->body->ID_conductor;
        $ID_usuario = $req->body->ID_usuario;

        $newViajeId = $this->model->agregarViaje($fecha, $origen, $destino, $ID_conductor, $ID_usuario);
        if ($newViajeId == false) {
            return $res->json('Error del servidor', 500);
        }

        $newViaje = $this->model->getViajesById($newViajeId);
        return $res->json($newViaje, 201);
    }

    function updateViaje($req, $res) {
        $idViaje = $req->params->id;
        $viaje = $this->model->getViajesById($idViaje);
        if (!$viaje) {
            return $res->json("El viaje con el id=$idViaje no existe", 404);
        }

        if (empty($req->body->fecha) || empty($req->body->origen) || empty($req->body->destino) || empty($req->body->ID_conductor) || empty($req->body->ID_usuario)) {
            return $res->json('Faltan datos', 400);
        }

        $fecha = $req->body->fecha;
        $origen = $req->body->origen;
        $destino = $req->body->destino;
        $ID_conductor = $req->body->ID_conductor;
        $ID_usuario = $req->body->ID_usuario;

        $this->model->editarViaje($idViaje, $fecha, $origen, $destino, $ID_conductor, $ID_usuario);
        $updatedViaje = $this->model->getViajesById($idViaje);
        return $res->json($updatedViaje, 200);
    }

    function deleteViaje($req, $res) {
        $idViaje = $req->params->id;
        $viaje = $this->model->getViajesById($idViaje);
        if (!$viaje) {
            return $res->json("El viaje con el id=$idViaje no existe", 404);
        }
        $this->model->eliminarViaje($idViaje);
        return $res->json("El viaje con el id=$idViaje se eliminó", 200);
    }
}

/**public function getAllFilterByFinished($finished = false) {
        $query = $this->db->prepare('SELECT * FROM tareas WHERE finalizada = ?');
        $query->execute([$finished]);
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }
 */