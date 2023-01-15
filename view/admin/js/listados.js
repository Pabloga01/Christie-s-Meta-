

var indiceActual = 0;
var nFilas = 1;
var botonAnterior, botonSiguiente, idMaximo;
var lista_productos = 0, cuentaActual = 0, filasTotales;
var actualIndex = 0;
var cursorNavigator =1;

addEventListener("load", () => {
    getProductPagedList("");
    // botonSiguiente = document.getElementsByName("siguiente")[0];
    // botonAnterior = document.getElementsByName("anterior")[0];
    // botonAnterior.disabled = true;
    // createHeadBoard();
    // fetch('http://localhost/ChristieMeta/index.php/api/listado_productos')
    //     .then(checkStatus)
    //     .then(parseJSON)
    //     .then(function (data) {
    //         var json = data;
    //         lista_productos = eval(json);
    //         if (lista_productos != undefined && lista_productos.length != 0) {
    //             fillTable(lista_productos);

    //         }


    //     }).catch(function (error) {
    //         console.log("error request", error);
    //     });

    // event.preventDefault();
});



var selectPags = document.querySelector("#select_paginas");

selectPags.addEventListener("change", () => {
    cleanTable();
    let value = selectPags.options[selectPags.selectedIndex].value;
    getProductPagedList();
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

document.querySelector('#siguiente').addEventListener("click",()=>{
    next();
})

function next() {
    cleanTable();

    let valueSelect = selectPags.options[selectPags.selectedIndex].value;
    cursorNavigator++;
    let valor = (valueSelect * cursorNavigator) - valueSelect;
    getProductPagedList(valor);

    // let last = parseInt(valueSelect[valueSelect.length - 1].value);
    // var nextBtn = document.getElementsByName("siguiente")[0];


    // if (indiceActual - parseInt(nFilas) < last) {
    //     getProductPagedList();
    //     // if (indiceActual >= lista_productos) {
    //     //     botonSiguiente.disabled = true;
    //     // }
    // } else {
    //     indiceActual = last;
    //     // botonSiguiente.disabled = true;
    // }
}

function before() {
    let valueSelect = selectPags.options[selectPags.selectedIndex].value;

    let last = parseInt(valueSelect[valueSelect.length - 1].value);
    if (indiceActual > last) {
        indiceActual = last;
    }
    indiceActual = indiceActual - (nFilas * 2)
    getProductPagedList();
    // if (indiceActual == nFilas) {
    //     botonAnterior.disabled = true;
    // }
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