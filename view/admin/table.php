<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <base href="../../">

    <!-- Title Page-->
    <title>Tables</title>

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
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="view/admin/index.html">
                            <img src="view/admin/view/admin/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li>
                            <a href="view/admin/chart.html">
                                <i class="fas fa-chart-bar"></i>Gráficos</a>
                        </li>
                        <li>
                            <a href="view/admin/table.html">
                                <i class="fas fa-table"></i>Informes</a>
                        </li>

                        <li>
                            <a href="view/admin/calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>
                        <li>
                            <a href="view/admin/map.html">
                                <i class="fas fa-map-marker-alt"></i>Mapa</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Otras páginas</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="view/admin/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="view/admin/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="view/admin/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block mt-2">
            <div class="logo">
                <a href="#">
                    <img src="view/admin/images/icon/logoProyecto.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <li>
                            <a href="view/admin/chart.html">
                                <i class="fas fa-chart-bar"></i>Gráficos</a>
                        </li>
                        <li class="active">
                            <a href="view/admin/table.html">
                                <i class="fas fa-table"></i>Informes</a>
                        </li>

                        <li>
                            <a href="view/admin/calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>
                        <li>
                            <a href="view/admin/map.html">
                                <i class="fas fa-map-marker-alt"></i>Mapa</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Otras páginas</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="view/admin/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="view/admin/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="view/admin/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search"
                                    placeholder="Búsqueda por sección" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">

                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="view/admin/images/icon/avatar-01.jpg" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="view/admin/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12 col-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Productos comprados</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">Propiedades</option>
                                                <option value="">Opcion 1</option>
                                                <option value="">Opcion 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
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
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>añadir</button>
                                        <div class=" rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Paginación</option>
                                                <option value="">10 registros</option>
                                                <option value="">15 registros</option>
                                                <option value="">25 registros</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
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
                                                    <!-- <span class="status--process">Processed</span> -->
                                                </td>
                                                <td>0</td>
                                                <td>200</td>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
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
                                                    <!-- <span class="status--process">Processed</span> -->
                                                </td>
                                                <td>0</td>
                                                <td>500</td>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
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
                                                    <!-- <span class="status--process">Processed</span> -->
                                                </td>
                                                <td>0</td>
                                                <td>199</td>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
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
                                                    <!-- <span class="status--process">Processed</span> -->
                                                </td>
                                                <td>0</td>
                                                <td>699</td>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                                <div id="botones_navegacion" class="mt-4 row d-flex justify-content-end ">
                                        <button class="mx-2 au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class=""></i>Anterior</button>
                                            
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
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