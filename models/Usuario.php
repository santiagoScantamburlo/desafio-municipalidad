<?php
class Usuario
{
    private $db_connection;

    public function listar() {
        $query = mysqli_query($this->db_connection, "SELECT * FROM personas");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $respuesta;
    }

    public function __construct()
    {
        $this->db_connection = new mysqli('localhost', 'root', '', 'sistema_empleos');
    }

    public function buscar($dni) {
        $query = mysqli_query($this->db_connection, "SELECT * FROM personas WHERE dni = $dni");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta;
    }

    public function insertar($datos) {
        mysqli_query($this->db_connection, "INSERT INTO personas (dni, nombre, apellido, genero, edad) VALUES (" . $datos['dni'] . ", '" . $datos['nombre'] . "', '" . $datos['apellido'] . "', '" . $datos['genero'] . "', ". $datos['edad'] . ")");
        $respuesta = mysqli_insert_id($this->db_connection);

        return $respuesta;
    }
}
