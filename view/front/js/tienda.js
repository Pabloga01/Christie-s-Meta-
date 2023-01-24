
addEventListener("load", () => {
    loadSelectOptionsCategories();
    loadItems();
    listenerSearcher();
});

var range = document.querySelector("#rangePrecio");
range.addEventListener("change", () => {
    var spanRange = document.querySelector("#spanRange");
    spanRange.innerHTML = range.value + " C";

})




function loadSelectOptionsCategories() {
    let select = document.querySelector("#selectCategorias");

    fetch("http://localhost/ChristieMeta/index.php/api/listado_categorias", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }
    })
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            let catList = eval(json);
            if (catList != undefined && catList.length >= 0) {
                let option = document.createElement("option");
                option.value = "Sin filtrado";
                option.text = "Sin filtrado";
                option.id = "Sin filtrado";
                select.appendChild(option);
                select.value="Sin filtrado";
                catList.forEach(element => {
                    let option = document.createElement("option");
                    option.value = element["id_categoria"];
                    option.text = element["nombre"];
                    option.id = element["id_categoria"];
                    select.appendChild(option);
                });
            }
        })
        .catch((error) => {
            console.error(error);
        });
}


function loadItems() {
    fetch("http://localhost/ChristieMeta/index.php/api/filtrar_items", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        }
    })
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            let prodList = eval(json);
            if (prodList != undefined && prodList.length >= 0) {
                removeArticles();
                prodList.forEach(element => {
                    fillArticles(element);
                });
            }
        })
        .catch((error) => {
            console.error(error);
        });

}


function fillArticles(arItem) {

    // arItem["id_obeto"];
    // arItem["nombre"];
    // arItem["precio"];
    // arItem["latitud"];
    // arItem["longitud"];
    // arItem["puntuacion_total"];
    // arItem["puntuacion_compras"];
    // arItem["puntuacion_comentarios"];
    // arItem["fotografia1"];
    // arItem["fotografia2"];
    // arItem["fotografia3"];
    // arItem["descripcion"];
    // arItem["id_categoria"];
    // arItem["descripcion"];

    let inputCategories = document.querySelector("#items");

    var article = document.createElement('article');
    // article.id = idCat;
    article.classList.add("article", "mt", "col-xs-12", "col-sm-12", "col-md-12", "mx-12", "mb-3");
    inputCategories.appendChild(article);
    var divArt = document.createElement('div');
    divArt.id = "cab_articulo";
    divArt.classList.add("mx-2", "mt-2");
    article.appendChild(divArt);

    var divImg = document.createElement('div');
    divImg.id = "cab_img";
    divImg.classList.add("m-2", "col-5", "col-sm-5", "col-md-4");
    divArt.appendChild(divImg);

    var img = document.createElement('img');
    img.classList.add("img", "w-75", "border", "border-3", "grey", "rounded");
    let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/" + arItem[12] + "/" + arItem["fotografia1"];
    img.src = baseImg;
    divImg.appendChild(img);

    var divContenido = document.createElement('div');
    divContenido.id = "cab_contenido";
    divContenido.classList.add("m-2");
    divArt.appendChild(divContenido);

    var divTituloCont = document.createElement('div');
    divTituloCont.id = "titulocont";
    divContenido.appendChild(divTituloCont);
    var h3 = document.createElement('h3');
    h3.innerHTML = arItem[1];
    h3.classList.add("responsive-font", "titulocont");
    divTituloCont.appendChild(h3);

    var divSubtituloCont = document.createElement('div');
    divContenido.appendChild(divSubtituloCont);
    var p = document.createElement('p');
    p.innerHTML = arItem[11];
    p.classList.add("responsive-font", "subtitulo");
    divSubtituloCont.appendChild(p);

    var p2 = document.createElement('p');
    p2.innerHTML = "Puntos de item: " + arItem["puntuacion_total"];
    p2.classList.add("responsive-font", "subtitulo");
    p2.style.color = "#d4d4d8";
    divSubtituloCont.appendChild(p2);

    var div = document.createElement('div');
    var div = document.createElement('div');
    var div = document.createElement('div');
    var div = document.createElement('div');


}


var searcher = document.querySelector("#buscador");
var searcherButton = document.querySelector("#submitBuscador");
var selectCategories = document.querySelector("#selectCategorias");
var selectComments = document.querySelector("#selectCategorias");
var commentPointsFilter = document.querySelector("#selectPuntuacionComentarios");
var salePointsFilter = document.querySelector("#selectPuntuacionCompras");
var salesValue = document.querySelector("#rangePrecio");
arFilters = [searcher, selectCategories, selectComments, commentPointsFilter, salePointsFilter, salesValue];

function listenerSearcher() {

    searcherButton.addEventListener("click", () => {
        loader();
    });

    arFilters.forEach(element => {
        element.addEventListener("change", () => {
            loader();
        });
    });

}


function loader() {
    // let categoriesFilter = document.querySelector("#selectCategorias");
    // let commentPointsFilter = document.querySelector("#selectPuntuacionComentarios");
    // let salePointsFilter = document.querySelector("#selectPuntuacionCompras");
    // let salesValue = document.querySelector("#rangePrecio");

    let idCategory = selectCategories.value;
    let orderComments = commentPointsFilter.value;
    let orderSales = salePointsFilter.value;
    let precio = salesValue.value;
    if (precio == 0) {
        precio = "";
    }

    let jsonValues = {
        id_category: idCategory,
        order_comments: orderComments,
        order_sales: orderSales,
        price: precio,
    }
    let jsonFormat = JSON.stringify(jsonValues);

    fetch("http://localhost/ChristieMeta/index.php/api/filtrar_items", {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: jsonFormat
    })
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                // let sliderText = document.querySelector("#msjSlider");
                // sliderText.innerHTML = "Los últimos artículos comentados";
                removeArticles();
                productList.forEach(element => {
                    fillArticles(element);
                })
            }
        })
        .catch((error) => {
            console.error(error);
        });
}




function removeArticles() {

    let items = document.querySelector("#items");
    if (items.children.length > 0) {

        // for (let i = 0; i < items.length; i++) {
        //     items.firstChild.remove();
        // }

        // while(items.has){

        // }
        while (items.hasChildNodes()) {
            items.firstChild.remove();
        }
    }
}












function checkStatus(response) {
    if (response.status >= 200 && response.status < 300) {
        return response
    } else {
        var error = new Error(response.statusText)
        error.response = response
        throw error
    }
}

function parseJSON(response) {
    return response.json();
}
function parseText(response) {
    return response.text();
}