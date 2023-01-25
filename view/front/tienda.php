<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="http://localhost/ChristieMeta/">
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
                    <p class="font_title responsive-font mt-3 "><strong> Christie's & Meta</strong></p>
                </div>
            </div>
            <nav id="menu" class="me-1 col-sm-6 col-md-5 col-xl-5  col-lg-4 col-6 row  navbar navbar-expand-lg  justify-content-end">
                <ul class=" nav nav-pills justify-content-center text-light ">
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="index.php/home">Home</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white; border-bottom: 3px solid;" class="nav-link" href="index.php/tienda">Tienda</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Mapa</a></li>
                    <li class="nav-item "><a class="responsive-font" style="color: white" class="nav-link" href="#">Perfil</a> </li>
                </ul>
            </nav>
            <!-- <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
        </div>
    </header>
    <div id="content" class="row container mx-auto justify-content-center">

        <section id="filtros" class="col-11 mt-5 mb-5">
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
            <article id="filtros" class="col-12 container d-flex justify-content-center">
                <div class="row col-3 mx-2">
                    <label for="selectCats">Categorías</label>
                    <select name="selectCats" id="selectCategorias" class="mx-2 ">
                    </select>
                </div>
                <div class="row col-3 mx-2">
                    <label for="selectPuntuacionComents">Comentarios</label>
                    <select name="selectPuntuacionComents" id="selectPuntuacionComentarios" class="mx-2 ">
                        <option value="" selected>Sin filtrado</option>
                        <option value="0"> De mayor a menor</option>
                        <option value="1">De menor a mayor</option>
                    </select>
                </div>
                <div class="row col-3 mx-2">
                    <label for="selectPuntuacionCompras">Compras</label>
                    <select name="selectPuntuacionCompras" id="selectPuntuacionCompras" class="mx-2">
                        <option value="" selected>Sin filtrado</option>
                        <option value="0"> De mayor a menor</option>
                        <option value="1">De menor a mayor</option>
                    </select>
                </div>
                <div class="row col-3 mx-2">
                    <label for="progressbar">Precio</label>
                    <input id="rangePrecio" class="mt-2" type="range" min="20" max="2000" value="2000" class="slider" id="myRange">
                    <span id="spanRange" class="text-center">2000 C</span>

                </div>
            </article>

        </section>
        <section id="items" class="col-12  mb-3">
            <article class="card mx-auto mb-5" style="width: 90%">
                <img class="card-img-top mx-aiut " src="view/admin/images/metaverseCar.jpeg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </article>
            <article class="card mx-auto" style="width: 90%; ">
                <img class="card-img-top mx-aiut" src="view/admin/images/metaverseCar.jpeg" alt="Card image cap">
                <div class="card-body d-flex row">
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
            </article>
        </section>
    </div>
    <script src="view/front/js/tienda.js"></script>
</body>

</html>