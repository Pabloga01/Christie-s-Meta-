<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <base href="http://localhost/ChristieMeta/">
    <link href="view/admin/css/home.css" rel="stylesheet" media="all">

</head>
<?php
require_once("view/admin/template.php") ?>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="welcome_message mb-3 msj_error w-75 p-4 border border-success text-success d-block'">
                    <?php
                    echo "<p>Bienvenido " . $_SESSION["username"] . "</p>";
                    ?> a la aplicación de gestión de Christie's & Meta</p>
                </div>
                <a href="index.php/admin/informes" class="w-75  d-flex js art mt col-xs-12 col-sm-12 col-md-12 mx-12 mb-3">
                    <article id="art" class="w-75 p-4 d-flex js art mt col-xs-12 col-sm-12 col-md-12 mx-12 mb-3 ">
                        <!-- <div id="img1" class=" col-5 col-sm-5 col-md-4 ">
                            <img src="view/admin/images/imgIcon.png" class=" img w-25  rounded ">
                        </div> -->

                        <div id="texto" class="container">
                            <p class="parrafoArticulo font-size-lg text-responsive" style="color : black ;  font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">
                                <strong>Informes detallados</strong><br>Representan datos de usuarios, items, comentarios y categorias.<br>Permiten realizar operaciones de inserción, edición o eliminar datos.
                            </p>
                        </div>
                    </article>
                </a>
            </div>
        </div>

    </div>

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
    <script src="view/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="view/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="view/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="view/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="view/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="view/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="view/admin/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="view/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->