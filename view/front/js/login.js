var btnRegister = document.querySelector("#signIn");

btnRegister.addEventListener("click", () => {
    var loginDiv = document.querySelector(".container--signup");
    var SignUpDiv = document.querySelector(".container--signin");

    if (btnRegister.innerHTML != "Login") {
        btnRegister.innerHTML = "Login";
        loginDiv.style.zIndex =1;
        SignUpDiv.style.zIndex =2;
    } else {
        btnRegister.innerHTML = "Registro";
        SignUpDiv.style.zIndex =1;
        loginDiv.style.zIndex =2;
    }

});