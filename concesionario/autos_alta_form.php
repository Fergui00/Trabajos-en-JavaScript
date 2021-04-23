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

                <!-- alta de autos -->

                <div class="card">
                    <div class="card-header">
                        Agregar Auto
                    </div>

                    <div class="card-body">

                        <form action="" method="post">
                            <!-- ingreso del valor -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor</label>
                                <input type="text" class="form-control" name="valor" required>
                            </div>

                            <!-- ingreso del nombre -->
                            <label for="exampleInputEmail1">Nombres</label>
                            <select class="custom-select" name="id_nombre">
                                <option selected disabled>Seleccione un nombre:</option>
                                <?php
                                //conexion a la base de datos
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                //guarda el id y el nombre en la variable tabla_nombre
                                $tabla_nombre = "SELECT id, nombre FROM nombre ";
                                //consulta_nombre trae el resultado 
                                $consulta_nombre = mysqli_query($conexion, $tabla_nombre) or die("ERROR:" . mysqli_error($conexion));
                                //guarda la informacion en un array
                                while ($consulta_array_nombre = mysqli_fetch_array($consulta_nombre)) {
                                    //  muestra los datos y los concatena
                                    echo '<option value="' . $consulta_array_nombre['id'] . '">' . $consulta_array_nombre['nombre'] . '</option>';
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <!-- ingreso del color -->
                            <label for="exampleInputEmail1">Colores</label>
                            <select class="custom-select" name="id_color">
                                <option selected disabled>Seleccione un color:</option>
                                <?php
                               
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_color = "SELECT id, color FROM color";
                                $consulta_color = mysqli_query($conexion, $tabla_color) or die("ERROR:" . mysqli_error($conexion));

                               
                                while ($consulta_array_color = mysqli_fetch_array($consulta_color)) {
                                    echo '<option value="' . $consulta_array_color['id'] . '">' . $consulta_array_color['color'] . '</option>';
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="exampleInputEmail1">Marcas</label>
                            <select class="custom-select" name="id_marca">
                                <option selected disabled>Seleccione una marca:</option>
                                <?php
                                
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_marca = "SELECT id, marca FROM marca";
                                $consulta_marca = mysqli_query($conexion, $tabla_marca) or die("ERROR:" . mysqli_error($conexion));
                               
                                while ($consulta_array_marca = mysqli_fetch_array($consulta_marca)) {
                                    echo '<option value="' . $consulta_array_marca['id'] . '">' . $consulta_array_marca['marca'] . '</option>';
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="exampleInputEmail1">Modelos</label>
                            <select class="custom-select" name="id_modelo">
                                <option selected disabled>Seleccione un modelo:</option>
                                <?php
                               
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_modelo = "SELECT id, modelo FROM modelo";
                                $consulta_modelo = mysqli_query($conexion, $tabla_modelo) or die("ERROR:" . mysqli_error($conexion));
                                while ($consulta_array_modelo = mysqli_fetch_array($consulta_modelo)) {
                                    echo '<option value="' . $consulta_array_modelo['id'] . '">' . $consulta_array_modelo['modelo'] . '</option>';
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="exampleInputEmail1">Tipos</label>
                            <select class="custom-select" name="id_tipo">
                                <option selected disabled>Seleccione un tipo de auto:</option>
                                <?php
                                
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_tipos = "SELECT id, tipo_auto FROM tipo_auto";
                                $consulta_tipos = mysqli_query($conexion, $tabla_tipos) or die("ERROR:" . mysqli_error($conexion));
                                while ($consulta_array_tipos = mysqli_fetch_array($consulta_tipos)) {
                                    echo '<option value="' . $consulta_array_tipos['id'] . '">' . $consulta_array_tipos['tipo_auto'] . '</option>';
                                }
                                ?>
                            </select>

                            <hr>
                            <div class="text-right">
                                <!-- boton para registrar  -->
                                <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
                                <!-- boton para cancelar y volver al indice de autos -->
                                <a href="autos_index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </div>
                        </form>

                        <?php
                        //si se envia algun valor tipo submit por $POST isset verifica si es true y luego if valida que contenga valores
                        if (isset($_POST['registrar'])) {

                            $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                            //se almacena la informacion que inserta en la tabla autos en la varibale ejecutar 
                            $ejecutar = mysqli_query($conexion, "INSERT INTO autos(valor,id_color,id_marca,id_modelo,id_tipo,id_nombre) values ('$_POST[valor]','$_POST[id_color]', '$_POST[id_marca]','$_POST[id_modelo]','$_POST[id_tipo]','$_POST[id_nombre]')") or die("Problemas en el select" . mysqli_error($conexion));
                            //verifica si  existen datos en la variable  
                            if ($ejecutar) {
                                //te redirecciona al index de autos
                                header('Location: autos_index.php');
                                exit;
                            }
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- script de bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
ob_end_flush();
?>