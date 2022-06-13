<?php
include '../models/Empleo.php';
include '../controllers/EmpleoController.php';
if (array_key_exists('message', $_GET)) {
    $message = $_GET['message'];
}

$empleoController = new EmpleoController();
$empleos = $empleoController->listarEmpleos();
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

    <?php if (isset($message)) { ?>
        <div class="alert alert-success" role="alert">
        <?php echo $message;
    }
        ?>
        <div class="container">
            <h1 class="text-center">Registro</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Formulario de Aplicacion</h5>
                    <form action="actions/registrar-persona.php" method="POST">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido">Apellido</label>
                            <input id="apellido" class="form-control" type="text" name="apellido">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dni">DNI</label>
                            <input id="dni" class="form-control" type="text" name="dni">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="genero">Género</label>
                            <select id="genero" class="form-control" name="genero">
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edad">Edad</label>
                            <input id="edad" class="form-control" type="text" name="edad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="empleo">Empleos</label>
                            <select id="empleo" class="form-control" name="empleo">
                                <?php
                                foreach ($empleos as $empleo) {
                                    echo "<option>{$empleo['codigo']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success col-md-4 mt-3" value="Postular">
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>