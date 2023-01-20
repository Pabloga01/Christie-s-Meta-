

var indiceActual = 0;
var nFilas = 1;
var botonAnterior, botonSiguiente, idMaximo;
var productList = 0, cuentaActual = 0, filasTotales;
var actualIndex = 0;
var cursorNavigator = 1;
var totalObjectsLength = 0;
var jsonActual = [];

var titleTable = document.querySelector(".titulo_tabla");
var columnas;
var selectSelected;

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
    cursorNavigator = 1;
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
    titleTable.innerHTML = "Productos";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }

    let arrProductHeaders = ["nombre", "descripcion", "precio", "categoria", "longitud", "latitud", "puntuacion total"];
    let arrProductHeaders2 = [1, 11, "precio", "nombre", "longitud", "latitud", "puntuacion_total"];
    createHeadBoard(arrProductHeaders);

    fetch("http://localhost/ChristieMeta/index.php/api/listado_productos/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            jsonActual = productList;
            if (productList != undefined && productList.length != 0) {
                fillTable(productList, arrProductHeaders2);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}


function getCategoriesPagedList(nIndex) {
    titleTable.innerHTML = "Categorías";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }

    let arrCategoriesHeaders = ["nombre", "descripcion", "puntuacion", "categoria padre"]
    let arrCategoriesHeaders2 = [1, 3, "puntuacion", "cod_categoria_padre"]
    createHeadBoard(arrCategoriesHeaders);

    fetch("http://localhost/ChristieMeta/index.php/api/listado_categorias/?q=" + nVisualizedRows + "&indice=" + actualIndex)
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


function getCommentsPagedList(nIndex) {
    titleTable.innerHTML = "Comentarios";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    let arrCommentsHeaders = ["fecha", "usuario", "objeto", "texto"];
    let arrCommentsHeaders2 = ["fecha", "id_usuario", "id_objeto", "texto"];
    createHeadBoard(arrCommentsHeaders);

    fetch("http://localhost/ChristieMeta/index.php/api/listado_comentarios/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            jsonActual = productList;
            if (productList != undefined && productList.length != 0) {
                fillTable(productList, arrCommentsHeaders2);

            }

        }).catch(function (error) {
            console.log('error request', error);
        });
}


