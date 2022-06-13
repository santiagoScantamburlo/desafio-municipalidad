<?php
class PersonaEmpleada {
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = new mysqli('localhost', 'root', '', 'sistema_empleos');
    }

    public function cantidadPostulantes($id) {
        $query = mysqli_query($this->db_connection, "SELECT COUNT(*) FROM persona_empleada WHERE id_empleo = $id");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta[0]['COUNT(*)'];
    }

    public function buscarPersonaEmpleada($id) {
        $query = mysqli_query($this->db_connection, "SELECT * FROM persona_empleada WHERE id_persona = $id");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $respuesta;
    }

    public function insertar($datos) {
        $query = mysqli_query($this->db_connection, "INSERT INTO persona_empleada (id_persona, id_empleo) VALUES (" . $datos['id'] . ", " . $datos['id_empleo'] . ")");
        $respuesta = mysqli_insert_id($this->db_connection);

        return $respuesta;
    }

    public function personasPorEmpleo($id) {
        $query = mysqli_query($this->db_connection, "SELECT * FROM personas INNER JOIN persona_empleada ON persona_empleada.id_persona WHERE persona_empleada.id_empleo = $id AND persona_empleada.id_persona = personas.id");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $respuesta;
    }
}