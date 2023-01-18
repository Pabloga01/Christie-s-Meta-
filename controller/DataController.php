<?php

class DataController
{



    function loadProductPagedList()
    {
        if (isset($_GET['q']) && isset($_GET['indice'])) {
            $q = intval($_GET['q']);
            $indice = intval($_GET['indice']);
            //  $criterio = $_GET['criterio'];
            // $orden = $_GET['orden'];
            $db = new Conexion();
            $datos = $db->getItemPagedList($q, $indice, "objeto");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        } else {
            $db = new Conexion();
            $datos = $db->getItemList("objeto");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        }
    }


    function loadCategoriesPagedList()
    {
        if (isset($_GET['q']) && isset($_GET['indice'])) {
            $q = intval($_GET['q']);
            $indice = intval($_GET['indice']);
            //  $criterio = $_GET['criterio'];
            // $orden = $_GET['orden'];

            $db = new Conexion();
            $datos = $db->getItemPagedList($q, $indice, "categoria");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        } else {
            $db = new Conexion();
            $datos = $db->getItemList("categoria");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        }
    }

    function loadCommentsPagedList()
    {
        if (isset($_GET['q']) && isset($_GET['indice'])) {
            $q = intval($_GET['q']);
            $indice = intval($_GET['indice']);
            //  $criterio = $_GET['criterio'];
            // $orden = $_GET['orden'];

            $db = new Conexion();
            $datos = $db->getItemPagedList($q, $indice, "comentario");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        } else {
            $db = new Conexion();
            $datos = $db->getItemList("comentario");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        }
    }

    function loadUsersPagedList()
    {
        if (isset($_GET['q']) && isset($_GET['indice'])) {
            $q = intval($_GET['q']);
            $indice = intval($_GET['indice']);
            //  $criterio = $_GET['criterio'];
            // $orden = $_GET['orden'];

            $db = new Conexion();
            $datos = $db->getItemPagedList($q, $indice, "usuario");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        } else {
            $db = new Conexion();
            $datos = $db->getItemList("usuario");
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        }
    }



    function updateUser()
    {

        $arVar = [];
        if (isset($_POST['usuario'])) {
            $usuario = "usuario='" . $_POST['usuario'] . "'";
            array_push($arVar, $usuario);
        }

        if (isset($_POST['nombre'])) {
            $nombre = "nombre='" . $_POST['nombre'] . "'";
            array_push($arVar, $nombre);
        }

        if (isset($_POST['apellidos'])) {
            $apellidos = "apellidos='" . $_POST['apellidos'] . "'";
            array_push($arVar, $apellidos);
        }

        if (isset($_POST['rol'])) {
            $rol = "rol='" . $_POST['rol'] . "'";
            array_push($arVar, $rol);
        }

        if (isset($_POST['moneda'])) {
            $moneda = "moneda=" . $_POST['moneda'];
            array_push($arVar, $moneda);
        }
        if (isset($_POST['correo'])) {
            $correo = "correo='" . $_POST['correo'] . "'";
            array_push($arVar, $correo);
        }
        if (isset($_POST['password'])) {
            $password = "password='" . $_POST['password'] . "'";
            array_push($arVar, $password);
        }

        $db = new Conexion();
        $datos = $db->updateUser($arVar, $_POST['correo']);
        if (isset($datos)) {
            if ($datos) {
                require("view/admin/map.php");
                return true;
            } else {
                require("view/admin/map.php");

                return false;
            }
        }
    }

    // function updateObject(){
    //     $db = new Conexion();
    //     $datos = $db->
    //     if (isset($datos)) {
    //         if ($datos != false) {
    //             echo json_encode($datos);
    //         }
    //     }
    // }

    // function updateCategory(){
    //     $db = new Conexion();
    //     $datos = $db->
    //     if (isset($datos)) {
    //         if ($datos != false) {
    //             echo json_encode($datos);
    //         }
    //     }
    // }



    function removeUser()
    {

        if (isset($_GET['correo'])) {
            $db = new Conexion();
            $datos = $db->deleteUser($_GET['correo']);
            if ($datos) {
                return true;
            } else {
                return false;
            }
        }
    }
}