function getUsersPagedList(nIndex) {
    titleTable.innerHTML = "Usuarios";
    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    let arrUserHeaders = ["usuario", "monedas", "nombre", "apellidos", "correo", "rol", "id usuario"];
    let arrUserHeaders2 = ["usuario", "moneda", "nombre", "apellidos", "correo", "rol", "id_usuario"];
    createHeadBoard(arrUserHeaders);
    fetch("http://localhost/ChristieMeta/index.php/api/listado_usuarios/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            productList = eval(json);
            jsonActual = productList;
            if (productList != undefined && productList.length != 0) {
                fillTable(productList, arrUserHeaders2);

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




function createHeadBoard(arNameHeaders) {
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


    //let arrNombreCabeceras = ["nombre", "descripción", "precio", "categoría", "longitud", "latitud", "puntuacion total"];
    for (let i = 0; i < arNameHeaders.length; i++) {
        var th1 = document.createElement('th');
        th1.innerHTML = arNameHeaders[i];
        tr.appendChild(th1);
    }

}


function insertAfter(newNode, existingNode) {
    existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}




function fillTable(arJson, arHeadersName) {
    var previousElement = document.getElementsByTagName("thead")[0];
    var tbody = document.createElement("tbody");
    insertAfter(tbody, previousElement);

    arJson.forEach(element => {
        var tr = document.createElement('tr');
        tr.classList.add('tr-shadow');
        tr.id = element[0];
        tr.style.cursor = "pointer";
        tr.addEventListener("click", () => {
            deployModalWindow(titleTable.innerHTML);

        });

        tbody.appendChild(tr);
        var td = document.createElement('td');
        tr.appendChild(td);

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
    if (tableData != undefined) {
        tableData.remove();
    }
    if (tableData1 != undefined) {
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


// function addClickerRows() {

//     columnas = document.getElementsByTagName("tr");
//     if (columnas != undefined) {
//         columnas.forEach(element => {
//             element.addEventListener("click", () => {
//                 //element.firstChild.nextSibling.i;
//                 deployModalWindow();

//             })
//         });
//     }
// }

function deployModalWindow(titleTable) {
    var arFieldsCard = [];

    switch (titleTable) {
        case "Productos":
            arFieldsCard = ["Nombre", "Precio", "Puntuación", "Latitud", "Longitud", "Categoría", "Imagen 1", "Imagen 2", "Imagen 3", "Descripción"];
            break;
        case "Categorías":
            arFieldsCard = ["Nombre", "Puntuación", "Cat. Padre", "Descripción"];
            break;
        case "Usuarios":
            arFieldsCard = ["Usuario", "Nombre", "Apellidos", "Rol", "Monedas", "Correo", "Contraseña"];
            break;
        case "Comentarios":
            arFieldsCard = ["Fecha", "Id_usuario", "Id_objeto", "Descripción"];
            break;
        default:
            return;
    }


    let divFather = document.createElement("div");
    divFather.classList.add("modal");


    let div = document.createElement("div");
    div.classList.add("modal_content");
    div.style.backgroundColor = "#e8e4e4";

    let divHeader = document.createElement("div");
    divHeader.classList.add("modal_header", "mb-5");

    let div2 = document.createElement("div");
    div2.classList.add("d-flex", "row", "justify-content-end", "mx-4");

    let btnClose = document.createElement("button");
    btnClose.innerHTML = "Cerrar";
    btnClose.classList.add("btn", "btn-danger");

    //btnClose.style.marginLeft = "83%";

    btnClose.addEventListener("click", () => {
        divFather.remove();
    });



    let h3 = document.createElement("h3");
    h3.style.marginBottom = "4%";
    h3.style.textAlign = "center";
    h3.innerHTML = "Ficha de " + titleTable;
    //div.appendChild(h3);
    div.appendChild(divHeader);
    divHeader.appendChild(div2);
    divHeader.appendChild(h3);
    div2.appendChild(btnClose);
    // h3.style.backgroundColor = "#74747c";
    // h3.style.width="60%";
    h3.style.margin = "0 auto";


    let span = document.createElement("span");
    let innerDiv = document.createElement("div");
    innerDiv.classList.add("col-xl-12", "col-lg-12", "col-md-12", "row");
    innerDiv.style.marginLeft = "0.1%";


    span.classList.add = "close";

    document.body.appendChild(divFather);
    divFather.appendChild(div);
    div.appendChild(span);
    div.appendChild(innerDiv);


    for (let i = 0; i < arFieldsCard.length; i++) {
        let innerDivleft = document.createElement("div");
        let contentDiv = document.createElement("div");


        let lbl = document.createElement("label");
        lbl.innerHTML = arFieldsCard[i];
        if (arFieldsCard[i] == "Descripción") {
            innerDivleft.classList.add("col-12");
            lbl.style.width = "13%";

        } else {
            innerDivleft.classList.add("col-xl-6", "col-lg-6", "col-md-6", "col-sm-12", "col-12");
            lbl.style.marginRight = "15%";
            lbl.style.width = "22%";
        }


        let input;


        if (arFieldsCard[i] == "Descripción") {
            input = document.createElement("textarea");
            input.classList.add("col-xl-6", "col-lg-6", "col-md-6", "col-sm-10", "col-10");
            input.style.marginLeft = "10%";

            //input.style.width = "50%";
            input.style.height = "150px";
            input.style.paddingBottom = "-5%";


        } else {
            input = document.createElement("input");
            input.style.width = "50%";
            input.style.marginBottom = "5%";
        }





        if (arFieldsCard[i] == "Categoría") {
            input = document.createElement("select");
            input.classList.add("selectCategories");

            fetch("http://localhost/ChristieMeta/index.php/api/listado_categorias")
                //  .then(checkStatus)
                .then(parseJSON)
                .then(function (data) {
                    var json = data;
                    productList = eval(json);
                    if (productList != undefined && productList.length != 0) {

                        input = document.querySelector(".selectCategories");
                        var option;
                        productList.forEach(element => {
                            option = document.createElement("option");
                            option.text = element["nombre"];
                            option.value = element["id_categoria"];
                            input.add(option);


                        });

                        input.value = selectSelected;
                        input.style.width = "50%";
                        input.style.marginBottom = "5%";
                    }


                }).catch(function (error) {
                    console.log('error request', error);
                });
        }

        if (arFieldsCard[i].includes("Imagen")) {
            input = document.createElement("input");
            input.type = "file";
            input.classList.add("file");

            // input.classList.add("form-control-file");
            input.style.width = "90%";
            input.style.marginBottom = "2%";
        } else {
            input.classList.add("inputModal");
        }


        input.style.border = "1px solid black";

        innerDivleft.appendChild(contentDiv);
        contentDiv.appendChild(lbl);
        contentDiv.appendChild(input);
        contentDiv.style.justifyItems = "center";

        // innerDivleft.style.margin = "auto";
        innerDiv.appendChild(innerDivleft);

    }
    let divButtons = document.createElement("div");
    divButtons.classList.add("d-flex", "row", "justify-content-end", "mx-4");


    let btnSave = document.createElement("button");
    btnSave.innerHTML = "Guardar";
    btnSave.id = "actualizar";

    let btnDelete = document.createElement("button");
    btnDelete.innerHTML = "Borrar";

    div.appendChild(divButtons);

    divButtons.appendChild(btnSave);
    divButtons.appendChild(btnDelete);
    btnSave.classList.add("btn", "btn-success");
    btnDelete.classList.add("btn", "btn-danger");
    btnSave.style.display = "flex";
    btnDelete.classList.add("ml-2");
    btnSave.style.justifyContent = "right";
    var idJson = event.target.parentNode.id
    divFather.style.display = "block";

    if (titleTable == "Comentarios") {
        var idUser = event.target.parentNode.children[2].textContent;
        var idObject = event.target.parentNode.children[3].textContent;
    }


    switch (titleTable) {
        case "Productos":
            if (loadFileDataProducts(idJson)) {
                btnSave.addEventListener("click", () => {
                    updateObject();
                    reloadPostOperation();
                });
            } else {
                btnSave.addEventListener("click", () => {
                    addObject();
                    reloadPostOperation();
                });
            }
            btnDelete.addEventListener("click", () => {
                removeObject();
                reloadPostOperation();
            });
            break;

        case "Categorías":
            if (loadFileDataCategories(idJson)) {
                btnSave.addEventListener("click", () => {
                    updateCategory();
                    reloadPostOperation();
                });
            } else {
                btnSave.addEventListener("click", () => {
                    addCategory();
                    reloadPostOperation();
                });
            }
            btnDelete.addEventListener("click", () => {
                removeCategory();
                reloadPostOperation();
            });
            break;

        case "Comentarios":
            if (loadFileDataComments(idUser, idObject)) {
                btnSave.addEventListener("click", () => {
                    updateComment();
                    reloadPostOperation();
                });
            } else {
                btnSave.addEventListener("click", () => {
                    addComment();
                    reloadPostOperation();
                });
            }

        case "Usuarios":
            if (loadFileDataUsers(idJson)) {
                btnSave.addEventListener("click", () => {
                    updateUser();
                    reloadPostOperation();
                });
            } else {
                btnSave.addEventListener("click", () => {
                    addUser();
                    reloadPostOperation();
                });
            }

            btnDelete.addEventListener("click", () => {
                removeUser();
                reloadPostOperation();
            });
            break;
    }
}

function reloadPostOperation() {
    let input = document.querySelector(".modal");
    input.remove();
    cleanTable();
    switch (titleTable.innerHTML) {
        case "Usuarios":
            usersCount();
            break;
        case "Productos":
            productsCount();
            break;
        case "Categorías":
            categoriesCount();
            break;
        case "Comentarios":
            break;
    }
}



function updateUser() {
    let fields = document.querySelectorAll(".inputModal");

    let jsonValues = {
        id_usuario: fields[0].id,
        usuario: fields[0].value,
        nombre: fields[1].value,
        apellidos: fields[2].value,
        rol: fields[3].value,
        correo: fields[5].value,
        password: fields[6].value,
        moneda: parseInt(fields[4].value),
    }
    let jsonFormat = JSON.stringify(jsonValues);

    let index = "aaa";
    fetch("http://localhost/ChristieMeta/index.php/api/actualizar_usuario/?q=" + jsonFormat)

        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {



        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();


    // fetch("http://localhost/ChristieMeta/index.php/api/actualizar_usuario", {
    //     method: 'POST',
    //     headers: {
    //         'Accept': 'application/json',
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify(jsonValues)
    // })
    //     .then((response) => response.text())
    //     // .then((responseText) => {
    //     //     alert(responseText);
    //     // })
    //     .catch((error) => {
    //         console.error(error);
    //     });
}



function updateObject() {
    let fields = document.querySelectorAll(".inputModal");
    var inputsFile = document.querySelectorAll(".file");
    var inputsFileChecked = [];
    let i = 0;
    inputsFile.forEach(element => {
        if (element.files[0] != undefined) {
            inputsFileChecked[i] = element.files[0].name;
        } else {
            inputsFileChecked[i] = "";
        }
        i++;
    });

    let jsonValues = {
        id_objeto: fields[0].id,
        nombre: fields[0].value,
        precio: parseInt(fields[1].value),
        puntuacion_total: parseInt(fields[2].value),
        latitud: parseFloat(fields[3].value),
        longitud: parseFloat(fields[4].value),
        id_categoria: parseInt(fields[5].value),
        fotografia1: inputsFileChecked[0],
        fotografia2: inputsFileChecked[1],
        fotografia3: inputsFileChecked[2],
        descripcion: fields[6].value,
    }
    let jsonFormat = JSON.stringify(jsonValues);

    fetch("http://localhost/ChristieMeta/index.php/api/actualizar_objeto/?q=" + jsonFormat)

        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {



        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}

function updateCategory() {
    let fields = document.querySelectorAll(".inputModal");

    let jsonValues = {
        nombre: fields[0].value,
        id_categoria: fields[0].id,
        //nombre:  fields[0].options[fields[0].selectedIndex].text,
        puntuacion: parseInt(fields[1].value),
        cod_categoria_padre: parseInt(fields[2].value),
        descripcion: fields[3].value,
    }
    let jsonFormat = JSON.stringify(jsonValues);

    fetch("http://localhost/ChristieMeta/index.php/api/actualizar_categoria/?categoria=" + jsonFormat)

        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {



        }).catch(function (error) {
            console.log("error request", error);
        });
    event.preventDefault();
}


function removeUser() {
    let fields = document.querySelectorAll(".inputModal");
    let idUser = fields[0].id;

    fetch("http://localhost/ChristieMeta/index.php/api/borrar_usuario/?id=" + idUser)
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

function removeObject() {
    let fields = document.querySelectorAll(".inputModal");
    let idObject = fields[0].id;

    fetch("http://localhost/ChristieMeta/index.php/api/borrar_objeto/?object=" + idObject)
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

function removeCategory() {
    let fields = document.querySelectorAll(".inputModal");
    let cat = fields[0].id;

    fetch("http://localhost/ChristieMeta/index.php/api/borrar_categoria/?categoria=" + cat)
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


function loadFileDataProducts(idJson) {
    var inputsModal = document.querySelectorAll(".inputModal");
    var inputsFile = document.querySelectorAll(".file");

    let fileProductList = [1, 2, 5, 3, 4, 14, 11];
    let fileFiles = ["fotografia1", "fotografia2", "fotografia3"];
    let idProduct;
    let emptyMark = false;

    let i = 0;
    jsonActual.forEach(element => {
        if (element[0] == idJson) {
            emptyMark = true;
            idProduct = element["id_objeto"];
            inputsModal[0].id = idProduct;
            inputsModal[5].value = element["id_categoria"];
            selectSelected = element["id_categoria"];
            inputsModal.forEach(element1 => {
                element1.value = element[fileProductList[i]];
                i++;
            });

        }
    });


    let x = 0;
    jsonActual.forEach(element => {
        var myFile;
        if (element[0] == idJson) {
            inputsFile.forEach(element1 => {

                if (fileFiles[x] != undefined && element[fileFiles[x]] != "" && element[fileFiles[x]] != null) {
                    emptyMark = true;

                    myFile = new File(['Hello World!'], '../images/' + element[fileFiles[x]], {
                        type: 'text/plain',
                        lastModified: new Date(),
                    });


                    //else {
                    //     myFile = new File(['Hello World!'], 'myFile.txt', {
                    //         type: 'text/plain',
                    //         lastModified: new Date(),
                    //     });
                    // }

                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(myFile);
                    element1.files = dataTransfer.files;
                    x++;
                }
            });
        }
    });

    if (emptyMark) {
        return true;
    } else {
        return false;
    }
}


function loadFileDataCategories(idJson) {
    var inputsModal = document.querySelectorAll(".inputModal");
    let fileProductList = [1, "puntuacion", "cod_categoria_padre", 3];
    let i = 0;
    let emptyMark = false;

    jsonActual.forEach(element => {
        if (element[0] == idJson) {
            inputsModal.forEach(element1 => {
                inputsModal[0].id = element["id_categoria"];
                element1.value = element[fileProductList[i]];
                i++;
                emptyMark = true;
            });
            return;
        }
    });
    if (emptyMark) {
        return true;
    } else {
        return false;
    }
}


function loadFileDataUsers(idJson) {
    var inputsModal = document.querySelectorAll(".inputModal");
    let fileProductList = [0, 3, 4, 5, 2, 7, 1];
    let i = 0;
    let emptyMark = false;

    jsonActual.forEach(element => {
        if (element[0] == idJson) {
            inputsModal.forEach(element1 => {
                emptyMark = true;
                element1.id = element["id_usuario"];
                element1.value = element[fileProductList[i]];
                i++;
            });
            return;
        }
    });
    if (emptyMark) {
        return true;
    } else {
        return false;
    }
}

function loadFileDataComments(idUser, idObject) {
    var inputsModal = document.querySelectorAll(".inputModal");
    let fileProductList = ["fecha", "id_usuario", "id_objeto", "texto"];
    let i = 0;
    let emptyMark = false;

    jsonActual.forEach(element => {
        if (element[1] == idUser && element[2] == idObject) {
            inputsModal.forEach(element1 => {
                emptyMark = true;
                //element1.id = element["id_usuario"];
                element1.value = element[fileProductList[i]];
                i++;
            });
            return;
        }
    });
    if (emptyMark) {
        return true;
    } else {
        return false;
    }
}

var btnAddItem = document.querySelector("#añadirItem");
btnAddItem.addEventListener("click", () => {

    deployModalWindow(titleTable.innerHTML);

    // switch (titleTable) {
    //     case "Categorías":
    //         addCategory();
    //         break;
    //     case "Productos":
    //         addObject();
    //         break;
    //     case "Comentarios":
    //         // addComment();
    //         break;
    //     case "Usuarios":
    //         addUser();
    //         break;
    // }
});


function updateComment() {
    let fields = document.querySelectorAll(".inputModal");

    let jsonValues = {
        fecha: fields[0].value,
        id_usuario: fields[1].value,
        id_objeto: fields[2].value,
        texto: fields[3].value,
    }

    let jsonFormat = JSON.stringify(jsonValues);

    fetch("http://localhost/ChristieMeta/index.php/api/actualizar_comentario/?q=" + jsonFormat)

        .then(checkStatus)
        .then(parseJSON)

    event.preventDefault();

}


function addUser() {
    let fields = document.querySelectorAll(".inputModal");
    let jsonValues = {
        id_usuario: fields[0].id,
        usuario: fields[0].value,
        nombre: fields[1].value,
        apellidos: fields[2].value,
        rol: fields[3].value,
        correo: fields[5].value,
        password: fields[6].value,
        moneda: parseInt(fields[4].value),
    }
    let jsonFormat = JSON.stringify(jsonValues);

    fetch('http://localhost/ChristieMeta/index.php/api/anadir_usuario/?usuario=' + jsonFormat)
        .then(checkStatus)
    event.preventDefault();
}

function addCategory() {
    let fields = document.querySelectorAll(".inputModal");

    let jsonValues = {
        nombre: fields[0].value,
        puntuacion: parseInt(fields[1].value),
        cod_categoria_padre: parseInt(fields[2].value),
        descripcion: fields[3].value,
    }
    let jsonFormat = JSON.stringify(jsonValues);

    fetch('http://localhost/ChristieMeta/index.php/api/anadir_categoria/?categoria=' + jsonFormat)
        .then(checkStatus)
    event.preventDefault();
}

function addObject() {
    let fields = document.querySelectorAll(".inputModal");

    var inputsFile = document.querySelectorAll(".file");
    var inputsFileChecked = [];
    let i = 0;
    inputsFile.forEach(element => {
        if (element.files[0] != undefined) {
            inputsFileChecked[i] = element.files[0].name;
        } else {
            inputsFileChecked[i] = "";
        }
        i++;
    });

    let jsonValues = {
        nombre: fields[0].value,
        precio: parseInt(fields[1].value),
        puntuacion_total: parseInt(fields[2].value),
        latitud: parseFloat(fields[3].value),
        longitud: parseFloat(fields[4].value),
        id_categoria: parseInt(fields[5].value),
        fotografia1: inputsFileChecked[0],
        fotografia2: inputsFileChecked[1],
        fotografia3: inputsFileChecked[2],
        descripcion: fields[6].value,
    }
    let jsonFormat = JSON.stringify(jsonValues);
    fetch('http://localhost/ChristieMeta/index.php/api/anadir_objeto/?objeto=' + jsonFormat)
        .then(checkStatus)

    event.preventDefault();
}

