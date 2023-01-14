

var indiceActual = 0;
var nFilas = 1;
var botonAnterior, botonSiguiente, idMaximo;
var lista_productos = 0, cuentaActual = 0, filasTotales;

addEventListener("load", () => {
    // botonSiguiente = document.getElementsByName("siguiente")[0];
    // botonAnterior = document.getElementsByName("anterior")[0];
    // botonAnterior.disabled = true;
    createHeadBoard();
    fetch('http://localhost/ChristieMeta/index.php/api/listado_productos')
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            lista_productos = eval(json);
            if (lista_productos != undefined && lista_productos.length != 0) {
                fillTable(lista_productos);
                
            }


        }).catch(function (error) {
            console.log("error request", error);
        });

 //   event.preventDefault();
});




function mostrar_productos(n, criterioOrden) {
    //var numFilas = document.getElementById("selectFilas").value;
    var numFilas = 10;
    nFilas = numFilas;

    if (indiceActual >= 0) {
        if (criterioOrden == undefined) {
            criterioOrden = {
                "columna": { "columna": "", "criterio": "" },
            };
            var indice = indiceActual;
            indiceActual += parseInt(numFilas);

        } else {
            var indice = indiceActual - numFilas;
        }
        //var indice = 0;
    } else {
        indiceActual = 0;
        var indice = indiceActual;
        indiceActual += parseInt(numFilas);

    }
    if (numFilas == "") {
        document.getElementById("tabla").innerHTML = "";
        return;
    } else {

        fetch("http://localhost/ChristieMeta/index.php/api/listado_productos_crit/?q=" + numFilas + "&oculto=" + indice + "&criterio=" + criterioOrden["columna"].columna + "&orden=" + criterioOrden["columna"].criterio)
            .then(checkStatus)
            .then(parseJSON)
            .then(function (data) {
                var json = data;
                let resultados = eval(json);
                if (resultados != undefined && resultados.length != 0) {
                    createHeadBoard();

                    // var tabla = document.createElement('table');
                    // tabla.setAttribute("border", 1);
                    // var cabecera = construirCabecera();
                    // tabla.id = "tablaEmpleados";
                    // tabla.appendChild(cabecera);
                    // for (let i = 0; i < resultados.length; i++) {
                    //     let fila = construirFila(resultados[i], i);
                    //     tabla.appendChild(fila);
                    // }
                    // filasTotales = resultados.length;

                    // document.getElementById("tabla").innerHTML = "";
                    // document.getElementById("tabla").appendChild(tabla);

                    // let columnas = document.getElementsByTagName("th");

                    // for (let i = 0; i < columnas.length; i++) {
                    //     columnas[i].addEventListener("click", ordenarColumnas, false);
                    //     if (criterioOrden != undefined) {
                    //         let valor = devolverValorColumna(columnas[i].innerHTML);
                    //         if (valor == criterioOrden.columna.columna) {
                    //             if (criterioOrden.columna.criterio == "asc") {
                    //                 columnas[i].innerHTML = columnas[i].innerHTML + "(🔼)";
                    //             } else {
                    //                 columnas[i].innerHTML = columnas[i].innerHTML + "(🔽)";

                    //             }
                    //         }
                    //     }
                    // }

                }


            }).catch(function (error) {
                console.log('error request', error);
            });

    }

    if (criterioOrden == undefined) {
        criterioOrden = {
            "columna": { "columna": "", "criterio": "" }
        };
    }



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




function fillTable(arJson){
    var previousElement=document.getElementsByTagName("thead")[0];
    var tbody=document.createElement("tbody");
    insertAfter(tbody, previousElement);

    arJson.forEach(element => {
        var tr = document.createElement('tr');
        tr.classList.add('tr-shadow')
        tbody.appendChild(tr);
        var td = document.createElement('td');
        tr.appendChild(td);

        let arHeadersName = ["nombre", "descripcion", "precio", "categoria", "longitud", "latitud", "puntuacion_total"];
        for(let i=0;i<arHeadersName.length;i++){
            var td = document.createElement('td');
            td.innerHTML=element[arHeadersName[i]];
            tr.appendChild(td);
        }

    });

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


function parseJSON(response){
    return response.json();
}