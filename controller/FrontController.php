<?php

class FrontController
{

    function login()
    {
        session_start();
        if (isset($_SESSION["mensaje_error"]) || !empty($_SESSION["mensaje_error"])) {
            $mensaje_error = $_SESSION["mensaje_error"];
            unset($_SESSION["mensaje_error"]);
        }
        require("view/front/login.php");
    }

    function login_check()
    {
        session_start();
        if (isset($_POST["correo"]) && $_POST["correo"] != "" && isset($_POST["password"]) && $_POST["password"] != "") {
            $user = $_POST["correo"];
            $password = $_POST["password"];

            $db = new Conexion();
            $login = $db->loginBBDD($user, $password);

            if ($login) {
                $_SESSION["loged_in"] = true;
                header("Location: /ChristieMeta/index.php/home");
            } else {
                $mensaje = "Inicio de sesión fallido. Usuario incorrecto2.";
                $_SESSION["mensaje_error"] = $mensaje;
                header("Location: /ChristieMeta/index.php/login");
            }
        } else {
            $mensaje = "Inicio de sesión fallido. Usuario incorrecto4.";
            $_SESSION["mensaje_error"] = $mensaje;
            header("Location: /ChristieMeta/index.php/login");
        }
    }


    function home()
    {
        session_start();
        require("view/front/home.php");
    }

    function listado()
    {
        session_start();
        require("view/front/listado.php");
    }
}
