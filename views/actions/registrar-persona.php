<?php
include '../../models/Empleo.php';
include '../../models/PersonaEmpleada.php';
include '../../models/Usuario.php';
include '../../controllers/UsuarioController.php';
include '../../controllers/EmpleoController.php';
include '../../controllers/PersonaEmpleadaController.php';

$datos = $_POST;

if (isset($datos['dni'])) {
    $usuarioController = new UsuarioController();
    $respuesta = $usuarioController->buscarUsuario($datos['dni']);

    if (count($respuesta) == 0) {
        $idUsuario = $usuarioController->registrarUsuario($datos);
        if (!$idUsuario) {
            header('Location: ../index.php?message=' . urlencode('Error al registrar el usuario'));
            exit;
        }
        $datos['id'] = $idUsuario;
        postularUsuario($datos);
    } else {
        $datos['id'] = $respuesta[0]['id'];
        postularUsuario($datos);
    }
}

function postularUsuario($datos)
{
    $usuarioController = new UsuarioController();
    $empleoController = new EmpleoController();
    $validoParaInscripcion = $usuarioController->inscriptoAnteriormente($datos);
    $empleoDisponible = $empleoController->verificarEmpleoDisponible($datos['empleo']);

    if ($validoParaInscripcion && $empleoDisponible) {
        $personaEmpleadaController = new PersonaEmpleadaController();
        $respuesta = $personaEmpleadaController->cargar($datos);

        if($respuesta) {
            header('Location: ../index.php?message=' . urlencode('Se registró correctamente'));
            exit;
        } else {
            header('Location: ../index.php?message=' . urlencode('Error al registrar la persona'));
            exit;
        }
    }
    header('Location: ../index.php?message=' . urlencode('No se pudo inscribir'));
    exit;
}
