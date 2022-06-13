<?php
// include '../models/Empleo.php';
class EmpleoController
{
    public function listarEmpleos()
    {
        $empleo = new Empleo();
        $respuestaContables = $empleo->listarContables();
        $respuestaLegales = $empleo->listarLegales();

        $retorno = array_merge($respuestaContables, $respuestaLegales);

        return $retorno;
    }

    public function verificarEmpleoDisponible($codigo)
    {
        $empleoDisponible = false;
        $empleo = new Empleo();
        $objEmpleo = $empleo->buscar($codigo);

        $personaEmpleada = new PersonaEmpleada();
        $cantidadPostulantes = $personaEmpleada->cantidadPostulantes($objEmpleo[0]['id']);

        if($cantidadPostulantes + 1 <= $objEmpleo[0]['limite_postulantes']) {
            $empleoDisponible = true;
        }

        return $empleoDisponible;
    }

    public function buscarPorId($id)
    {
        $empleo = new Empleo();
        $respuesta = $empleo->buscarPorId($id);

        return $respuesta;
    }

    public function buscarPorCodigo($codigo)
    {
        $empleo = new Empleo();
        $respuesta = $empleo->buscar($codigo);

        return $respuesta;
    }

    public function cargar($datos) {
        $empleo = new Empleo();
        $respuesta = $empleo->insertar($datos);

        return $respuesta;
    }
}
