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

                <!-- lista de ventas -->
                <div class="card">
                    <div class="card-header">
                        Ventas Realizadas

                        <a href="ventas_alta_form.php">
                            <button type="button" class="btn btn-success float-right">Agregar Ventas</button>
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Auto</th>
                                    <th scope="col">Vendedor</th>
                                    <th scope="col">Comprador</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Metodo de Pago</th>
                                    <th scope="col">Importe</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                //guarda todos los datos de la tabla ventas en la variable $registros
                                $registros = mysqli_query($conexion, "SELECT * FROM ventas") or die("Problemas en el select:" . mysqli_error($conexion));
                                //guarda la informacion del array en la variable $reg
                                while ($reg =  mysqli_fetch_assoc($registros)) {

                                ?>
                                    <!-- muestra la informacion del array -->
                                    <td><?php echo $reg['id']; ?></td>

                                    <?php
                                    // variable $tabla_auto contiene el id y el nombre de la tabla autos donde compara si son iguales los datos
                                    $tabla_auto = "SELECT * FROM autos WHERE id='$reg[id_auto]'";
                                    $consulta_auto = mysqli_query($conexion, $tabla_auto) or die("ERROR:" . mysqli_error($conexion));
                                    $data_auto = mysqli_fetch_array($consulta_auto);

                                    $tabla_nombre = "SELECT * FROM nombre WHERE id='$data_auto[id_nombre]'";
                                    $consulta_nombre = mysqli_query($conexion, $tabla_nombre) or die("ERROR:" . mysqli_error($conexion));
                                    $data_nombre = mysqli_fetch_array($consulta_nombre);
                                    ?>
                                    <td><?php echo $data_nombre['nombre']; ?></td>

                                    <?php
                                    $tabla_empleado = "SELECT * FROM empleado WHERE id='$reg[id_empleado]'";
                                    $consulta_empleado = mysqli_query($conexion, $tabla_empleado) or die("ERROR:" . mysqli_error($conexion));

                                    $data_empleado = mysqli_fetch_array($consulta_empleado);
                                    ?>
                                    <td><?php echo $data_empleado['nombre']; ?></td>

                                    <?php
                                    $tabla_cliente = "SELECT * FROM cliente WHERE id='$reg[id_cliente]'";
                                    $consulta_cliente = mysqli_query($conexion, $tabla_cliente) or die("ERROR:" . mysqli_error($conexion));
                                    $data_cliente = mysqli_fetch_array($consulta_cliente);
                                    ?>
                                    <td><?php echo $data_cliente['nombre']; ?></td>

                                    <td><?php echo $reg['fecha']; ?></td>

                                    <?php
                                    $tabla_tipo_pago = "SELECT * FROM tipo_pago WHERE id='$reg[id_metodo_pago]'";
                                    $consulta_tipo_pago = mysqli_query($conexion, $tabla_tipo_pago) or die("ERROR:" . mysqli_error($conexion));
                                    $data_tipo_pago = mysqli_fetch_array($consulta_tipo_pago);
                                    ?>
                                    <td><?php echo $data_tipo_pago['metodo_pago']; ?></td>

                                    <td>$<?php echo $reg['importe']; ?></td>

                                    <td>
                                        <!-- boton para modificar  -->
                                        <a href="ventas_alta_form_edit.php?id=<?php echo $reg['id'] ?>"><button type="button" class="btn btn-info">Modificar</button></a>
                                        <!-- boton para cancelar y volver al indice de ventas -->
                                        <a href="ventas_index.php?borrar=<?php echo $reg['id'] ?>"><button type="button" name="borrar" class="btn btn-danger">Eliminar</button></a>

                                    </td>
                                    </tr>
                                <?php
                                }
                                //si se envia algun valor tipo submit por $POST isset verifica si es true y luego if valida que contenga valores
                                if (isset($_GET['borrar'])) {

                                    $borrar_id = $_GET['borrar'];

                                    $conexion = mysqli_connect("localhost", "root", "", "concesionario") or die("Problemas con la conexión hacia la db.");
                                    //se borra todos los datos en la tabla ventas
                                    $borrar = "DELETE FROM ventas WHERE id='$borrar_id'";
                                    $ejecutar = mysqli_query($conexion, $borrar);
                                    //verifica si  existen datos en la variable  
                                    if ($ejecutar) {
                                        //te redirecciona al index de ventas
                                        header("location:ventas_index.php");
                                    }
                                    echo "<script>location.reload()</script>";
                                }
                                ?>

                            </tbody>
                        </table>

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