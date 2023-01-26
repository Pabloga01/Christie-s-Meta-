<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <base href="http://localhost/ChristieMeta/">
    <link rel="stylesheet" href="view/front/css/login.css">
    <base href="http://localhost/ChristieMeta/">

</head>

<body>
    <div class="container right-panel-active col-10">


        <div class="container__form container--signin ">
            <form name="login" class="form" id="form2" enctype="multipart/form-data" action="index.php/loginprocess" method="post">
                <div class="input_block d-flex row justify-content-center mt-2">
                    <label for="username" class="text-start">Usuario</label>
                    <input type="text" name="username" placeholder="Nombre de usuario" class=" h-50  border border-0" />
                    <span id="checkUsername">a</span>
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="name" class="text-start">Nombre</label>
                    <input type="text" class=" h-50  border border-0" name="name" placeholder="Nombre" />
                    <span id="checkName">a</span>
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="surnames" class="text-start">Apellidos</label>
                    <input type="text" class=" h-50  border border-0" name="surnames" placeholder="Apellidos" />
                    <span id="checkSurnames">a </span>
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="mail" class="text-start">Correo </label>
                    <input type="email" class=" h-50  border border-0" name="mail" placeholder="Email" />
                    <span id="checkMail">a </span>
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="password" class="text-start">Contraseña </label>
                    <input type="password" class=" h-50 border border-0" name="password" placeholder="Debe contener mayús. y número" />
                    <span id="checkPassword">a </span>
                </div>
                <button class="btn">Registro</button>
            </form>
        </div>

        <div class="container__form container--signup">
            <form name="login" class="form" id="form1" enctype="multipart/form-data" action="index.php/loginprocess" method="post">
                <div id="headerLogo">
                    <img id="imgLogo" src="view/admin/images/logoFront.png">
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="correo" class="ri3-font text-start">Correo</label>
                    <input type="text" name="correo" placeholder="Correo electrónico" class="input ri3-font" />
                    <span id="checkMailLogin"> a</span>
                </div>
                <div class="input_block d-flex row justify-content-center">
                    <label for="password" class="text-start">Contraseña </label>
                    <input type="password" name="password" placeholder="Contraseña" class="input" />
                    <span id="checkPasswordLogin"> a</span>
                </div>

                <a href="#" class="link">¿Olvidaste tu contraseña?</a>
                <button class="btn">Acceder</button>
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
    <script src="view/front/js/login.js"></script>
</body>

</html>