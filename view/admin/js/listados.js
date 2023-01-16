

var indiceActual = 0;
var nFilas = 1;
var botonAnterior, botonSiguiente, idMaximo;
var productList = 0, cuentaActual = 0, filasTotales;
var actualIndex = 0;
var cursorNavigator = 1;
var totalObjectsLength = 0;

var titleTable=document.querySelector(".titulo_tabla");


addEventListener("load", () => {

    let listValue = selectList.options[selectList.selectedIndex].value;
    if (listValue == "productos") {
        productsCount();
    } else if (listValue == "categorias") {
        categoriesCount();
    } else if (listValue == "comentarios") {
        commentsCount();
    } else if (listValue == "usuarios") {
        usersCount();
    }
});


function productsCount() {
    fetch('http://localhost/ChristieMeta/index.php/api/listado_productos')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                totalObjectsLength = productList.length;
            }
            getProductPagedList();
            checkOnChangeLists();

        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}


function categoriesCount() {
    fetch('http://localhost/ChristieMeta/index.php/api/listado_categorias')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            var categoriesList = eval(json);
            if (categoriesList != undefined && categoriesList.length != 0) {
                totalObjectsLength = categoriesList.length;
            }
            getCategoriesPagedList();
            checkOnChangeLists();

        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}



function commentsCount() {
    fetch('http://localhost/ChristieMeta/index.php/api/listado_comentarios')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            var commentsList = eval(json);
            if (commentsList != undefined && commentsList.length != 0) {
                totalObjectsLength = commentsList.length;
            }
            getCommentsPagedList();
            checkOnChangeLists();

        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}



function usersCount() {
    fetch('http://localhost/ChristieMeta/index.php/api/listado_usuarios')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            var userList = eval(json);
            if (userList != undefined && userList.length != 0) {
                totalObjectsLength = userList.length;
            }
            getUsersPagedList();
            checkOnChangeLists();

        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}




var selectPags = document.querySelector("#select_paginas");
selectPags.addEventListener("change", () => {
    cleanTable();
    let listValue = selectList.options[selectList.selectedIndex].value;

    if (listValue == "productos") {
        productsCount();
    } else if (listValue == "categorias") {
        categoriesCount();
    } else if (listValue == "comentarios") {
        commentsCount();
    } else if (listValue == "usuarios") {
        usersCount();
    }
});


var selectList = document.querySelector("#listSelect");
selectList.addEventListener("change", () => {
    cleanTable();
    let listValue = selectList.options[selectList.selectedIndex].value;
    cursorNavigator=1;
    if (listValue == "productos") {
        productsCount();
    } else if (listValue == "categorias") {
        categoriesCount();
    } else if (listValue == "comentarios") {
        commentsCount();
    } else if (listValue == "usuarios") {
        usersCount();
    }
});


