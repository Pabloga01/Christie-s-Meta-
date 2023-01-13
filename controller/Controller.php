<?php

class Controller
{
//sa
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



    function login_check(){

        if (isset($_POST["user"]) && $_POST["user"] != "" && isset($_POST["password"]) && $_POST["password"] != "") {
            $user = $_POST["user"];
            $password = $_POST["password"];
            try {
                $db = new Conexion();
                $conexion = $db->getConexion();
                $sql = "select * from usuario where usuario='$user' and password='$password'";
                $registros = $conexion->query($sql);
                if ($registros->rowCount() > 0) {
                    session_start();
                    $_SESSION["loged_in"] = true;
                    // foreach ($registros as $registro){
                    //     $id=$registro["id_usuario"];
                    // }
                    $registros->closeCursor();
                    $db = null;
                    header("Location: /ChristieMeta/index.php/home");
                } else {
                    $registros->closeCursor();
                    $db = null;
                    session_start();
                    $mensaje = "Inicio de sesión fallido. Usuario incorrecto2.";
                    $_SESSION["mensaje_error"] = $mensaje;
                    header("Location: /ChristieMeta/index.php/login");
                }

            } catch (PDOException $ex) {
                
                $mensaje = $ex ."Inicio de sesión fallido. Usuario incorrecto3.";
                session_start();
                $_SESSION["mensaje_error"] = $mensaje;
                header("Location: /ChristieMeta/index.php/login");
            }
        }else{
            $mensaje = "Inicio de sesión fallido. Usuario incorrecto4.";            
            session_start();
            $_SESSION["mensaje_error"] = $mensaje;
            header("Location: /ChristieMeta/index.php/login");
        }
     }


    function restore_password(){
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

    function paginacion()
    {
    }


    function cargar_vista()
    {
    }
}
