
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
                select.value = "Sin filtrado";
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
    inputCategories.appendChild(article);

    article.addEventListener("click", () => {
        deployArticle();

    });


    article.id = arItem["id_objeto"];
    article.classList.add("card", "mb-5", "mx-auto", "mb-5", "art");
    article.style.width = "90%";

    var img = document.createElement('img');
    img.classList.add("card-img-top", "mx-aiut");
    let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/" + arItem["id_objeto"] + "/" + arItem["fotografia1"];
    img.style.width = "100%";
    img.style.height = "25em";
    img.style.maxHeight = "20%";
    img.src = baseImg;
    article.appendChild(img);

    var divBody = document.createElement('div');
    divBody.classList.add("card-body", "d-flex", "row", "article");
    article.appendChild(divBody);

    var divInnerBody1 = document.createElement('div');
    divInnerBody1.classList.add("d-flex", "justify-content-between");
    divBody.appendChild(divInnerBody1);

    var divInnerInnerBody1 = document.createElement('div');
    var h5 = document.createElement("h5");
    h5.classList.add("card-text", "resp-font");
    h5.innerHTML = arItem[1];
    divInnerInnerBody1.appendChild(h5);
    divInnerBody1.appendChild(divInnerInnerBody1);

    var divInnerInnerBody2 = document.createElement('div');
    var p2 = document.createElement("p");
    p2.classList.add("card-text", "resp-font");
    p2.innerHTML = arItem["precio"] + " C";
    divInnerInnerBody2.appendChild(p2);
    divInnerBody1.appendChild(divInnerInnerBody2);


    var divOuterBody = document.createElement('div');
    divOuterBody.classList.add("d-flex", "justify-content-start", "mt-3");
    var p3 = document.createElement("p");
    p3.classList.add("card-text", "resp-font");
    p3.innerHTML = arItem[11];
    divOuterBody.appendChild(p3);

    divBody.appendChild(divOuterBody);

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
    } else {
        precio = parseInt(precio);
    }
    if (idCategory == "Sin filtrado") {
        idCategory = "";
    } else {
        idCategory = parseInt(idCategory);
    }
    let jsonValues = {
        id_category: idCategory,
        order_comments: orderComments,
        order_sales: orderSales,
        price: precio,
    }
    let jsonFormat = JSON.stringify(jsonValues);
    try {
        fetch("http://localhost/ChristieMeta/index.php/api/filtrar_items", {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: jsonFormat
        })
            // .then(checkStatus)
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
                // console.error(error);
            });
    } catch (error) {
    }
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


function deployArticle() {
    art = event.target.parentNode;
    idObject = art.id;
    let section = document.querySelector(".product--card-single");
    section.style.display="block";

    fetch("http://localhost/ChristieMeta/index.php/api/consultar_item/?idItem=" + idObject)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            jsonActual = productList;

            if (productList != undefined && productList.length != 0) {
                fillTable(productList, arrCategoriesHeaders2);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });


}

// $('.owl-carousel').owlCarousel({
//     loop: true,
//     margin: 10,
//     items: 1,
//     nav: true,
//     animateOut: 'slideOutUp',
//     animateIn: 'slideInUp'
// })















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