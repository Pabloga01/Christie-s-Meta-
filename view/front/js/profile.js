

let btnExitSession = document.querySelector("#cerrarSesion");

addEventListener("load", () => {
    var usertag = document.querySelector(".usertag").innerHTML;
    fetch("http://localhost/ChristieMeta/index.php/api/consultar_user/?usuario=" + usertag)
        .then(checkStatus)
        .then(parseJSON)
        .then(function (data) {
            var json = data;
            let productList = eval(json);

            if (productList != undefined && productList.length != 0) {
                fillData(productList);
            }

        }).catch(function (error) {
            // console.log('error request', error);
        });


    function fillData(items) {


        document.querySelector(".name").innerHTML = items["nombre"];
        document.querySelector(".surname").innerHTML = items["apellidos"];
        document.querySelector(".mail").innerHTML = items["correo"];
        // document.querySelector(".password").innerHTML = items["password"];
        document.querySelector(".username").innerHTML = items["usuario"];
        document.querySelector(".rol").innerHTML = items["rol"];


    }
});













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