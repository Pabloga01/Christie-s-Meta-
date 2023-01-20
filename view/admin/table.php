<!DOCTYPE html>
<html lang="en">

<head>
    <title>Informes</title>
    <link rel="stylesheet" href="http://localhost/ChristieMeta/view/admin/css/informes.css">
</head>
<?php
require_once("view/admin/template.php") ?>

<body class="animsition">
    <div class="page-container">

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <!-- DATA TABLE -->
                            <h3 class="titulo_tabla title-5 m-b-35">Productos </h3>
                            <div class="pre_tabla table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">

                                        <select id="listSelect" class="btn btn-light" name="property">
                                            <option value="productos" selected="selected">Productos</option>
                                            <option value="categorias">Categorías</option>
                                            <option value="comentarios">Comentarios</option>
                                            <option value="usuarios">Usuarios</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div class="rs-select2--light rs-select2--sm">
                                        <select class="btn btn-light" name="time">
                                            <option selected="selected">Hoy</option>
                                            <option value="">3 Días</option>
                                            <option value="">Semanal</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <button class="au-btn-filter">
                                        <i class="zmdi zmdi-filter-list"></i>filtros</button>
                                </div>
                                <div class="table-data__tool-right">
                                    <button id="añadirItem"  class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>añadir</button>
                                    <div class=" rs-select2--dark rs-select2--sm rs-select2--dark2">

                                        <select id="select_paginas" class="btn btn-secondary">
                                            <option value="5" selected="selected">5 registros</option>
                                            <option value="10">10 registros</option>
                                            <option value="15">15 registros</option>
                                            <option value="25">25 registros</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="table-respons2ive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
                                            <th>cliente</th>
                                            <th>email</th>
                                            <th>producto</th>
                                            <th>descripcion</th>
                                            <th>categoría</th>
                                            <th>fecha</th>
                                            <th>longitud</th>
                                            <th>latitud</th>
                                            <th>precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lori@example.com</span>
                                            </td>
                                            <td>Gafas de sol</td>
                                            <td class="desc">Gafas de sol comunes del metaverso</td>
                                            <td>Complemento</td>
                                            <td>10-01-2023</td>
                                            <td>
                                                0
                                                 <span class="status--process">Processed</span> 
                                            </td>
                                            <td>0</td>
                                            <td>200</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">john@example.com</span>
                                            </td>
                                            <td>Telefono movil</td>
                                            <td class="desc">iPhone X 64Gb Grey</td>
                                            <td>Dispositivo</td>
                                            <td>10-01-2023</td>
                                            <td>
                                                0
                                                 <span class="status--process">Processed</span> 
                                            </td>
                                            <td>0</td>
                                            <td>500</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">lyn@example.com</span>
                                            </td>
                                            <td>Reloj de bolsillo</td>
                                            <td class="desc"> Reloj de plata </td>
                                            <td>Complemento</td>
                                            <td>10-01-2023</td>
                                            <td>
                                                0
                                                 <span class="status--process">Processed</span> 
                                            </td>
                                            <td>0</td>
                                            <td>199</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                        <tr class="tr-shadow">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>Lori Lynch</td>
                                            <td>
                                                <span class="block-email">doe@example.com</span>
                                            </td>
                                            <td>Cámara digital</td>
                                            <td class="desc">Camera C430W 4k</td>
                                            <td>Dispositivo</td>
                                            <td>10-01-2023</td>
                                            <td>
                                                0
                                                 <span class="status--process">Processed</span> 
                                            </td>
                                            <td>0</td>
                                            <td>699</td>
                                            <td>
                                                <div class="table-data-feature">

                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                        <i class="zmdi zmdi-more"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->
                            <div id="botones_navegacion" class="mt-4 row d-flex justify-content-end ">
                                <button id="anterior" class="mx-2 au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class=""></i>Anterior</button>

                                <button id="siguiente" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class=" "></i>Siguiente</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Pablo García. © 2023 <a href="https://github.com/Pabloga01">GitHub</a>.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</body>

<!-- Jquery JS-->
<script src="view/admin/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="view/admin/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="view/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="view/admin/vendor/slick/slick.min.js">
</script>
<script src="view/admin/vendor/wow/wow.min.js"></script>
<script src="view/admin/vendor/animsition/animsition.min.js"></script>
<script src="view/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="view/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="view/admin/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="view/admin/vendor/circle-progress/circle-progress.min.js"></script>
<script src="view/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="view/admin/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="view/admin/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="view/admin/js/main.js"></script>
<script src="view/admin/js/listados.js"></script>

</html>
<!-- end document-->