<?php
include '../models/Empleo.php';
include '../models/PersonaEmpleada.php';
include '../models/Usuario.php';
include '../controllers/UsuarioController.php';
include '../controllers/EmpleoController.php';
include '../controllers/PersonaEmpleadaController.php';


if (!isset($_POST['id'])) {
    header('Location: ../index.php');
}

$personaEmpleadaController = new PersonaEmpleadaController();
$postulados = $personaEmpleadaController->mostrarPersonasPorEmpleo($_POST['id']);
$empleoController = new EmpleoController();
$empleo = $empleoController->buscarPorId($_POST['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <nav class="nav navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Formulario</a>
            <li class="nav-item">
                <a class="nav-link" href="registros-usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registros-empleos.php">Empleos</a>
            </li>
            <li class="nav-item">
                <a href="crear-empleo.php" class="nav-link">Cargar Empleo</a>
            </li>
        </div>
    </nav>

    <div class="container mt-3">
        <h1 class="text-center">Postulados <?php echo $empleo[0]['codigo']; ?></h1>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Género</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($postulados as $usuario) {
                    echo "<tr>";
                    echo "<td>{$usuario['dni']}</td>";
                    echo "<td>{$usuario['nombre']}</td>";
                    echo "<td>{$usuario['apellido']}</td>";
                    echo "<td>{$usuario['genero']}</td>";
                    echo "<td>{$usuario['edad']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>