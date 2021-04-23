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

                <!-- modificación de ventas -->
                <div class="card">
                    <div class="card-header">
                        Modificar Venta
                    </div>

                    <div class="card-body">

                        <?php
                        $conexion = mysqli_connect("localhost", "root", "", "concesionario") or
                            die("Problemas con la conexión hacia la db.");
                        //verifica si  existen datos en la variable
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            //trae todos los id de la tabla autos
                            $consulta = "SELECT * FROM ventas WHERE id='$id'";
                            //la variable $ejectutar conecta y almacena los datos de $consulta
                            $ejecutar = mysqli_query($conexion, $consulta);
                             //array $reg guarda los datos
                            $reg = mysqli_fetch_array($ejecutar);
//varibales contienen los datos de los arrays $reg 
                            $venta_auto = $reg['id_auto'];
                            $venta_empleado = $reg['id_empleado'];
                            $venta_cliente = $reg['id_cliente'];
                            $venta_fecha = $reg['fecha'];
                            $venta_metodo_pago = $reg['id_metodo_pago'];
                            $venta_importe = $reg['importe'];
                        }
                        ?>
                        <form action="" method="post">
                             <!-- muestra los datos disponibles -->

                            <label for="exampleInputEmail1">Vehiculos Disponibles</label>
                            <select class="custom-select" name="id_auto">
                                <option disabled>Seleccione un Vehiculo:</option>
                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_auto = "SELECT * FROM autos";
                                $consulta_auto = mysqli_query($conexion, $tabla_auto) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_auto = mysqli_fetch_array($consulta_auto)) {
                                    $tabla_color = "SELECT id, color FROM color WHERE id='$consulta_array_auto[id_color]'";
                                    $consulta_color = mysqli_query($conexion, $tabla_color) or die("ERROR:" . mysqli_error($conexion));
                                    $data_color = mysqli_fetch_array($consulta_color);

                                    $tabla_marca = "SELECT id, marca FROM marca WHERE id='$consulta_array_auto[id_marca]'";
                                    $consulta_marca = mysqli_query($conexion, $tabla_marca) or die("ERROR:" . mysqli_error($conexion));
                                    $data_marca = mysqli_fetch_array($consulta_marca);

                                    $tabla_modelo = "SELECT id, modelo FROM modelo WHERE id='$consulta_array_auto[id_modelo]'";
                                    $consulta_modelo = mysqli_query($conexion, $tabla_modelo) or die("ERROR:" . mysqli_error($conexion));
                                    $data_modelo = mysqli_fetch_array($consulta_modelo);

                                    $tabla_tipo = "SELECT id, tipo_auto FROM tipo_auto WHERE id='$consulta_array_auto[id_tipo]'";
                                    $consulta_tipo = mysqli_query($conexion, $tabla_tipo) or die("ERROR:" . mysqli_error($conexion));
                                    $data_tipo = mysqli_fetch_array($consulta_tipo);

                                    if ($consulta_array_auto['id'] == $venta_auto) {
                                        echo '<option selected value="' . $consulta_array_auto['id'] . '">' . 'Marca: ' . $data_marca['marca'] . ' | ' . 'Tipo: ' . $data_tipo['tipo_auto'] . ' | ' . 'Modelo: ' . $data_modelo['modelo'] . ' | ' . 'Color: ' . $data_color['color'] . '</option>';
                                    } else {
                                        echo '<option selected value="' . $consulta_array_auto['id'] . '">' . 'Marca: ' . $data_marca['marca'] . ' | ' . 'Tipo: ' . $data_tipo['tipo_auto'] . ' | ' . 'Modelo: ' . $data_modelo['modelo'] . ' | ' . 'Color: ' . $data_color['color'] . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="exampleInputEmail1">Vendedor</label>
                            <select class="custom-select" name="id_empleado">
                                <option disabled>Seleccione un Vendedor:</option>
                                <?php
                                $tabla_empleado = "SELECT * FROM empleado";
                                $consulta_empleado = mysqli_query($conexion, $tabla_empleado) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_empleado = mysqli_fetch_array($consulta_empleado)) {

                                    if ($consulta_array_empleado['id'] == $venta_empleado) {
                                        echo '<option selected value="' . $consulta_array_empleado['id'] . '">' . $consulta_array_empleado['nombre'] . ' ' . $consulta_array_empleado['apellido'] . '</option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_empleado['id'] . '">' . $consulta_array_empleado['nombre'] . ' ' . $consulta_array_empleado['apellido'] . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <label for="exampleInputEmail1">Comprador</label>
                            <select class="custom-select" name="id_cliente">
                                <option disabled>Seleccione al Comprador:</option>
                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_cliente = "SELECT * FROM cliente";
                                $consulta_cliente = mysqli_query($conexion, $tabla_cliente) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_cliente = mysqli_fetch_array($consulta_cliente)) {

                                    if ($consulta_array_cliente == $venta_cliente) {
                                        echo '<option selected value="' . $consulta_array_cliente['id'] . '">' . $consulta_array_cliente['nombre'] . ' ' . $consulta_array_cliente['apellido'] . '</option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_cliente['id'] . '">' . $consulta_array_cliente['nombre'] . ' ' . $consulta_array_cliente['apellido'] . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de Compra:</label>
                                <input type="date" class="form-control" name="fecha" required value="<?php echo $venta_fecha ?>">
                            </div>

                            <br>

                            <label for="exampleInputEmail1">Metodo de Pago</label>
                            <select class="custom-select" name="id_metodo_pago">
                                <option disabled>Seleccione el Metodo de Pago:</option>
                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                $tabla_metodo_pago = "SELECT * FROM tipo_pago";
                                $consulta_metodo_pago = mysqli_query($conexion, $tabla_metodo_pago) or die("ERROR:" . mysqli_error($conexion));

                                while ($consulta_array_metodo_pago = mysqli_fetch_array($consulta_metodo_pago)) {
                                    if ($consulta_array_metodo_pago == $venta_metodo_pago) {
                                        echo '<option selected value="' . $consulta_array_metodo_pago['id'] . '">' . $consulta_array_metodo_pago['metodo_pago'] . '</option>';
                                    } else {
                                        echo '<option value="' . $consulta_array_metodo_pago['id'] . '">' . $consulta_array_metodo_pago['metodo_pago'] . '</option>';
                                    }
                                }
                                ?>
                            </select>

                            <br>
                            <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Importe Abonado</label>
                                <input type="text" class="form-control" name="importe" required value="<?php echo $venta_importe ?>">
                            </div>

                            <br>
                            <hr>
                            <br>
 <!-- boton para modificar  -->
                            <div class="text-right">
                                <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
                                 <!-- boton para cancelar y volver al indice de ventas  -->
                                <a href="ventas_index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
                            </div>
                        </form>

                        <?php
                          //si se envia algun valor tipo submit por $POST isset verifica si es true y luego if valida que contenga valores
                        if (isset($_POST['modificar'])) {
                            //guarda los valores en las variables $actualizar
                            $actualizar_venta_auto = $_POST['id_auto'];
                            $actualizar_venta_empleado = $_POST['id_empleado'];
                            $actualizar_venta_cliente = $_POST['id_cliente'];
                            $actualizar_venta_fecha = $_POST['fecha'];
                            $actualizar_venta_metodo_pago = $_POST['id_metodo_pago'];
                            $actualizar_venta_importe = $_POST['importe'];
  //actualiza los datos en la tabla ventas y los configura a su nuevo valor
                            $actualizar = "UPDATE ventas 
                            SET
                            id_auto='$actualizar_venta_auto',
                            id_empleado='$actualizar_venta_empleado',
                            id_cliente='$actualizar_venta_cliente',
                            fecha='$actualizar_venta_fecha',
                            id_metodo_pago='$actualizar_venta_metodo_pago',
                            importe='$actualizar_venta_importe'
                            WHERE id='$id'";

                            $ejecutar = mysqli_query($conexion, $actualizar);
                                 //verifica si  existen datos en la variable 
                            if ($ejecutar) {
                                 //te redirecciona al index de ventas
                                header('Location: ventas_index.php');
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