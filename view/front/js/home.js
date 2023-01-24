
var sliderIndex = 0;
var sliderIndexFirst = 0;





addEventListener("load", () => {
    sliderCheckLogedIn();
    addListenersToButtons();
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
                    fillSlider(productList);
                }
            })
            .catch((error) => {
                console.error(error);
            });
    }
}


function fillSlider(itemList) {
    let arProductHeaders = [1, 2, 14];
    let i = 1;

    itemList.forEach(element => {
        let itemName = element[1];
        let itemPrice = element[2];
        let category = element[14];
        addToSlider(itemName, itemPrice, category, i);
        i++;
    });
}






function addToSlider(itemName, itemPrice, category, index) {
    let artHtml = document.querySelector("#articulo" + index);
    let nameHtml = document.querySelector(".nombre" + index);
    let priceHtml = document.querySelector(".precio" + index);
    let categoryHtml = document.querySelector(".categoria" + index);

    nameHtml.innerHTML = itemName;
    priceHtml.innerHTML = itemPrice;
    category.innerHTML = category;

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
                sliderIndex = sliderIndexFirst ;
            }
            let artHtml = document.querySelector("#articulo" + sliderIndexFirst);
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

            let artHtml = document.querySelector("#articulo" + sliderIndex);
            artHtml.style.display = "block";
        }


    })

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