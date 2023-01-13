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

    <!-- Fontfaces CSS-->
   <link href="view/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="view/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> -->

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
                        <a class="logo" href="index.html">
                            <img src="view/admin/images/icon/logo.png" alt="CoolAdmin" />
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
                            <a href="index.php/home">
                                <i class="fas fa-table"></i>Home</a>
                        </li>
                        <li>
                            <a href="index.php/graficos">
                                <i class="fas fa-chart-bar"></i>Gráficos</a>
                        </li>
                        <li>
                            <a href="index.php/informes">
                                <i class="fas fa-table"></i>Informes</a>
                        </li>

                        <li>
                            <a href="index.php/mapa">
                                <i class="fas fa-map-marker-alt"></i>Mapas</a>
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
                            <a href="index.php/home">
                                <i class="fas fa-table"></i>Home</a>
                        </li>
                        <li>
                            <a href="index.php/graficos">
                                <i class="fas fa-chart-bar"></i>Gráficos</a>
                        </li>
                        <li>
                            <a href="index.php/informes">
                                <i class="fas fa-table"></i>Informes</a>
                        </li>

                        <li>
                            <a href="index.php/mapa">
                                <i class="fas fa-map-marker-alt"></i>Mapa</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Búsqueda por sección" />
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
        </div>
        <!-- END HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <!-- <div class="main-content">

        </div> -->
    </div>




</body>

</html>