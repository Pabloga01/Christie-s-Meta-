<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="http://localhost/ChristieMeta/">
    <link rel="stylesheet" href="view/front/css/home.css">
    <title>Home</title>
</head>

<body>
    <header>
        <div class="navbar  box-shadow col-12">
            <div href="#" class="col-4 navbar-brand d-flex align-items-center justify-content-start ">
                <div class="d-flex align-middle  m-3">
                    <img src="view/admin/images/C&Mico.png" class="ico ">
                </div>
                <div class=" t_header   ">
                    <p class="font_title responsive-font mt-3 "><strong> Christie's & Meta</strong></p>
                </div>
            </div>
            <nav id="menu" class="me-1 col-sm-6 col-md-5 col-xl-5  col-lg-4 col-6 row  navbar navbar-expand-lg  justify-content-end">
                <ul class=" nav nav-pills justify-content-center text-light ">
                    <li class="nav-item "><a class="responsive-font" style="color: white; border-bottom: 3px solid;" class="nav-link" href="index.php/home">Home</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="index.php/tienda">Tienda</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Mapa</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Perfil</a> </li>
                </ul>
            </nav>
            <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
        </div>
    </header>
    <div class="row  mx-auto">
        <section class="sec col-12 ">
            <article id="welcome_message" class="mt-5 resp-font">
                <p>Bienvenido al portal web de Christie´s & Meta.<br> Podrás disponer de todo tipo de items dentro del metaverso.<br> ¿A qué esperas para empezar?</p>
            </article>
        </section>

        <div id="content" class="row container mx-auto justify-content-center">
            <!-- imagen -->


            <section id="articulos" class="col-11  row mt-5 mb-5 d-flex justify-content-center ">
                <div id="divMsjSlider" class="text-center responsive-font">
                    <p id="msjSlider">los artículos más valorados bla bla</p>
                </div>
                <div class="col-12 mt-2 mb-5 d-flex justify-content-center">
                    <div class="btnSlider  col-1">
                        <img src="view/admin/images/before.png" class="imgNavigation">
                    </div>
                    <article id="" class="articulo1 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt1 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre1 r-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio1 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria1 fst-italic display-7" style="color: #60645cb6">Categoría</p>
                        </div>
                    </article>
                    <article id="" class="articulo2 art col-4 col-sm-3 col-md-3 col-xl-3 ">
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
                            <!-- <img src="view/admin/dir_objetos/19/2022074033326.jpg" class="slider_img w-100">  -->
                            <!-- <img src="view/admin/dir_objetos/47/20220630155227.jpg" class="slider_img w-100"> -->
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre3 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio3 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria3 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo4 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt4 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre4 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio4 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria4 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo5 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt5 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre5 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio5 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria5 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo6 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt6 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre6 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio6 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria6 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo7 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt7 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre7 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio7 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria7 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo8 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt8 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre8 r-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio8 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria8 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo9 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt9 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre9 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio9 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria9 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <article id="" class="articulo10 art col-4 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="imgArt10 slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="nombre10 r-font  h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="precio10 r-font ">40 C</p>
                            </div>
                            <p class="r-font categoria10 fst-italic display-7" style="color: #60645cb6">Categoría 3</p>
                        </div>
                    </article>
                    <div class="btnSlider col-1">
                        <img src="view/admin/images/next.png" class="imgNavigation">
                    </div>

                </div>
            </section>
            <article id="div_buscador" class=" mb-5">
                <!-- <form class="w-90 d-flex justify-content-center" action="#" method="post" target="_blank"> -->
                <div class=" d-flex justify-content-center">
                    <select id="criterioBuscador" class="mx-2">
                        <option value="nombre" selected> Por nombre</option>
                        <option value="descripcion">Por descripción</option>
                        <option value="ordenMayor">Puntuación mayor de</option>
                        <option value="ordenMenor">Puntuación menor de</option>
                    </select>
                    <input id="buscador" class="w-75" type="search" placeholder="🔎 Filtrar categorías" name="busquedamodelos" list="listaCategorias">
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
            <section id="categorias" class="col-11">
                <!-- <article id="art1" class="  article mt col-xs-12 col-sm-12 col-md-12 mx-12 mb-3 ">
                    <div id="cab_articulo" class="mx-2 mt-2">
                        <div id="cab_img" class="m-2 col-5 col-sm-5 col-md-4 ">
                            <img src="view/admin/images/buda.jpg" class=" img w-75 border border-3 grey rounded ">
                        </div>
                        <div id="cab_contenido" class="m-2">
                            <div id="titulocont">
                                <h3 class="responsive-font titulocont">Categoría 1</h3>
                            </div>
                            <div id="subtitulo">
                                <p class="responsive-font subtitulo">Descripción de categoría </p>
                            </div>
                        </div>
                    </div>
                </article>
                <article id="art1" class="  article mt col-xs-12 col-sm-12 col-md-12 mx-12 mb-3 ">
                    <div id="cab_articulo" class="mx-2 mt-2">
                        <div id="cab_img" class="m-2 col-5 col-sm-5 col-md-4 ">
                            <img src="view/admin/images/buda.jpg" class=" img w-75 border border-3 grey rounded ">
                        </div>
                        <div id="cab_contenido" class="m-2">
                            <div id="titulocont">
                                <h3 class="responsive-font titulocont">Categoría 1</h3>
                            </div>
                            <div id="subtitulo">
                                <p class="responsive-font subtitulo">Descripción de categoría </p>
                            </div>
                        </div>
                    </div>
                </article> -->




            </section>
        </div>
    </div>
    <script src="view/front/js/home.js"></script>
</body>

</html>