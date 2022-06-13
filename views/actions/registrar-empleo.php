<?php
include '../../models/Empleo.php';
include '../../controllers/EmpleoController.php';

if (!isset($_POST['codigo'])) {
    header('Location: ../crear-empleo.php');
}

$empleoController = new EmpleoController();
$empleo = $empleoController->buscarPorCodigo($_POST['codigo']);

if (count($empleo) > 0) {
    header('Location: ../crear-empleo.php?message=' . urlencode('El código ya existe'));
    exit;
}

$idEmpleo = $empleoController->cargar($_POST);

if ($idEmpleo > 0) {
    header('Location: ../crear-empleo.php?message=' . urlencode('Empleo creado correctamente'));
    exit;
} else {
    header('Location: ../crear-empleo.php?message=' . urlencode('Error al crear el empleo'));
    exit;
}
