<?php
include '../models/Empleo.php';
include '../controllers/EmpleoController.php';
if (array_key_exists('message', $_GET)) {
    $message = $_GET['message'];
}
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
            <h1 class="text-center">Registro de Empleo</h1>
            <div class="card">
                <div class="card-body">
                    <form action="actions/registrar-empleo.php" method="POST">
                        <div class="form-group col-md-4">
                            <label for="codigo">Codigo</label>
                            <input id="codigo" class="form-control" type="text" name="codigo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" class="form-control" name="categoria">
                                <option>Legal</option>
                                <option>Contable</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="descripcion">Descripcion</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="salario_basico">Salario</label>
                            <input id="salario_basico" class="form-control" type="text" name="salario_basico">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="horas_trabajo">Horas</label>
                            <input id="horas_trabajo" class="form-control" type="text" name="horas_trabajo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="limite_postulantes">Límite de postulantes</label>
                            <input id="limite_postulantes" class="form-control" type="text" name="limite_postulantes">
                        </div>
                        <input type="submit" class="btn btn-success col-md-4 mt-3" value="Cargar">
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>