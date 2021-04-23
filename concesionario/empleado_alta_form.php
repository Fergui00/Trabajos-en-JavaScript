<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concecionaria de Autos 0km</title>

    <!-- link de bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- navegador  con bootstrap -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="index.php">INICIO</a>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav nav-tabs">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Especificaciones de Autos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nombre_autos_index.php">Nombre</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tipos_autos_index.php">Tipos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="marca_autos_index.php">Marcas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="modelo_autos_index.php">Modelos</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="color_autos_index.php">Colores</a>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="autos_index.php">ABM Autos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="empleado_index.php">ABM Empleados</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="cliente_index.php">ABM Clientes</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ventas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="ventas_index.php">ABM Ventas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tipo_pago_index.php">Tipos de Pagos</a>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
</head>

<!-- imagen del body -->

<body style="background-image: url(background.jpg);">

    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col">

                <!-- alta de empleado -->
                <div class="card">
                    <div class="card-header">
                        Agregar Empleado
                    </div>

                    <div class="card-body">

                        <form action="" method="post">
                            <!-- ingreso el nombre -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese el Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                            <!-- ingreso el apellido -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese el Apellido</label>
                                <input type="text" class="form-control" name="apellido" required>
                            </div>
                            <!-- ingreso el email -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese el Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <!-- ingreso el telefono -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ingrese el Telefono</label>
                                <input type="text" class="form-control" name="telefono" required>
                            </div>

                            <div class="text-right">
                                <!-- boton para registrar  -->
                                <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
                                <!-- boton para cancelar y volver al indice de empleado -->
                                <a href="empleado_index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </div>
                        </form>

                        <?php
                        //si se envia algun valor tipo submit por $POST isset verifica si es true y luego if valida que contenga valores
                        if (isset($_POST['registrar'])) {

                            $conexion = mysqli_connect("localhost", "root", "", "concesionario") or
                                die("Problemas con la conexión hacia la db.");
                            //guarda los valores en las variables 
                            $nombre = $_POST['nombre'];
                            $apellido = $_POST['apellido'];
                            $email = $_POST['email'];
                            $telefono = $_POST['telefono'];
                            //se almacena la informacion que inserta en la tabla empleado en la varibale ejecutar 

                            $ejecutar = mysqli_query($conexion, "INSERT into empleado(id, nombre, apellido, email, telefono) values 
                       ('', '" . $nombre . "', '" . $apellido . "', '" . $email . "', '" . $telefono . "')")
                                or die("Problemas en el select" . mysqli_error($conexion));

                            //verifica si  existen datos en la variable 
                            if ($ejecutar) {
                                //te redirecciona al index de autos
                                header('Location: empleado_index.php');
                                exit;
                            }
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
ob_end_flush();
?>