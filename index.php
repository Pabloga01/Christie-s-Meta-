<?php

require_once("./controller/Controller.php");
require_once("./controller/DataController.php");
require_once("./model/db.php");
//require_once("./model/Mailer.php");

//$apiController = new ApiController;
$controller = new Controller;
$dataController = new DataController;

$home = "/ChristieMeta/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

$array_ruta = array_filter(explode("/", $ruta));

//acciones del api generando JSON
if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_productos") {
    $dataController->loadProductPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_categorias") {
    $dataController->loadCategoriesPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_comentarios") {
    $dataController->loadCommentsPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_usuarios") {
    $dataController->loadUsersPagedList();
    
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_usuario") {
    $controller->login();

    //$dataController->updateUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_categoria") {
   // $dataController->updateCategory();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_objeto") {
  //  $dataController->updateObject();

} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "borrar_usuario") {
    $dataController->removeUser();
}


//redirecciones del programa
if (isset($array_ruta[0]) && $array_ruta[0] == "login" && !isset($array_ruta[1])) {
    $controller->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loginprocess" && !isset($array_ruta[1])) {
    $controller->login_check();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "restorepassword" && !isset($array_ruta[1])) {
    $controller->restore_password();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && !isset($array_ruta[1])) {
    $controller->home();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "graficos" && !isset($array_ruta[1])) {
    $controller->graficos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "informes" && !isset($array_ruta[1])) {
    $controller->informes();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "mapa" && !isset($array_ruta[1])) {
    $controller->mapa();
}
