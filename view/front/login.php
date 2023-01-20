<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <base href="http://localhost/ChristieMeta/">
    <link rel="stylesheet" href="view/front/css/login.css">
</head>

<body>
    <div class="container right-panel-active">
        <div class="container__form container--signup">
            <form action="#" class="form" id="form1">
                <div id="headerLogo">
                    <img id="imgLogo" src="view/admin/images/logoFront.png">
                    <h2 id="titulo" class="form__title">Login</h2>
                </div>
                <input type="text" placeholder="Correo electrónico" class="input" />
                <input type="password" placeholder="Contraseña" class="input" />
                <a href="#" class="link">¿Olvidaste tu contraseña?</a>
                <button class="btn">Acceder</button>
            </form>
        </div>

        <div class="container__form container--signin">
            <form action="#" class="form" id="form2">
                <h2 class="form__title">Registrarse</h2>
                <input type="email" placeholder="Email" class="input" />
                <input type="password" placeholder="Password" class="input" />
                <button class="btn">Sign In</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Registro</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Login</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>