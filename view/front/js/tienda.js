var sliderIndex = 1;
var imagesSliderObject = 0;
var previousClone;


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
            // console.error(error);
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
            // console.error(error);
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
    article.style.cursor = 'pointer';
    inputCategories.appendChild(article);

    article.addEventListener("click", () => {
        deployArticle();

    });


    article.id = arItem["id_objeto"];
    article.classList.add("card", "cardObject", "mb-5", "mx-auto", "mb-5", "art");
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

    searcher.addEventListener("keyup", () => {
        loader();
    });

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

    let searchValue = searcher.value;
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
        search_value: searchValue,
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
                } else {
                    removeArticles();

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
    let art = event.target.parentNode;
    let idObject = art.id;
    let section = document.querySelector(".product--card-single");
    // section.style.display = "block";

    fetch("http://localhost/ChristieMeta/index.php/api/consultar_item/?idItem=" + idObject)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            let productList = eval(json);

            if (productList != undefined && productList.length != 0) {
                loadArticleClicked(productList, art);

            }

        }).catch(function (error) {
            // console.log('error request', error);
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






function loadArticleClicked(item, previousArticle) {
    sliderIndex = 1;
    imagesSliderObject = 0;
    item = item[0];
    let structure = document.querySelector('.product--card-single');
    const clone = structure.cloneNode(true);
    clone.style.display = 'block';
    previousArticle.after(clone);
    clone.classList.add("artDetallado");
    clone.id = item["id_objeto"];
    previousArticle.style.display = 'none';
    // previousArticle=clone;



    arData = [item[1], item[1], item["14"], item["precio"] + " C", item["puntuacion_compras"], item["latitud"], item["longitud"]];
    let i = 0;
    // clone.querySelectorAll('.data1').forEach(
    //     element => {
    //         element.classList.add("data2");
    // });
    clone.querySelectorAll('.data1').forEach(
        element => {
            element.innerHTML = arData[i];
            element.style.fontWeight = "600";
            element.classList.add("r-font", "mx-5");
            i++;
        });
    let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/" + item["id_objeto"] + "/" + item["fotografia1"];
    // clone.querySelector('.imgArt').src = baseImg;



    var btnDesc = clone.querySelector(".btnDesc");
    var btnComments = clone.querySelector(".btnComents");
    var divDesc = clone.querySelector(".contenidoDescripcion");
    var divComments = clone.querySelector(".contenidoComentarios");
    var textDescripcion = clone.querySelector(".textoDescripcion");

    btnDesc.addEventListener("click", () => {
        divDesc.style.display = "block";
        btnDesc.style.color = "#01218ac4";
        btnComments.style.color = "black";

        divComments.style.display = "none";
        textDescripcion.innerHTML = item["descripcion"];
        while (divComments.hasChildNodes()) {
            divComments.firstChild.remove();
        }
    });



    var btnBuy = clone.querySelector("#btnComprar");
    try {
        if (btnBuy != null && btnBuy != undefined) {
            let userId = "";
            var usertag = document.querySelector(".usertag").innerHTML;

            btnBuy.addEventListener("click", () => {
                fetch("http://localhost/ChristieMeta/index.php/api/consultar_usuario/?usuario=" + usertag)
                    .then(checkStatus)
                    .then(parseText)
                    .then(function (data) {


                        userId = data;
                        fetch("http://localhost/ChristieMeta/index.php/api/comprar_item/?idItem=" + item["id_objeto"] + "&usuario=" + userId)
                            // .then(checkStatus)
                            // .then(parseJSON)
                        //.then(function (data) {
                        // var json = data;
                        // let productList = eval(json);
                        // while (divComments.hasChildNodes()) {
                        //     divComments.firstChild.remove();
                        // }
                        // if (productList != undefined && productList.length != 0) {
                        //     productList.forEach(element => {

                        //     }).catch(function (error) {

                        //     });
                        // }
                        //})})
                    

            });

        }).catch (function (error) {
        });
    }

    } catch (ex) {

}



btnComments.addEventListener("click", () => {
    btnDesc.style.color = "black";
    btnComments.style.color = "#01218ac4";
    divComments.style.display = "flex";
    divComments.classList.add("mb-3", "comentsDiv", "container", "col-12");

    divDesc.style.display = "none";


    fetch("http://localhost/ChristieMeta/index.php/api/consultar_comentarios/?idItem=" + item["id_objeto"])
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            let productList = eval(json);
            while (divComments.hasChildNodes()) {
                divComments.firstChild.remove();
            }
            if (productList != undefined && productList.length != 0) {
                productList.forEach(element => {
                    let name = element[5];
                    let date = element["fecha"];
                    let comment = element["texto"];
                    let user = element["usuario"];


                    let div = document.createElement("div");
                    div.classList.add("mb-3");

                    div.style.backgroundColor = "gray";
                    div.style.background = "linear-gradient(45deg, #a0c7e7, #7195be)";
                    div.style.borderRadius = "10px";
                    divComments.appendChild(div);
                    div.classList.add("d-flex", "row");
                    div.style.marginLeft = "17%";
                    div.style.marginRight = "17%";
                    let divHeader = document.createElement("div");
                    div.appendChild(divHeader);


                    let p1 = document.createElement("p");
                    p1.innerHTML = user;
                    p1.style.fontWeight = "500";

                    p1.classList.add("me-4");
                    let p2 = document.createElement("p");
                    p2.innerHTML = date;
                    p2.style.fontStyle = "italic"
                    divHeader.appendChild(p1);
                    divHeader.appendChild(p2);
                    divHeader.classList.add("d-flex", "justify-content-center");

                    let p3 = document.createElement("p");
                    p3.innerHTML = name;
                    let p4 = document.createElement("p");
                    p4.innerHTML = comment;


                    div.appendChild(p3);
                    div.appendChild(p4);
                    div.classList.add("mb-3");

                });
            } else {
                let div = document.createElement("div");
                divComments.appendChild(div);
                let p1 = document.createElement("p");
                p1.innerHTML = "No hay comentarios en este objeto";
                div.appendChild(p1);

            }

        }).catch(function (error) {
            while (divComments.hasChildNodes()) {
                divComments.firstChild.remove();
            }
            let div = document.createElement("div");
            divComments.appendChild(div);
            let p1 = document.createElement("p");
            p1.classList.add("r-font");
            p1.innerHTML = "No hay comentarios en este objeto";
            div.appendChild(p1);
        });

});
previousClone = clone;
var btnCloseWindow = clone.querySelector(".cerrarVentana");

btnCloseWindow.addEventListener("click", () => {
    previousArticle.style.display = "block";
    clone.remove();
});


var btnOtherArticle = document.querySelectorAll(".cardObject");

btnOtherArticle.forEach(element => {
    element.addEventListener("click", () => {
        if (element.id != item[0]) {
            previousArticle.style.display = "block";
            clone.remove();
            imagesSliderObject = 0;
            sliderIndex = 0;
        }
    });
});





try {
    arImages = [item["fotografia1"], item["fotografia2"], item["fotografia3"]];
    arImages.forEach(element => {
        if (element != "" && element != undefined) {
            let anterior = clone.querySelector(".divbtnIzda");

            imagesSliderObject++;
            let article = document.createElement("article");
            article.id = "artSlider" + imagesSliderObject;
            article.classList.add("articulo1", "art", "artSlider", "col-10", "col-sm-10", "col-md-10", "col-xl-10");
            article.style.display = "block";

            if (imagesSliderObject > 1) {
                article.style.display = "none";
            }
            anterior.after(article);
            let div = document.createElement("div");
            div.id = "imagenArt";
            article.appendChild(div);
            div.classList.add("d-flex", "justify-content-center");
            let img = document.createElement("img");
            img.classList.add("imgArt", "slider_img", "w-75");
            let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/" + item["id_objeto"] + "/" + element;
            img.src = baseImg;
            div.appendChild(img);

        }
    });
} catch (ex) {

}
let leftButtonSlider = clone.querySelector(".btnIzda");
let rightButtonSlider = clone.querySelector(".btnDcha");


rightButtonSlider.addEventListener("click", () => {
    let arts = document.querySelectorAll(".artSlider");
    arts.forEach(element => {
        element.style.display = "none";
    });
    sliderIndex++;
    if (sliderIndex > imagesSliderObject) {
        sliderIndex = 1;
    }
    let artHtml = clone.querySelector("#artSlider" + sliderIndex);
    if (artHtml != null)
        artHtml.style.display = "block";
});

leftButtonSlider.addEventListener("click", () => {
    let arts = document.querySelectorAll(".artSlider");
    arts.forEach(element => {
        element.style.display = "none";
    });
    sliderIndex--;
    if (sliderIndex < 1) {
        sliderIndex = imagesSliderObject;
    }
    let artHtml = clone.querySelector("#artSlider" + sliderIndex);
    if (artHtml != null)
        artHtml.style.display = "block";

});

}

/* <article id="" class="articulo1 art col-10 col-sm-10 col-md-10 col-xl-10 ">
<div id="imagenArt" class="d-flex justify-content-center">
    <!-- <img src="view/admin/images/item.png" class="imgArt1 slider_img  "> -->
    <img class=" w-75 imgArt slider_img" src="view/admin/images/metaverseCar.jpeg">
</div>
</article> */




function checkStatus(response) {
    if (response.status >= 200 && response.status < 300) {
        return response
    } else {
        var error = new Error(response.statusText)
        error.response = response
        // throw error
    }
}

function parseJSON(response) {
    return response.json();
}
function parseText(response) {
    return response.text();
}

