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

        if (isset($_GET["q"])) {

            $jsonParams = json_decode($_GET["q"], true);
            json_decode($_GET["q"], true);
            $arVar = [];

            if (isset($jsonParams['usuario'])) {
                $usuario = "usuario='" . $jsonParams['usuario'] . "'";
                array_push($arVar, $usuario);
            }

            if (isset($jsonParams['nombre'])) {
                $nombre = "nombre='" . $jsonParams['nombre'] . "'";
                array_push($arVar, $nombre);
            }

            if (isset($jsonParams['apellidos'])) {
                $apellidos = "apellidos='" . $jsonParams['apellidos'] . "'";
                array_push($arVar, $apellidos);
            }

            if (isset($jsonParams['rol'])) {
                $rol = "rol='" . $jsonParams['rol'] . "'";
                array_push($arVar, $rol);
            }

            if (isset($jsonParams['moneda'])) {
                $moneda = "moneda=" . $jsonParams['moneda'];
                array_push($arVar, $moneda);
            }
            if (isset($jsonParams['correo'])) {
                $correo = "correo='" . $jsonParams['correo'] . "'";
                array_push($arVar, $correo);
            }
            if (isset($jsonParams['password'])) {
                $password = "password='" . $jsonParams['password'] . "'";
                array_push($arVar, $password);
            }

            if (count($arVar) > 1) {
                $db = new Conexion();
                $datos = $db->updateUser($arVar, $jsonParams['correo']);
                if (isset($datos)) {
                    if ($datos) {
                        echo "true";
                        return true;
                    } else {
                        echo "FALSE";
                        return false;
                    }
                }
            }
        }
    }


    function updateObject()
    {

        if (isset($_GET["q"])) {

            $jsonParams = json_decode($_GET["q"], true);
            var_dump(json_decode($_GET["q"], true));
            $arVar = [];

            if (isset($jsonParams['nombre'])) {
                $nombre = "nombre='" . $jsonParams['nombre'] . "'";
                array_push($arVar, $nombre);
            }

            // if (isset($jsonParams['id_objeto'])) {
            //     $id_objeto = "id_objeto='" . $jsonParams['id_objeto'] . "'";
            //     array_push($arVar, $id_objeto);
            // }

            if (isset($jsonParams['precio'])) {
                $precio = "precio=" . $jsonParams['precio'];
                array_push($arVar, $precio);
            }

            if (isset($jsonParams['puntuacion_total'])) {
                $puntuacion_total = "puntuacion_total=" . $jsonParams['puntuacion_total'];
                array_push($arVar, $puntuacion_total);
            }

            if (isset($jsonParams['latitud'])) {
                $latitud = "latitud=" . $jsonParams['latitud'];
                array_push($arVar, $latitud);
            }

            if (isset($jsonParams['longitud'])) {
                $longitud = "longitud=" . $jsonParams['longitud'];
                array_push($arVar, $longitud);
            }
            if (isset($jsonParams['id_categoria'])) {
                $categoria = "id_categoria=" . $jsonParams['id_categoria'];
                array_push($arVar, $categoria);
            }
            if (isset($jsonParams['fotografia1'])) {
                $fotografia1 = "fotografia1='" . $jsonParams['fotografia1'] . "'";
                array_push($arVar, $fotografia1);
            }
            if (isset($jsonParams['fotografia2'])) {
                $fotografia2 = "fotografia2='" . $jsonParams['fotografia2'] . "'";
                array_push($arVar, $fotografia2);
            }
            if (isset($jsonParams['fotografia3'])) {
                $fotografia3 = "fotografia3='" . $jsonParams['fotografia3'] . "'";
                array_push($arVar, $fotografia3);
            }
            if (isset($jsonParams['descripcion'])) {
                $descripcion = "descripcion='" . $jsonParams['descripcion'] . "'";
                array_push($arVar, $descripcion);
            }


            echo  $jsonParams["id_categoria"];
            if (count($arVar) > 1) {
                $db = new Conexion();
                $datos = $db->updateObject($arVar, $jsonParams['id_objeto']);
                if (isset($datos)) {
                    if ($datos) {
                        echo "true";
                        return true;
                    } else {
                        echo "FALSE";
                        return false;
                    }
                }
            }
        }
    }


    function updateCategory()
    {

        if (isset($_GET["categoria"])) {

            $jsonParams = json_decode($_GET["categoria"], true);
            //var_dump(json_decode($_GET["categoria"], true));
            $arVar = [];
            if (isset($jsonParams['nombre'])) {
                $nombre = "nombre='" . $jsonParams['nombre'] . "'";
                array_push($arVar, $nombre);
            }


            // if (isset($jsonParams['id_categoria'])) {
            //     $id_categoria = "id_categoria=" . $jsonParams['id_categoria'];
            //     array_push($arVar, $id_categoria);
            // }

            if (isset($jsonParams['puntuacion'])) {
                $puntuacion = "puntuacion=" . $jsonParams['puntuacion'];
                array_push($arVar, $puntuacion);
            }

            if (isset($jsonParams['cod_categoria_padre'])) {
                $cod_categoria_padre = "cod_categoria_padre=" . $jsonParams['cod_categoria_padre'];
                array_push($arVar, $cod_categoria_padre);
            }

            if (isset($jsonParams['descripcion'])) {
                $descripcion = "descripcion='" . $jsonParams['descripcion'] . "'";
                array_push($arVar, $descripcion);
            }

            if (count($arVar) > 1) {
                $db = new Conexion();
                $datos = $db->updateCategory($arVar, $jsonParams["anterior"]);
                if (isset($datos)) {
                    if ($datos) {
                     //   echo "true";
                        return true;
                    } else {
                      //  echo "FALSE";
                        return false;
                    }
                }
            }
        }
    }

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

    function removeObject()
    {
        if (isset($_GET['object'])) {
            $db = new Conexion();
            $datos = $db->deleteObject($_GET['object']);
            if ($datos) {
                return true;
            } else {
                return false;
            }
        }
    }

    function removeCategory()
    {
        if (isset($_GET['categoria'])) {
            $db = new Conexion();
            $datos = $db->deleteCategory($_GET['categoria']);
            if ($datos) {
                return true;
            } else {
                return false;
            }
        }
    }
}
