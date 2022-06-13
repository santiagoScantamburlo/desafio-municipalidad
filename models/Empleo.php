<?php
class Empleo
{
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = new mysqli('localhost', 'root', '', 'sistema_empleos');
    }

    public function listarContables()
    {
        $query = mysqli_query($this->db_connection, "SELECT * FROM empleos WHERE categoria = 'Contable'");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta;
    }

    public function listarLegales()
    {
        $query = mysqli_query($this->db_connection, "SELECT * FROM empleos WHERE categoria = 'Legal'");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta;
    }

    public function buscar($codigo)
    {
        $query = mysqli_query($this->db_connection, "SELECT * FROM empleos WHERE codigo = '$codigo'");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta;
    }

    public function buscarPorId($id)
    {
        $query = mysqli_query($this->db_connection, "SELECT * FROM empleos WHERE id = $id");
        $respuesta = mysqli_fetch_all($query, MYSQLI_ASSOC);
        return $respuesta;
    }

    public function insertar($datos)
    {
        mysqli_query($this->db_connection, "INSERT INTO empleos (codigo, categoria, descripcion, limite_postulantes, horas_trabajo, salario_basico) VALUES ('$datos[codigo]', '" . $datos['categoria'] . "', '" . $datos['descripcion'] . "', " . $datos['limite_postulantes'] . ", " . $datos['horas_trabajo'] . ", " . $datos['salario_basico'] . ")");
        $respuesta = mysqli_insert_id($this->db_connection);
        return $respuesta;
    }
}
