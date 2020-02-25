<?php
//include_once '../lib/ControlAcceso.Class.php';
include_once '../lib/Constantes.Class.php';
include_once '../modelo/ColeccionCarrera.php';
include_once '../modelo/Carrera.class.php';
$Coleccion = new ColeccionCarrera();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../lib/bootstrap-4.1.1-dist/css/bootstrap.css" />
        <link rel="stylesheet" href="../lib/open-iconic-master/font/css/open-iconic-bootstrap.css" />
        <script type="text/javascript" src="../lib/JQuery/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="../lib/bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../mod_autocompletar/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="../mod_autocompletar/jquery-ui.min.css" />
        <script type="text/javascript" src="../mod_autocompletar/jquery-ui.min.js"></script>
        <title><?= Constantes::NOMBRE_SISTEMA; ?> - Inicio</title>
    </head>
    <body>
        <?php include_once '../gui/navbar.php'; ?>

        <div class="container-fluid">
            <form action="?accion=busquedaSimple" method="post">

                <div class="row">
                    <div class="col-md-9 justify-content-center">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title oi oi-list"> Carreras</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped small table-bordered border-success">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Carrera</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($Coleccion->getColeccion() as $Carrera) { ?>

                                            <tr>
                                                <td><?= $Carrera->getNombre(); ?></td>
                                                <td style="text-align: center">

                                                    <a title="Ver detalle" href="#">
                                                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModalCenter">
                                                            <span class="oi oi-zoom-in"></span>
                                                        </button>
                                                    </a>

                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Diagnostico</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-striped table-bordered border-success">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>Carrera</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td ><?= $Carrera->getNombre(); ?></td>

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>                                                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a title="Modificar" href="carrera.actualizar.php?id=<?= $Carrera->getId(); ?>">
                                                        <button type="button" class="btn btn-outline-warning">
                                                            <span class="oi oi-pencil"></span>
                                                        </button>
                                                    </a>

                                                    <a title="Eliminar" href="carrera.eliminar.php?id=<?= $Carrera->getId(); ?>">
                                                        <button type="button" class="btn btn-outline-danger">
                                                            <span class="oi oi-trash"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>   
                        <div class="row">&nbsp;</div>
                    </div>



                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Evaluar soluciones alternativas -->
                                <?php $_GET['modelo'] = 'carrera'; ?>
                                <?php include_once '../gui/bloqueMenuContextual.php'; ?>
                            </div>
                        </div>

                        <div class="row">&nbsp;</div>

                        <!-- BLOQUE USUARIO LOGUEADO -->
                        <div class="row">
                            <div class="col-md-12">
                                <?php include_once '../gui/bloqueUsuarioLogueado.php'; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>

        <?php include_once '../gui/footer.php'; ?>
    </body>
</html>
