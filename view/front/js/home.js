
var sliderIndex = 0;
var sliderIndexFirst = 0;
var inputCategories = document.querySelector("#listaCategorias");





addEventListener("load", () => {
    sliderCheckLogedIn();
    addListenersToButtons();
    loadCategories();
    enableSearcher();
});



function sliderCheckLogedIn() {
    var x = document.cookie;
    if (x.includes("logedInUser=1")) {
        fetch("http://localhost/ChristieMeta/index.php/api/slider_login", {
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
                productList = eval(json);
                if (productList != undefined && productList.length != 0) {
                    let sliderText = document.querySelector("#msjSlider");
                    sliderText.innerHTML = "Los últimos artículos comentados";
                    fillSlider(productList);
                }
            })
            .catch((error) => {
                console.error(error);
            });

    } else if (x.includes("logedInUser=2")) {

        fetch("http://localhost/ChristieMeta/index.php/api/slider_notlogin", {
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
                productList = eval(json);
                if (productList != undefined && productList.length != 0) {
                    let sliderText = document.querySelector("#msjSlider");
                    sliderText.innerHTML = "Los artículos más comprados y comentados";
                    fillSlider(productList);
                }
            })
            .catch((error) => {
                console.error(error);
            });
    }
}


function fillSlider(itemList) {
    let arProductHeaders = [1, 2, 14, 8];
    let i = 1;

    itemList.forEach(element => {

        let itemName = element[1];
        let itemPrice = element[2];
        let category = element[14];
        let image = element[8];
        let idItem = element[0];
        addToSlider(itemName, itemPrice, category, image, idItem, i);
        i++;
    });
}






function addToSlider(itemName, itemPrice, category, image, idItem, index) {
    let artHtml = document.querySelector(".articulo" + index);
    artHtml.id = idItem;
    let nameHtml = document.querySelector(".nombre" + index);
    let priceHtml = document.querySelector(".precio" + index);
    let categoryHtml = document.querySelector(".categoria" + index);
    let imageHtml = document.querySelector(".imgArt" + index);

    nameHtml.innerHTML = itemName;
    priceHtml.innerHTML = itemPrice;
    categoryHtml.innerHTML = category;
    // let baseImg = "view/admin/dir_objetos/"+idItem+"/"+image;
    let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/" + idItem + "/" + image;
    // var img = new Image();
    // img.onload = function () {

    // };
    // img.src = 'http://localhost/ChristieMeta/view/admin/dir_objetos/47/20220630155227.jpg';
    // imageHtml = img;

    // let baseImg = "http://localhost/ChristieMeta/view/admin/dir_objetos/47/20220630155227.jpg";
    imageHtml.src = baseImg;

    if (sliderIndex < 3) {
        artHtml.style.display = "block";
        sliderIndex++;
    }

}



function addListenersToButtons() {
    let btns = document.querySelectorAll(".imgNavigation");
    btns[0].style.cursor = "pointer";
    btns[1].style.cursor = "pointer";
    btns[0].addEventListener("click", () => {

        // let artHtml = document.querySelector("#articulo" + index);
        let arts = document.querySelectorAll(".art");

        arts.forEach(element => {
            element.style.display = "none";
        });
        //  sliderIndex=sliderIndex-2;
        for (let i = 1; i < 4; i++) {
            sliderIndexFirst--;
            if (sliderIndexFirst < 1) {
                sliderIndexFirst = 10;
            }
            if (i == 1) {
                sliderIndex = sliderIndexFirst;
            }
            let artHtml = document.querySelector(".articulo" + sliderIndexFirst);
            artHtml.style.display = "block";
        }

    })

    btns[1].addEventListener("click", () => {
        let arts = document.querySelectorAll(".art");
        arts.forEach(element => {
            element.style.display = "none";
        });
        for (let i = 1; i < 4; i++) {
            sliderIndex++;
            if (sliderIndex > 10) {
                sliderIndex = 1;
            }
            if (i == 1) {
                sliderIndexFirst = sliderIndex;

            }

            let artHtml = document.querySelector(".articulo" + sliderIndex);
            artHtml.style.display = "block";
        }
    })
}


function loadCategories() {
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
                catList.forEach(element => {
                    option = document.createElement("option");
                    option.value = element["nombre"];
                    option.id = element["id_categoria"];

                    inputCategories.appendChild(option);
                    fillArticlesCategories(element["id_categoria"], element["nombre"], element["descripcion"], element["fotografia"]);
                });
            }
        })
        .catch((error) => {
            console.error(error);
        });

}


function fillArticlesCategories(idCat, name, description, image) {
    let inputCategories = document.querySelector("#categorias");

    var article = document.createElement('article');
    article.id = idCat;
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
    let baseImg = "http://localhost/ChristieMeta/view/admin/dir_categorias/" + idCat + "/" + image;
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
    h3.innerHTML = name;
    h3.classList.add("responsive-font", "titulocont");
    divTituloCont.appendChild(h3);

    var divSubtituloCont = document.createElement('div');
    divContenido.appendChild(divSubtituloCont);
    var p = document.createElement('p');
    p.innerHTML = description;
    p.classList.add("responsive-font", "subtitulo");
    divSubtituloCont.appendChild(p);


    var div = document.createElement('div');
    var div = document.createElement('div');
    var div = document.createElement('div');
    var div = document.createElement('div');


}




function enableSearcher() {
    var searcher = document.querySelector("#buscador");
    let searcherButton = document.querySelector("#submitBuscador");


    searcher.addEventListener("keyup", () => {
        enableSearch();
    });
    
    searcherButton.addEventListener("click", () => {
        enableSearch();
    });


    function enableSearch() {
        let arts = document.querySelectorAll(".article");
        let idCatsList = [];
        let valueSearcher = searcher.value;
        let options = inputCategories.children;

        if (valueSearcher != undefined && valueSearcher != "") {
            for (let i = 0; i < options.length; i++) {
                if (options[i].value.toLowerCase().includes(valueSearcher.toLowerCase())) {
                    idCatsList.push(options[i].id);
                }
            }

            if (idCatsList.length > 0)
                loadFilteredCategories(idCatsList);
        } else {
            arts.forEach(element => {
                element.style.display = "block";
            });
        }
    }


}




function loadFilteredCategories(idCatsList) {

    let arts = document.querySelectorAll(".article");
    arts.forEach(element => {
        element.style.display = "none";
        idCatsList.forEach(element1 => {
            if (element.id == element1) {
                element.style.display = "block";
            }
        });
    });
    // fetch("http://localhost/ChristieMeta/index.php/api/consultar_categoria/?id_categoria=" + idCatsList)
    //     .then(checkStatus)
    //     .then(parseJSON)
    //     .then(function (data) {
    //         var json = eval(data);
    //         if (json != undefined && json.length != 0) {

    //         }

    //     }).catch(function (error) {
    //         console.log('error request', error);
    //     });
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