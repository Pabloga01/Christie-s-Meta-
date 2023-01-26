<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="http://localhost/ChristieMeta/">
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="view/front/css/tienda.css">
    <title>Tienda</title>
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
            <?php if (isset($_SESSION["loged_in_front"])) { ?>
                <nav id="menu" class=" me-1 col-sm-6 col-md-5 col-xl-5  col-lg-4 col-6 row  navbar navbar-expand-lg  justify-content-end">
                    <ul class=" nav nav-pills justify-content-center text-light ">
                        <li class="nav-item "><a class="ri2-font" style="color: white;  " href="index.php/home">Home</a></li>
                        <li class="nav-item "><a class="ri2-font" style="color: white;border-bottom: 3px solid;" href="index.php/tienda">Tienda</a></li>
                        <li class="nav-item "><a class="ri2-font" style="color: white" href="#">Mapa</a></li>
                        <li class="nav-item "><a class="ri2-font usertag" style="color: white" href="index.php/perfil" ><?php echo $_SESSION["username_front"]?></a> </li>
                    </ul>
                </nav>
            <?php } else { ?>
                <nav id="menu" class=" me-1 col-sm-6 col-md-5 col-xl-5  col-lg-4 col-6 row  navbar navbar-expand-lg  justify-content-end">
                    <ul class=" nav nav-pills justify-content-center text-light ">
                        <li class="nav-item "><a class="ri2-font" style="color: white;" href="index.php/home">Home</a></li>
                        <li class="nav-item "><a class="ri2-font" style="color: white;border-bottom: 3px solid;" href="index.php/tienda">Tienda</a></li>
                        <li class="nav-item "><a class="ri2-font" style="color: white" href="#">Mapa</a></li>
                        <li class="nav-item "><a class="ri2-font" style="color: white" href="index.php/login">Registro</a> </li>
                    </ul>
                </nav>
            <?php } ?>
            <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
        </div>
    </header>
    <div id="content" class="row container mx-auto d-flex justify-content-center">

        <section id="filtros" class="col-11 col-md-10 col-sm-11 col-lg-9 col-xl-8  mt-5 mb-5">
            <article id="div_buscador" class=" mb-4">
                <!-- <form class="w-90 d-flex justify-content-center" action="#" method="post" target="_blank"> -->
                <div class=" d-flex justify-content-center">
                    <input id="buscador" class="w-75 h-125" type="search" placeholder="🔎 Filtrar por nombre de producto" name="busquedamodelos" list="listaCategorias">
                    <button id="submitBuscador" type="submit" value="Buscar">Buscar</button>
                </div>
                <!-- </form> -->
                <datalist id="listaCategorias">
                    <!-- <option value="Camaro">
                    <option value="Corvette">
                    <option value="Impala">
                    <option value="Colorado"> -->
                </datalist>
            </article>
            <article id="filtros" class="col-11 container d-flex justify-content-center">
                <div class="row col-4 col-md3 mx-2">
                    <label class="ri-font" for="selectCats">Categorías</label>
                    <select class="ri-font" name="selectCats" id="selectCategorias" class="mx-2 ">
                    </select>
                </div>
                <div class="row col-4 col-md3 mx-2 d-flex justify-content-start">
                    <label class="ri-font " for="selectPuntuacionComents">Comentarios</label>
                    <select class="ri-font" name="selectPuntuacionComents" id="selectPuntuacionComentarios" class="mx-2 ">
                        <option value="" selected>Sin filtrado</option>
                        <option value="0"> De mayor a menor</option>
                        <option value="1">De menor a mayor</option>
                    </select>
                </div>
                <div class="row col-4 col-md3 mx-2">
                    <label class="ri-font" for="selectPuntuacionCompras">Compras</label>
                    <select class="ri-font" name="selectPuntuacionCompras" id="selectPuntuacionCompras" class="mx-2">
                        <option value="" selected>Sin filtrado</option>
                        <option value="0"> De mayor a menor</option>
                        <option value="1">De menor a mayor</option>
                    </select>
                </div>
                <div class="row col-4  col-md3 mx-2">
                    <label class="ri-font" for="progressbar">Precio Máximo</label>
                    <input class="ri-font" id="rangePrecio" class="mt-2" type="range" min="20" max="2000" value="2000" class="slider" id="myRange">
                    <span id="spanRange" class="text-center">2000 C</span>

                </div>
            </article>

        </section>


        <article class="product--card-single ficha_ampliada pt-3 mb-5" style="display: none;">
            <div class="d-flex justify-content-end container mb-3">
                <button class="btn btn-danger cerrarVentana">Cerrar</button>
            </div>
            <h1 class="product--card-name text-center mb-4 titleArt data1">Title</h1>
            <div class="product--card-body d-flex justify-content-center row">
                <div id="sliderObject " class="d-flex justify-content-center mb-5 ">
                    <section id="articulos" class="col-11  row mt-2  d-flex justify-content-center ">

                        <div class="col-11 mt-2  d-flex justify-content-center imgContainer">
                            <div class="btnSlider  divbtnIzda col-1">
                                <img src="view/admin/images/arrowLeft.png" class="imgNavigation btnIzda">
                            </div>
                            <!-- <article id="" class="articulo1 art col-10 col-sm-10 col-md-10 col-xl-10 ">
                                <div id="imagenArt" class="d-flex justify-content-center">
                                     <img class=" w-75 imgArt slider_img" src="view/admin/images/metaverseCar.jpeg"> 
                                </div>
                            </article>
                            <article id="" class="articulo2 art col-10 col-sm-10 col-md-10 col-xl-10 " style="display: none;">
                                <div id="imagenArt" class="d-flex justify-content-center">
                                    <img class=" w-75 imgArt slider_img" src="view/admin/images/metaverseCar.jpeg">
                                </div>
                            </article>
                            <article id="" class="articulo3 art col-10 col-sm-10 col-md-10 col-xl-10" style="display: none;">
                                <div id="imagenArt" class="d-flex justify-content-center">
                                    <img class=" w-75 imgArt slider_img" src="view/admin/images/metaverseCar.jpeg">
                                </div>
                            </article> -->
                            <!-- <article id="" class="articulo2 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                                <div id="imagenArt" class="">
                                    <img src="view/admin/images/item.png" class="imgArt2 slider_img w-100">
                                </div>
                                <div id="contenidoTexto">
                                    <div class="d-flex justify-content-between mx-1 mt-1">
                                        <h2 class="nombre2 r-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                        <p class="precio2 r-font ">40 C</p>
                                    </div>
                                    <p class="r-font categoria2 fst-italic display-7" style="color: #60645cb6">Categoría 2</p>
                                </div>
                            </article>
                            <article id="" class="articulo3 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                                <div id="imagenArt" class="">
                                    <img src="view/admin/images/item.png" class="imgArt3 slider_img w-100">
                                   
                                </div>
                                <div id="contenidoTexto">
                                    <div class="d-flex justify-content-between mx-1 mt-1">
                                        <h2 class="nombre3 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                        <p class="precio3 r-font ">40 C</p>
                                    </div>
                                    <p class="r-font categoria3 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                                </div>
                            </article> -->
                            <div class="btnSlider divbtnDcha col-1">
                                <img src="view/admin/images/arrowRight.png" class="imgNavigation btnDcha">
                            </div>

                        </div>
                    </section>

                    <!-- <img class="w-75  imgArt" src="view/admin/images/metaverseCar.jpeg"> -->
                </div>
                <div id="textContent" class=" d-flex col-11 col-md-9 col-sm-9 col-xl-9 justify-content-between container">
                    <div id="divLeft" class="col-4 col-md-6 col-sm-5 col-xl-6 mx-3">
                        <div class="divName d-flex col">

                            <div class="col-2">
                                <p class="ri-font ">Nombre:</p>
                            </div>
                            <span class=" nameArt data1  "> Nombre</span>
                        </div>
                        <div class="divCategory d-flex col">
                            <div class="col-2">
                                <p class=" ri-font categoryArt w-40">Categoría: </p>
                            </div>
                            <span class=" data1  ">
                        </div>
                        <div class="divPrice d-flex col">
                            <div class="col-2">
                                <p class="ri-font priceArt w-40">Precio: </p>
                            </div>
                            <span class=" data1 "></span>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div id="divRight" class="col-4 col-md-3 col-sm-4 col-xl-3 mx-3 justify-content-center ">

                        <div class="divSales d-flex col">
                            <div class="col-2">
                                <p class="ri-font salesArt ">Compras: </p>
                            </div>
                            <span class=" data1 "></span>
                        </div>
                        <div class="divLong d-flex col">
                            <div class="col-2">
                                <p class="ri-font longArt ">Longitud: </p>
                            </div>
                            <span class=" data1 "></span>
                        </div>
                        <div class="divLat d-flex col">
                            <div class="col-2">
                                <p class="ri-font latArt ">Latitud: </p>
                            </div> <span class=" data1 "></span>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION["loged_in_front"])) { ?>

                    <div id="divComprar" class="d-flex justify-content-center mt-3">
                        <button type="button" id="btnComprar" class="btn btn-success">Comprar</button>
                    </div>
                <?php } ?>

                <div id="varios" class="text-center mt-3">
                    <div class="product--card-desc ">
                        <nav class="product--card-nav justify-content-center">
                            <ul class="optionList d-flex justify-content-center me-4">
                                <li class="btnDesc">Descripcion</li>
                                <li class="btnComents">Comentarios</li>
                            </ul>
                        </nav>
                        <div class="contenido">
                            <div class="contenidoDescripcion container col-10" style="display: none" id="description">
                                <p class="textoDescripcion r-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mauris dui, vehicula vel erat ac, eleifend hendrerit nibh. Aenean neque nulla, suscipit vitae enim in, cursus tincidunt erat. In consequat libero mi, et vestibulum felis convallis et. Vivamus vestibulum, eros vel elementum feugiat, tellus magna pellentesque sapien</p>
                            </div>
                            <div class="contenidoComentarios container" style="display: none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </article>



        <section id="items" class="col-12  mb-3 mt-2">
            <article class="card mx-auto mb-5" style="width: 90%">
                <img class="card-img-top mx-aiut " src="view/admin/images/metaverseCar.jpeg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </article>
            <article class="card mx-auto" style="width: 90%; ">
                <div id="slider">
                    <img class="card-img-top mx-aiut" src="view/admin/images/metaverseCar.jpeg" alt="Card image cap">
                </div>
                <div id="datos" class="card-body d-flex row">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>Nombre</p>
                        </div>
                        <div>
                            <p>Precio</p>
                        </div>
                    </div>
                    <div>
                        <p>Descripcion del artículo</p>
                    </div>
                </div>
                <div id="varios">
                    <p>aaaaaaa</p>
                </div>
            </article>
        </section>
    </div>
    <section id="divFooter">
        <footer id="footer" class="col-12 mt-5 ">
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
    <script src="view/front/js/tienda.js"></script>
</body>

</html>