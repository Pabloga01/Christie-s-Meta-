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
                $_SESSION["loged_in"] = $user;
                $user = $db->getUser($user, $password);
                if ($user != false) {
                     $_SESSION["username"] = $user->getNombre();
                }else{
                    $_SESSION["username"]=$_POST["user"];
                }
                header("Location: /ChristieMeta/index.php/admin/home");
                return true;
            } else {
                $mensaje = "Inicio de sesión fallido. Usuario incorrecto2.";
                $_SESSION["mensaje_error"] = $mensaje;
                header("Location: /ChristieMeta/index.php/admin/login");
                return false;
            }
        } else {
            $mensaje = "Inicio de sesión fallido. Usuario incorrecto4.";
            $_SESSION["mensaje_error"] = $mensaje;
            header("Location: /ChristieMeta/index.php/admin/login");
            return false;
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
        require_once("./model/sesiones.php");
        require("view/admin/index.php");
    }

    function recordar_password()
    {
    }

    function graficos()
    {
        require_once("./model/sesiones.php");
        require("view/admin/chart.php");
    }

    function informes()
    {
        require_once("./model/sesiones.php");
        require("view/admin/table.php");
    }

    function mapa()
    {
        require_once("./model/sesiones.php");
        require("view/admin/map.php");
    }




    function exit_session()
    {
        require_once("./model/sesiones.php");
        session_destroy();
        unset($_SESSION["loged_in"]);
        unset($_SESSION["username"]);
        header("Location: http://localhost/ChristieMeta/index.php/admin/login");
    }
}
