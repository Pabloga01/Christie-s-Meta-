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
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Home</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Tienda</a></li>
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
                <div id="msjSlider" class="text-center responsive-font">
                    <p>los artículos más valorados bla bla</p>
                </div>
                <div class="col-12 mt-2 mb-5 d-flex justify-content-center">
                    <div class="btnSlider col-1">
                        <img src="view/admin/images/before.png" class="imgNavigation">
                    </div>
                    <article id="articulo1" class="art col-3 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt" class="">
                            <img src="view/admin/images/item.png" class="slider_img w-100">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="responsive-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 1</h2>
                                <p class="responsive-font">40 C</p>
                            </div>
                            <p class="fst-italic display-7" style="color: #60645cb6">Categoría</p>
                        </div>
                    </article>

                    <article id="articulo2" class="art col-3 col-sm-3 col-md-3 col-xl-3 ">
                        <div id="imagenArt">
                            <img src="view/admin/images/item.png" class="slider_img w-100 ">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="responsive-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 2</h2>
                                <p class="responsive-font">40 C</p>
                            </div>
                            <p class="fst-italic display-7" style="color: #60645cb6">Categoría</p>
                        </div>
                    </article>

                    <article id="articulo3" class="art col-3 col-sm-3 col-md-3 col-xl-3">
                        <div id="imagenArt">
                            <img src="view/admin/images/item.png" class="slider_img">
                        </div>
                        <div id="contenidoTexto">
                            <div class="d-flex justify-content-between mx-1 mt-1">
                                <h2 class="responsive-font h6 text-start" style="font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">Artículo 3</h2>
                                <p class="responsive-font">40 C</p>
                            </div>
                            <p class="fst-italic display-7" style="color: #60645cb6">Categoría</p>
                        </div>
                    </article>
                    <div class="btnSlider col-1">
                        <img src="view/admin/images/next.png" class="imgNavigation">
                    </div>

                </div>
            </section>
            <section id="categorias">
                <article id="div_buscador" class=" mb-5">
                    <form class="w-90 d-flex justify-content-center" action="#" method="post" target="_blank">
                        <input id="buscador" class="w-75" type="search" placeholder="🔎 Filtrar por categorías" name="busquedamodelos" list="listamodelos">
                        <input type="submit" value="Buscar">
                    </form>

                    <datalist id="listaCategorias">
                        <option value="Camaro">
                        <option value="Corvette">
                        <option value="Impala">
                        <option value="Colorado">
                    </datalist>

                </article>
                <article id="hobbie2" class="  art mt col-xs-12 col-sm-12 col-md-12 mx-12 mb-3 ">
                    <div id="cab_articulo" class="mx-2 mt-2">
                        <div id="cab_img" class=" col-5 col-sm-5 col-md-4 ">
                            <img src="./img/buda.jpg" class=" img w-75 border border-3 grey rounded ">

                        </div>
                        <div id="cab_contenido">
                            <div id="titulocont">
                                <h3 class="titulocont">Viajar</h3>
                            </div>
                            <div id="subtitulo">
                                <p class="subtitulo">Siempre que tenga la oportunidad de hacerlo viajaré. </p>
                            </div>
                        </div>
                    </div>

                    <div id="texto" class="  col-12 col-sm-12 col-md-12">
                        <p class="parrafoArticulo     mx-2 font-size-lg text-responsive" style="color : black ;  font-family: Georgia, 'Times New Roman', Times, serif, Times, serif">
                            Sea por España o fuera de sus fronteras, me encanta visitar nuevos sitios, ver como son las costumbres de las personas, comer diferente y sentir que en cada lugar hay siempre cosas nuevas que apreciar.
                        </p>
                    </div>
                </article>
            </section>
        </div>

    </div>
</body>

</html>