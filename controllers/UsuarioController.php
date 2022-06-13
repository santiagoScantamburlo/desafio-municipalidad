<?php
// include '../models/Usuario.php';
class UsuarioController
{

    public function listarUsuarios()
    {
        $usuario = new Usuario();
        $respuesta = $usuario->listar();

        return $respuesta;
    }

    public function buscarUsuario($dni)
    {
        $usuario = new Usuario();
        $respuesta = $usuario->buscar($dni);

        return $respuesta;
    }

    public function registrarUsuario($datos)
    {
        $usuario = new Usuario();
        $respuesta = $usuario->insertar($datos);

        return $respuesta;
    }

    public function inscriptoAnteriormente($datos)
    {
        $retorno = false;
        $personaEmpleada = new PersonaEmpleada();
        $empleo = new Empleo();

        $respuesta = $personaEmpleada->buscarPersonaEmpleada($datos['id']);

        if (count($respuesta) >= 2) {
            $retorno = false;
        } else if (count($respuesta) == 1) {
            $objEmpleo = $empleo->buscarPorId($respuesta[0]['id_empleo']);
            if ($objEmpleo[0]['categoria'] != $datos['categoria']) {
                $retorno = true;
            }
        } else {
            $retorno = true;
        }

        return $retorno;
    }
}
