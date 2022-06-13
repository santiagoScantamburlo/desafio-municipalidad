<?php
// include '../models/PersonaEmpleada.php';
class PersonaEmpleadaController
{
    public function cargar($datos)
    {
        $personaEmpleada = new PersonaEmpleada();
        $empleo = new Empleo();
        $objEmpleo = $empleo->buscar($datos['empleo']);
        $datos['id_empleo'] = $objEmpleo[0]['id'];
        $respuesta = $personaEmpleada->insertar($datos);

        return $respuesta;
    }

    public function mostrarPersonasPorEmpleo($id) {
        $personaEmpleada = new PersonaEmpleada();
        $respuesta = $personaEmpleada->personasPorEmpleo($id);

        return $respuesta;
    }
}
