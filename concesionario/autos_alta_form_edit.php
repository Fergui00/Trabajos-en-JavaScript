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

                <!-- modificación de autos -->


                <div class="card">
                    <div class="card-header">
                        Modificar Auto
                    </div>

                    <div class="card-body">

                        <?php
                        //conecta a la base de datos concesionario
                        $conexion = mysqli_connect("localhost", "root", "", "concesionario") or
                            die("Problemas con la conexión hacia la db.");

                        //verifica si  existen datos en la variable  
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            //trae todos los id de la tabla autos
                            $consulta = "SELECT * FROM autos WHERE id='$id'";
                            //la variable $ejectutar conecta y almacena los datos de $consulta
                            $ejecutar = mysqli_query($conexion, $consulta);
                            //array $reg guarda los datos
                            $reg = mysqli_fetch_array($ejecutar);
                            //varibales contienen los datos de los arrays $reg 
                            $auto_valor = $reg['valor'];
                            $auto_nombre = $reg['id_nombre'];
                            $auto_color = $reg['id_color'];
                            $auto_marca = $reg['id_marca'];
                            $auto_modelo = $reg['id_modelo'];
                            $auto_tipo = $reg['id_tipo'];
                        }
                        ?>
                        <form action="" method="post">

                            <!-- ingreso del valor abonado -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valor Abonado</label>
                                <input type="text" class="form-control" name="valor" required value="<?php echo $auto_valor ?>">
                            </div>

                            </select>
                            <!-- ingreso del Nombre -->
                            <label for="exampleInputEmail1">Nombre</label>
                            <select class="custom-select" name="id_nombre">
                                <option disabled>Seleccione un Nombre:</option>
                                <?php

                                //$tabla_nombre almacena todos los datos de la tabla nombre
                                $tabla_nombre = "SELECT * FROM nombre";
                                //consulta_nombre trae el resultado
                                $consulta_nombre = mysqli_query($conexion, $tabla_nombre) or die("ERROR:" . mysqli_error($conexion));
                                //guarda la informacion en un array
                                while ($consulta_array_nombre = mysqli_fetch_array($consulta_nombre)) {
                                    //pregunta si los datos del array son iguales al de la variable
                                    if ($consulta_array_nombre['id'] == $auto_nombre) {
                                        //si es true, muestra un select con los valores
                                        echo '<option selected value="' . $consulta_array_nombre['id'] . '">' . $consulta_array_nombre['nombre'] . ' </option>';
                                    } else {
                                        //sino  muestra los valores
                                        echo '<option value="' . $consulta_array_nombre['id'] . '">' . $consulta_array_nombre['nombre'] . ' </option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>

                            <label for="exampleInputEmail1">Color</label>
                            <select class="custom-select" name="id_color">
                                <option disabled>Seleccione un Color:</option>
                                <?php
                                $tabla_color = "SELECT * FROM color";
                                $consulta_color = mysqli_query($conexion, $tabla_color) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_color = mysqli_fetch_array($consulta_color)) {

                                    if ($consulta_array_color['id'] == $auto_color) {
                                        echo '<option selected value="' . $consulta_array_color['id'] . '">' . $consulta_array_color['color'] . ' </option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_color['id'] . '">' . $consulta_array_color['color'] . ' </option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>

                            <label for="exampleInputEmail1">Marca</label>
                            <select class="custom-select" name="id_marca">
                                <option disabled>Seleccione un Marca:</option>
                                <?php
                                $tabla_marca = "SELECT * FROM marca";
                                $consulta_marca = mysqli_query($conexion, $tabla_marca) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_marca = mysqli_fetch_array($consulta_marca)) {

                                    if ($consulta_array_marca['id'] == $auto_marca) {
                                        echo '<option selected value="' . $consulta_array_marca['id'] . '">' . $consulta_array_marca['marca'] . ' </option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_marca['id'] . '">' . $consulta_array_marca['marca'] . ' </option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>

                            <label for="exampleInputEmail1">Modelo</label>
                            <select class="custom-select" name="id_modelo">
                                <option disabled>Seleccione un Modelo:</option>
                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_modelo = "SELECT * FROM modelo";
                                $consulta_modelo = mysqli_query($conexion, $tabla_modelo) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_modelo = mysqli_fetch_array($consulta_modelo)) {
                                    if ($consulta_array_modelo == $auto_moelo) {
                                        echo '<option selected value="' . $consulta_array_modelo['id'] . '">' . $consulta_array_modelo['modelo'] . '</option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_modelo['id'] . '">' . $consulta_array_modelo['modelo'] . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>

                            <label for="exampleInputEmail1">Tipo</label>
                            <select class="custom-select" name="id_tipo">
                                <option disabled>Seleccione un Tipo de Auto:</option>
                                <?php
                                $tabla_tipo = "SELECT * FROM tipo_auto";
                                $consulta_tipo = mysqli_query($conexion, $tabla_tipo) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_tipo = mysqli_fetch_array($consulta_tipo)) {

                                    if ($consulta_array_tipo['id'] == $auto_tipo) {
                                        echo '<option selected value="' . $consulta_array_tipo['id'] . '">' . $consulta_array_tipo['tipo_auto'] . ' </option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_tipo['id'] . '">' . $consulta_array_tipo['tipo_auto'] . ' </option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>
                            <hr>
                            <br>

                            <div class="text-right">
                                <!-- boton para modificar  -->
                                <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
                                <!-- boton para cancelar y volver al indice de autos  -->
                                <a href="autos_index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </div>
                        </form>

                        <?php

                        //si se envia algun valor tipo submit por $POST isset verifica si es true y luego if valida que contenga valores

                        if (isset($_POST['modificar'])) {
                            //guarda los valores en las variables $actualizar
                            $actualizar_auto_valor = $_POST['valor'];
                            $actualizar_auto_nombre = $_POST['id_nombre'];
                            $actualizar_auto_color = $_POST['id_color'];
                            $actualizar_auto_marca = $_POST['id_marca'];
                            $actualizar_auto_modelo = $_POST['id_modelo'];
                            $actualizar_auto_tipo = $_POST['id_tipo'];
                            //actualiza los datos en la tabla autos y los configura a su nuevo valor
                            $actualizar = "UPDATE autos 
                            SET
                            valor='$actualizar_auto_valor',
                            id_nombre='$actualizar_auto_nombre',
                            id_color='$actualizar_auto_color',
                            id_marca='$actualizar_auto_marca',
                            id_modelo='$actualizar_auto_modelo',
                            id_tipo='$actualizar_auto_tipo'
                           
                            WHERE id='$id'";

                            //verifica si  existen datos en la variable  
                            $ejecutar = mysqli_query($conexion, $actualizar);
                            
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
<?php
ob_end_flush();
?>