function getProductPagedList(nIndex) {
    titleTable.innerHTML="Productos";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    createHeadBoard();
    fetch("http://localhost/ChristieMeta/index.php/api/listado_productos/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                fillTable(productList);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}


function getCategoriesPagedList(nIndex) {
    titleTable.innerHTML="Categorías";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    createHeadBoard();
    fetch("http://localhost/ChristieMeta/index.php/api/listado_categorias/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                fillTable(productList);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}


function getCommentsPagedList(nIndex) {
    titleTable.innerHTML="Comentarios de usuarios";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    createHeadBoard();
    fetch("http://localhost/ChristieMeta/index.php/api/listado_comentarios/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                fillTable(productList);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}


function getUsersPagedList(nIndex) {
    titleTable.innerHTML="Usuarios";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    createHeadBoard();
    fetch("http://localhost/ChristieMeta/index.php/api/listado_usuarios/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            if (productList != undefined && productList.length != 0) {
                fillTable(productList);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}










var nextBtn = document.querySelector('#siguiente');
var beforeBtn = document.querySelector('#anterior');
disableButton("before");


nextBtn.addEventListener("click", () => {
    next();
});
beforeBtn.addEventListener("click", () => {
    before();
});

function next() {
    let valueSelect = parseInt(selectPags.options[selectPags.selectedIndex].value);

    if (totalObjectsLength == (valueSelect * cursorNavigator) + valueSelect) {
        cleanTable();
        enableButton("before");
        cursorNavigator++;
        let valor = (valueSelect * cursorNavigator) - valueSelect;
        getProductPagedList(valor);
        disableButton("next");
    } else if (totalObjectsLength < (valueSelect * cursorNavigator) + valueSelect) {
        disableButton("next");
    } else {
        cleanTable();
        enableButton("before");
        cursorNavigator++;
        let valor = (valueSelect * cursorNavigator) - valueSelect;
        getProductPagedList(valor);
    }
}

function before() {
    enableButton("next");
    let valueSelect = selectPags.options[selectPags.selectedIndex].value;
    cursorNavigator--;
    if (cursorNavigator < 1) {
        cursorNavigator = 1;
        disableButton("before");
    } else {
        let valor = (valueSelect * cursorNavigator) - valueSelect;
        cleanTable();
        getProductPagedList(valor);
        if (cursorNavigator == 1) {
            disableButton("before");
        }
    }
}

function checkOnChangeLists() {
    let valueSelect = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (totalObjectsLength > valueSelect) {
        enableButton("next");
    } else if (totalObjectsLength == valueSelect) {
        disableButton("next");
    } else {
        disableButton("next");
    }

}

function disableButton(buttonName) {

    let btn;
    if (buttonName == "before") {
        btn = beforeBtn;
    } else {
        btn = nextBtn;
    }

    btn.disabled = true;
    btn.style.cursor = "default";
    btn.classList.remove('mx-2', 'au-btn', 'au-btn-icon', 'au-btn--green');
}

function enableButton(buttonName) {
    let btn;
    if (buttonName == "before") {
        btn = beforeBtn;
    } else {
        btn = nextBtn;
    }

    btn.disabled = false;
    btn.style.cursor = "pointer";
    btn.classList.add('mx-2', 'au-btn', 'au-btn-icon', 'au-btn--green');
}




function createHeadBoard() {
    var elementoAnterior = document.querySelector(".pre_tabla");


    var divTabla = document.createElement('div');
    divTabla.classList.add('table-responsive', 'table-responsive-data2')

    var tabla = document.createElement('table');
    tabla.classList.add('table', 'table-data2')

    var thead = document.createElement('thead');
    var tr = document.createElement('tr');
    var th = document.createElement('th');
    var label = document.createElement('label');
    label.classList.add('au-checkbox');
    var input = document.createElement('input');
    var span = document.createElement('span');
    input.setAttribute("type", "checkbox");
    span.classList.add("au-checkmark");


    insertAfter(divTabla, elementoAnterior);
    divTabla.appendChild(tabla);
    tabla.appendChild(thead);
    thead.appendChild(tr);
    tr.appendChild(th);
    th.appendChild(label);
    label.appendChild(input);
    input.appendChild(span);
    tr.appendChild(th);


    let arrNombreCabeceras = ["nombre", "descripción", "precio", "categoría", "longitud", "latitud", "puntuacion total"];
    for (let i = 0; i < arrNombreCabeceras.length; i++) {
        var th1 = document.createElement('th');
        th1.innerHTML = arrNombreCabeceras[i];
        tr.appendChild(th1);
    }

}


function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}




function fillTable(arJson) {
    var previousElement = document.getElementsByTagName("thead")[0];
    var tbody = document.createElement("tbody");
    insertAfter(tbody, previousElement);

    arJson.forEach(element => {
        var tr = document.createElement('tr');
        tr.classList.add('tr-shadow')
        tbody.appendChild(tr);
        var td = document.createElement('td');
        tr.appendChild(td);

        let arHeadersName = ["nombre", "descripcion", "precio", "id_categoria", "longitud", "latitud", "puntuacion_total"];
        for (let i = 0; i < arHeadersName.length; i++) {
            var td = document.createElement('td');
            td.innerHTML = element[arHeadersName[i]];
            tr.appendChild(td);
        }

    });

}



function cleanTable() {
    var tableData = document.getElementsByTagName("thead")[0];
    var tableData1 = document.getElementsByTagName("tbody")[0];
    if(tableData!=undefined){
        tableData.remove();
    }
    if(tableData1!=undefined){
        tableData1.remove();
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