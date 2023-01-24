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
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
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
                    $password = "password='" . sha1(
                        $jsonParams['password']
                    ) . "'";
                    array_push($arVar, $password);
                }

                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->updateUser($arVar, $jsonParams['id_usuario']);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
        return false;
    }


    function updateObject()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idObj = 0;
            if (isset($_POST['id'])) {
                $idObj = $_POST['id'];
            }
            if (isset($_FILES)) {
                $fotos = [];
                if (isset($_FILES['fotografia1'])) {
                    $foto = $_FILES['fotografia1'];
                    array_push($fotos, $foto);
                }
                if (isset($_FILES['fotografia2'])) {
                    $foto = $_FILES['fotografia2'];
                    array_push($fotos, $foto);
                }
                if (isset($_FILES['fotografia3'])) {
                    $foto = $_FILES['fotografia3'];
                    array_push($fotos, $foto);
                }
                $i = 0;
                foreach ($fotos as $foto) {
                    $path = $foto["full_path"];
                    $name = $foto["name"];
                    $temp_name = $foto['tmp_name'];
                    $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_objetos\\$idObj\\$name";
                    if (!file_exists($file)) {
                        move_uploaded_file($temp_name, $file);
                    }
                }
                try {
                    $files = glob("C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_objetos\\$idObj\\*"); // get all file names
                    $i = 0;
                    foreach ($files as $file) {
                        if ($i > 2) {
                            @unlink($file);
                        }
                        $i++;
                    }
                } catch (Exception $ex) {
                }
            }

            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);

                $arVar = [];

                if (isset($jsonParams['nombre'])) {
                    $nombre = "nombre='" . $jsonParams['nombre'] . "'";
                    array_push($arVar, $nombre);
                }
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

                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->updateObject($arVar, $jsonParams['id_objeto']);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
            return false;
        }
    }


    function updateCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $idCat = 0;
            if (isset($_POST['id'])) {
                $idCat = $_POST['id'];
            }
            if (isset($_FILES)) {
                $fotos = [];
                if (isset($_FILES['fotografia'])) {
                    $foto = $_FILES['fotografia'];
                    array_push($fotos, $foto);
                }

                $i = 0;
                try {
                    foreach ($fotos as $foto) {
                        $path = $foto["full_path"];
                        $name = $foto["name"];
                        $temp_name = $foto['tmp_name'];
                        $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_categorias\\$idCat\\$name";
                        if (!file_exists($file)) {
                            $files = glob("C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_categorias\\$idCat\\*"); // get all file names
                            // foreach ($files as $f) {
                            //    if($f!))
                            //     @unlink($f);
                            // }
                            if($files[0]==$foto){
                                @unlink($files[1]);
                            }else{
                                @unlink($files[0]);

                            }

                            move_uploaded_file($temp_name, $file);
                        }
                    }
                } catch (Exception $ex) {
                }
            }

            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                $arVar = [];

                if (isset($jsonParams['nombre'])) {
                    $nombre = "nombre='" . $jsonParams['nombre'] . "'";
                    array_push($arVar, $nombre);
                }

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
                if (isset($jsonParams['fotografia'])) {
                    $fotografia = "fotografia='" . $jsonParams['fotografia'] . "'";
                    array_push($arVar, $fotografia);
                }
                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->updateCategory($arVar, $jsonParams["id_categoria"]);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
        return false;
    }

    function updateComment()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST)) {

                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                //var_dump(json_decode($_GET["categoria"], true));
                $arVar = [];
                if (isset($jsonParams['fecha'])) {
                    $fecha = "fecha='" . $jsonParams['fecha'] . "'";
                    array_push($arVar, $fecha);
                }

                if (isset($jsonParams['id_usuario'])) {
                    $id_usuario = "id_usuario=" . $jsonParams['id_usuario'];
                    array_push($arVar, $id_usuario);
                }

                if (isset($jsonParams['id_objeto'])) {
                    $id_objeto = "id_objeto=" . $jsonParams['id_objeto'];
                    array_push($arVar, $id_objeto);
                }

                if (isset($jsonParams['texto'])) {
                    $texto = "texto='" . $jsonParams['texto'] . "'";
                    array_push($arVar, $texto);
                }

                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->updateComment($arVar, $jsonParams["id_usuario_anterior"], $jsonParams["id_objeto_anterior"]);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
        return false;
    }



    function removeUser()
    {
        if (isset($_GET['id'])) {
            $db = new Conexion();
            $datos = $db->deleteUser($_GET['id']);
            if ($datos) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
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
        } else {
            return false;
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
        } else {
            return false;
        }
    }

    function removeComment()
    {
        if (isset($_GET['usuario']) && isset($_GET['objeto'])) {
            $db = new Conexion();
            $datos = $db->deleteComment($_GET['usuario'], $_GET['objeto']);
            if ($datos) {
                return true;
            } else {
                return false;
            }
        }
    }

    function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);

                $arVar = [];
                $paramsHeaders = [];

                if (isset($jsonParams['usuario']) && $jsonParams['usuario'] != "") {
                    $usuario = "'" . $jsonParams['usuario'] . "'";
                    array_push($arVar, $usuario);
                    array_push($paramsHeaders, "usuario");
                }

                if (isset($jsonParams['nombre']) && $jsonParams['nombre'] != "") {
                    $nombre = "'" . $jsonParams['nombre'] . "'";
                    array_push($arVar, $nombre);
                    array_push($paramsHeaders, "nombre");
                }

                if (isset($jsonParams['apellidos']) && $jsonParams['apellidos'] != "") {
                    $apellidos = "'" . $jsonParams['apellidos'] . "'";
                    array_push($arVar, $apellidos);
                    array_push($paramsHeaders, "apellidos");
                }

                if (isset($jsonParams['rol']) && $jsonParams['rol'] != "") {
                    $rol = "'" . $jsonParams['rol'] . "'";
                    array_push($arVar, $rol);
                    array_push($paramsHeaders, "rol");
                }

                if (isset($jsonParams['moneda'])) {
                    $moneda = $jsonParams['moneda'];
                    array_push($arVar, $moneda);
                    array_push($paramsHeaders, "moneda");
                }
                if (isset($jsonParams['correo']) && $jsonParams['correo'] != "") {
                    $correo = "'" . $jsonParams['correo'] . "'";
                    array_push($arVar, $correo);
                    array_push($paramsHeaders, "correo");
                }
                if (isset($jsonParams['password']) && $jsonParams['correo'] != "") {
                    $password = "'" . sha1($jsonParams['password']) . "'";
                    array_push($arVar, $password);
                    array_push($paramsHeaders, "password");
                }
                //var_dump($paramsHeaders);
                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->addUser($arVar, $paramsHeaders);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
        return false;
    }

    function addObject()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $idObj = 0;
            if (isset($_POST['id'])) {
                $idObj = $_POST['id'];
            }
            $images = [];
            if (isset($_FILES)) {
                if (isset($_FILES['fotografia1'])) {
                    $foto = $_FILES['fotografia1'];
                    array_push($images, $foto);
                }
                if (isset($_FILES['fotografia2'])) {
                    $foto = $_FILES['fotografia2'];
                    array_push($images, $foto);
                }
                if (isset($_FILES['fotografia3'])) {
                    $foto = $_FILES['fotografia3'];
                    array_push($images, $foto);
                }
            }


            if (isset($_POST)) {

                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);

                $arVar = [];
                $paramsHeaders = [];

                if (isset($jsonParams['nombre'])) {
                    $nombre = "'" . $jsonParams['nombre'] . "'";
                    array_push($arVar, $nombre);
                    array_push($paramsHeaders, "nombre");
                }
                if (isset($jsonParams['precio'])) {
                    $precio =  $jsonParams['precio'];
                    array_push($arVar, $precio);
                    array_push($paramsHeaders, "precio");
                }
                if (isset($jsonParams['puntuacion_total'])) {
                    $puntuacion_total =  $jsonParams['puntuacion_total'];
                    array_push($arVar, $puntuacion_total);
                    array_push($paramsHeaders, "puntuacion_total");
                }
                if (isset($jsonParams['latitud'])) {
                    $latitud =  $jsonParams['latitud'];
                    array_push($arVar, $latitud);
                    array_push($paramsHeaders, "latitud");
                }
                if (isset($jsonParams['longitud'])) {
                    $longitud =   $jsonParams['longitud'];
                    array_push($arVar, $longitud);
                    array_push($paramsHeaders, "longitud");
                }
                if (isset($jsonParams['id_categoria'])) {
                    $categoria =   $jsonParams['id_categoria'];
                    array_push($arVar, $categoria);
                    array_push($paramsHeaders, "id_categoria");
                }
                if (isset($jsonParams['fotografia1'])) {
                    $fotografia1 = "'" . $jsonParams['fotografia1'] . "'";
                    array_push($arVar, $fotografia1);
                    array_push($paramsHeaders, "fotografia1");
                }
                if (isset($jsonParams['fotografia2'])) {
                    $fotografia2 = "'" . $jsonParams['fotografia2'] . "'";
                    array_push($arVar, $fotografia2);
                    array_push($paramsHeaders, "fotografia2");
                }
                if (isset($jsonParams['fotografia3'])) {
                    $fotografia3 = "'" . $jsonParams['fotografia3'] . "'";
                    array_push($arVar, $fotografia3);
                    array_push($paramsHeaders, "fotografia3");
                }
                if (isset($jsonParams['descripcion'])) {
                    $descripcion = "'" . $jsonParams['descripcion'] . "'";
                    array_push($arVar, $descripcion);
                    array_push($paramsHeaders, "descripcion");
                }

                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->addObject($arVar, $paramsHeaders);
                    if (isset($datos)) {
                        if ($datos != false) {
                            echo $datos;
                            return true;
                        }
                    }
                } else if (count($images) > 0) {
                    $this->storeImagesOnDirectoryObject($idObj, $images);
                    return true;
                }
            }
        }
        return false;
    }

    function addCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $idCat = 0;
            if (isset($_POST['id'])) {
                $idCat = $_POST['id'];
            }
            $images = [];
            if (isset($_FILES)) {
                if (isset($_FILES['fotografia'])) {
                    $foto = $_FILES['fotografia'];
                    array_push($images, $foto);
                }
            }

            if (isset($_POST)) {
                $paramsHeaders = [];
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                $arVar = [];
                if (isset($jsonParams['nombre']) && $jsonParams['nombre'] != "") {
                    $nombre = "'" . $jsonParams['nombre'] . "'";
                    array_push($arVar, $nombre);
                    array_push($paramsHeaders, "nombre");
                }
                if (isset($jsonParams['puntuacion'])) {
                    $puntuacion = $jsonParams['puntuacion'];
                    array_push($arVar, $puntuacion);
                    array_push($paramsHeaders, "puntuacion");
                }
                if (isset($jsonParams['cod_categoria_padre'])) {
                    $cod_categoria_padre = $jsonParams['cod_categoria_padre'];
                    array_push($arVar, $cod_categoria_padre);
                    array_push($paramsHeaders, "cod_categoria_padre");
                }
                if (isset($jsonParams['descripcion']) && $jsonParams['descripcion'] != "") {
                    $descripcion = "'" . $jsonParams['descripcion'] . "'";
                    array_push($arVar, $descripcion);
                    array_push($paramsHeaders, "descripcion");
                }
                if (isset($jsonParams['fotografia'])) {
                    $fotografia ="'" . $jsonParams['fotografia']. "'";
                    array_push($arVar, $fotografia);
                    array_push($paramsHeaders, "fotografia");
                }
                // var_dump($paramsHeaders);
                // var_dump($arVar);
                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->addCategory($arVar, $paramsHeaders);
                    if (isset($datos)) {
                        if ($datos != false) {
                            echo $datos;
                            return true;
                        }
                    }
                } else if (count($images) > 0) {
                    $this->storeImagesOnDirectoryCategory($idCat, $images);
                    return true;
                }
            }
            return false;
        }
    }


    function addComment()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST)) {
                $paramsHeaders = [];
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                $arVar = [];
                if (isset($jsonParams['fecha']) && $jsonParams['fecha'] != "") {
                    $fecha = "'" . $jsonParams['fecha'] . "'";
                    array_push($arVar, $fecha);
                    array_push($paramsHeaders, "fecha");
                }
                if (isset($jsonParams['id_objeto'])) {
                    $id_objeto = $jsonParams['id_objeto'];
                    array_push($arVar, $id_objeto);
                    array_push($paramsHeaders, "id_objeto");
                }
                if (isset($jsonParams['id_usuario'])) {
                    $id_usuario = $jsonParams['id_usuario'];
                    array_push($arVar, $id_usuario);
                    array_push($paramsHeaders, "id_usuario");
                }
                if (isset($jsonParams['texto']) && $jsonParams['texto'] != "") {
                    $texto = "'" . $jsonParams['texto'] . "'";
                    array_push($arVar, $texto);
                    array_push($paramsHeaders, "texto");
                }

                if (count($arVar) > 0) {
                    $db = new Conexion();
                    $datos = $db->addComment($arVar, $paramsHeaders);
                    if (isset($datos)) {
                        if ($datos) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
        return false;
    }



    function getComment()
    {
        if (isset($_GET["usuario"]) && isset($_GET["objeto"])) {
            $db = new Conexion();
            $datos = $db->getComment($_GET["usuario"], $_GET["objeto"]);
            if ($datos != false) {
                echo json_encode($datos);
            }
        }
        return false;
    }

    function getIdCategory()
    {
        if (isset($_GET["id_categoria"])) {
            $db = new Conexion();
            $datos = $db->getCategory($_GET["id_categoria"]);
            if ($datos != false) {
                $category = $datos;
                echo $category->getNombre();

                //echo json_encode($datos);
            }
        }
        return false;
    }


    function createDirectoryCategory($idCat)
    {
        //$file = "http:\\\\localhost\\ChristieMeta\\view\\admin\\dir_categorias\\$idCat";
        $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_categorias\\$idCat";
        if (!file_exists($file)) {
            mkdir($file, 0777, true);
        }
    }

    function createDirectoryObject($idObj)
    {
        //$file = "http:\\\\localhost\\ChristieMeta\\view\\admin\\dir_categorias\\$idCat";
        $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_objetos\\$idObj";
        if (!file_exists($file)) {
            mkdir($file, 0777, true);
        }
    }


    function storeImagesOnDirectoryObject($idObj, $images)
    {
        foreach ($images as $foto) {
            $path = $foto["full_path"];
            $name = $foto["name"];
            $temp_name = $foto['tmp_name'];
            $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_objetos\\$idObj\\$name";
            if (!file_exists($file)) {
                move_uploaded_file($temp_name, $file);
            }
        }
        try {
            $files = glob("C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_objetos\\$idObj\\*"); // get all file names
            $i = 0;
            foreach ($files as $file) {
                if ($i > 2) {
                    @unlink($file);
                }
                $i++;
            }
        } catch (Exception $ex) {
        }
    }

    function storeImagesOnDirectoryCategory($idObj, $images)
    {
        foreach ($images as $foto) {
            $path = $foto["full_path"];
            $name = $foto["name"];
            $temp_name = $foto['tmp_name'];
            $file = "C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_categorias\\$idObj\\$name";
            if (!file_exists($file)) {
                $files = glob("C:\\xampp\\htdocs\\ChristieMeta\\view\\admin\\dir_categorias\\$idObj\\*"); // get all file names
                foreach ($files as $file) {
                    @unlink($file);
                }
                move_uploaded_file($temp_name, $file);
            }
        }
    }




    
}
