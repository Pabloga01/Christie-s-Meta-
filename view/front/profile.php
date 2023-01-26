<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="http://localhost/ChristieMeta/">
    <link rel="stylesheet" href="view/front/css/profile.css">
    <title>Perfil</title>
</head>


<body>
    <header>
        <div class="navbar  box-shadow col-12">
            <div href="#" class="col-4 navbar-brand d-flex align-items-center justify-content-start ">
                <div class="d-flex align-middle  m-3">
                    <img src="view/admin/images/C&Mico.png" class="ico ">
                </div>
                <div class=" t_header   ">
                    <p class="font_title ri3-font mt-3 "><strong> Christie's & Meta</strong></p>
                </div>
            </div>
            <nav id="menu" class="me-1 col-sm-6 col-md-5 col-xl-5  col-lg-4 col-6 row  navbar navbar-expand-lg  justify-content-end">
                <ul class=" nav nav-pills justify-content-center text-light ">
                    <li class="nav-item "><a class="ri2-font" style="color: white;" class="nav-link" href="index.php/home">Home</a></li>
                    <li class="nav-item "><a class="ri2-font" style="color: white ;  " class="nav-link" href="index.php/tienda">Tienda</a></li>
                    <li class="nav-item "><a class="ri2-font" style="color: white" class="nav-link" href="#">Mapa</a></li>
                    <li class="nav-item "><a class="ri2-font usertag" style="color: white;border-bottom: 3px solid;" class="nav-link" href="index.php/perfil"><?php echo $_SESSION["username_front"]?></a> </li>
                </ul>
            </nav>
            <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                <div class="panel panel-primary">
                    <div class="panel-heading mb-2">
                        <h3 class="panel-title"><?php echo $_SESSION["username_front"]?></h3>
                    </div>
                    <div class="panel-body col-12 mt-3">
                        <div class="row">
                            <div class=" col-lg-3  col-sm-3 col-6" align="center">
                                <img alt="User Pic" class="w-50" src="view/admin/images/avatar3.png">
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                        <tr>
                                            <td class="r-font">Nombre:</td>
                                            <td class="responsive-font name">Programming</td>
                                        </tr>
                                        <tr>
                                            <td class="r-font">Apellidos:</td>
                                            <td class="responsive-font surname">06/01/2011</td>
                                        </tr>
                                        <tr>
                                            <td class="r-font">Correo</td>
                                            <td class="responsive-font mail">08/25/2016</td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td class="r-font">Nombre de usuario</td>
                                            <td class="responsive-font username">Male</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="r-font">contraseña</td>
                                            <td class="responsive-font password">Street in, State</td>
                                        </tr> -->
                                        <tr>
                                            <td class="r-font">rol</td>
                                            <td class="responsive-font rol">Street in, State</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <!-- <button id="cerrarSesion" class="btn btn-primary"><a href="index.php/logout">Home</a></li> -->

        <a href="index.php/logout" id="cerrarSesion" class="btn btn-primary"> Cerrar Sesión</a>
    </div>
    <section id="divFooter" class="mt-5">
        <footer id="footer" class="col-12  ">
            <div class="footer-content container">
                <h3>Christie's & Meta</h3>
                <p>Página web perteneciente al dominio de Christie's & Meta. Todos los derechos de la misma están reservados.</p>
            </div>
            <div class="footer-bottom container">
                <p>Copyright &copy <span id="year"></span> <a href="#">Pablo García</a> </p>
                <div class="footer-menu">
                    <ul class="f-menu">
                        <li><a href="index.php/home">Home</a></li>
                        <li><a href="index.php/tienda">Tienda</a></li>
                    </ul>
                </div>
            </div>

        </footer>
    </section>  
    <script src="view/front/js/profile.js"></script>

</body>

</html>