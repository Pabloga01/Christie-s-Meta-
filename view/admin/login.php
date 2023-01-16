<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <base href="http://localhost/ChristieMeta/">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="view/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="view/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="view/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="view/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <!-- <img src="./images/fondo.jpg"> -->
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <img src="view/admin/images/icon/logoProyecto.png" alt="CoolAdmin">
                        </div>

                        <div class="login-form">

                            <?php
                            if (isset($mensaje_error)) {
                                echo  "<div class= 'mb-3 msj_error w-100 p-4 border border-danger text-danger d-block'>";
                                echo   $mensaje_error;
                                echo "</div>";
                            }
                            ?>

                            <div class=" mb-3 msj_error w-100 p-4 border border-danger text-danger d-none">
                                Inicio de sesión fallido. Usuario incorrecto.
                            </div>

                            <form name="login" align="center" enctype="multipart/form-data" action="index.php/loginprocess" method="post">
                                <div class="form-group">
                                    <label class="text-left">Correo Electrónico</label>
                                    <input class="au-input au-input--full" type="text" name="user" placeholder="Correo electrónico">
                                </div>
                                <div class="form-group">
                                    <label class="text-left">Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recordar contraseña
                                    </label>
                                </div>

                                <div class="option-button">
                                    <input class="mt-3 au-btn au-btn--block au-btn--green text-center"  type="submit" value="iniciar sesión">

                                    <!-- <a class="mt-3 au-btn au-btn--block au-btn--green text-center" href="index.php/loginprocess">iniciar sesión</a> -->
                                </div>
                                <div class="social-login-content">
                                    <div class="option-button">
                                        <a class="au-btn au-btn--block au-btn--blue2 text-center" href="index.php/restorepassword">recuperar contraseña</a>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    ¿Quieres volver al login de usuario?
                                    <a href=".partePublica">Pulsa aquí</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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