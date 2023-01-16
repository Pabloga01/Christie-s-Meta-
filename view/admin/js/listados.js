

var indiceActual = 0;
var nFilas = 1;
var botonAnterior, botonSiguiente, idMaximo;
var lista_productos = 0, cuentaActual = 0, filasTotales;
var actualIndex = 0;
var cursorNavigator = 1;
var totalObjectsLength = 0;

addEventListener("load", () => {

    fetch('http://localhost/ChristieMeta/index.php/api/listado_productos')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            lista_productos = eval(json);
            if (lista_productos != undefined && lista_productos.length != 0) {
                totalObjectsLength = lista_productos.length;
            }
        }).catch(function (error) {
            console.log("error request", error);
        });
    getProductPagedList();

    event.preventDefault();
});



var selectPags = document.querySelector("#select_paginas");

selectPags.addEventListener("change", () => {
    cleanTable();
    let value = selectPags.options[selectPags.selectedIndex].value;
    getProductPagedList();
    checkOnChangeLists();
});

// for (var i = 0; i < selectPags.children.length; i++) {
//     selectPags[i].addEventListener("click", () => {
//         getProductPagedList();
//     });
// }




function getProductPagedList(nIndex) {

    let nVisualizedRows = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if (nIndex == "" || nIndex == undefined) {
        actualIndex = 0;
    } else {
        actualIndex = nIndex;
    }
    // nFilas = numFilas;
    // if (indiceActual >= 0) {
    //     if (criteria == undefined || criteria == "") {
    //         criteria = {
    //             "columna": { "columna": "", "criterio": "" },
    //         };
    //         var indice = indiceActual;
    //         indiceActual += parseInt(numFilas);

    //     } else {
    //         var indice = indiceActual - numFilas;
    //     }
    //     //var indice = 0;
    // } else {
    //     indiceActual = 0;
    //     var indice = indiceActual;
    //     indiceActual += parseInt(numFilas);
    // }

    createHeadBoard();
    fetch("http://localhost/ChristieMeta/index.php/api/listado_productos_crit/?q=" + nVisualizedRows + "&indice=" + actualIndex)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            lista_productos = eval(json);
            if (lista_productos != undefined && lista_productos.length != 0) {
                fillTable(lista_productos);

            }


        }).catch(function (error) {
            console.log('error request', error);
        });



    // if (criteria == undefined) {
    //     criteria = {
    //         "columna": { "columna": "", "criterio": "" }
    //     };
    // }

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
    } else if (totalObjectsLength <(valueSelect * cursorNavigator) + valueSelect) {
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

function checkOnChangeLists(){
    let valueSelect = parseInt(selectPags.options[selectPags.selectedIndex].value);
    if(totalObjectsLength>valueSelect){
        enableButton("next");
    }else if(totalObjectsLength==valueSelect){
        disableButton("next");
    }else{
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
    tableData.remove();
    tableData1.remove();


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