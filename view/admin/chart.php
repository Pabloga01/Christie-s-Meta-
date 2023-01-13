<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gráficos</title>
</head>
<?php
require_once("view/admin/template.php")?>

<body class="animsition">
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- MAIN CONTENT--> 
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40">Gráfico circular</h3>
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-12">
                            <div class="au-card m-b-30">
                                <div class="au-card-inner">
                                    <h3 class="title-2 m-b-40">Gráfico de barras</h3>
                                    <canvas id="singelBarChart"></canvas>
                                </div>
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
        <!-- END MAIN CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->

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

</body>

</html>
<!-- end document-->