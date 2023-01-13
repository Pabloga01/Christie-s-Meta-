<?php

class Controller
{
    function pagina()
    {
        require("view/aplicacion.php");
    }

    function login()
    {
        session_start();

        if (isset($_SESSION["mensaje_error"]) || !empty($_SESSION["mensaje_error"])) {
            $mensaje_error = $_SESSION["mensaje_error"];
            unset($_SESSION["mensaje_error"]);
        }

        require("view/admin/login.php");
    }



    function login_check()
    {
        session_start();
        if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["password"]) && $_POST["password"] != "") {
            $user = $_POST["user"];
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


    function restore_password()
    {
        session_start();

        if (isset($_SESSION["mensaje_correo"]) || !empty($_SESSION["mensaje_correo"])) {
            $mensaje = $_SESSION["mensaje_correo"];
            unset($_SESSION["mensaje_correo"]);
        }
        require("view/admin/forget-pass.php");
    }

    function home()
    {
        require("view/admin/index.php");
    }

    function recordar_password()
    {

    }

    function graficos()
    {
        require("view/admin/chart.php");
    }

    function informes()
    {
        require("view/admin/index.php");
    }

    function mapa()
    {

    }



    function paginacion()
    {
    }


    function cargar_vista()
    {
    }
}
