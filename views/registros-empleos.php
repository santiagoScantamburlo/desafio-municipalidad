<?php
include '../models/Empleo.php';
include '../controllers/EmpleoController.php';

$empleoController = new EmpleoController();

$listaEmpleos = $empleoController->listarEmpleos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
        <h1 class="text-center">Empleos Registrados</h1>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Salario</th>
                    <th>Horas</th>
                    <th>Limite de postulantes</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaEmpleos as $empleo) {
                    echo "<tr>";
                    echo "<td>{$empleo['codigo']}</td>";
                    echo "<td>{$empleo['categoria']}</td>";
                    echo "<td>{$empleo['salario_basico']}</td>";
                    echo "<td>{$empleo['horas_trabajo']}</td>";
                    echo "<td>{$empleo['limite_postulantes']}</td>";

                ?>
                    <form action="detalle-empleo.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $empleo['id']; ?>">
                        <td><button type="submit" class="btn btn-primary"><i class="bi bi-arrow-up-right-square"></i></button></td>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>