<?php

require_once("./controller/Controller.php");
require_once("./controller/DataController.php");
require_once("./controller/ApiController.php");
require_once("./controller/FrontController.php");
require_once("./model/db.php");
require_once("./model/Usuario.php");
require_once("./model/Categoria.php");
//require_once("./model/Mailer.php");

//$apiController = new ApiController;
$controller = new Controller;
$dataController = new DataController;
$apiController = new ApiController;
$frontController = new FrontController;

$home = "/ChristieMeta/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

$array_ruta = array_filter(explode("/", $ruta));

//acciones del api generando JSON backend
if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_productos") {
    $dataController->loadProductPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_categorias") {
    $dataController->loadCategoriesPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_comentarios") {
    $dataController->loadCommentsPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "listado_usuarios") {
    $dataController->loadUsersPagedList();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_usuario") {
    $dataController->updateUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_categoria") {
    $dataController->updateCategory();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_objeto") {
    $dataController->updateObject();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "actualizar_comentario") {
    $dataController->updateComment();

} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "borrar_usuario") {
    $dataController->removeUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "borrar_objeto") {
    $dataController->removeObject();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "borrar_categoria") {
    $dataController->removeCategory();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "borrar_comentario") {
    $dataController->removeComment();
}
 else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "anadir_usuario") {
    $dataController->addUser();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "anadir_objeto") {
    $dataController->addObject();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "anadir_categoria") {
    $dataController->addCategory();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "anadir_comentario") {
    $dataController->addComment();


//obtener pk de usuario e item a traves de nombres de comentario
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "consultar_comentario") {
    $dataController->getComment();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "consultar_categoria") {
    $dataController->getIdCategory();
}


//redirecciones del programa al backend
else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "login") {
    $controller->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "loginprocess") {
    $controller->login_check();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "restorepassword") {
    $controller->restore_password();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "home") {
    $controller->home();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "graficos") {
    $controller->graficos();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "informes") {
    $controller->informes();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "mapa") {
    $controller->mapa();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "admin" && isset($array_ruta[1]) && $array_ruta[1] == "cerrar_sesion") {
    $controller->exit_session();
}

//redirecciones del programa al front end

else if (isset($array_ruta[0]) && $array_ruta[0] == "login" && !isset($array_ruta[1])) {
    $frontController->login();
} else if (isset($array_ruta[0]) && $array_ruta[0] == "loginprocess" && !isset($array_ruta[1])) {
    $frontController->login_check();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "home" && !isset($array_ruta[1])) {
    $frontController->home();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "tienda" && !isset($array_ruta[1])) {
    $frontController->tienda();
}



//acciones del api generando JSON frontend
else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "slider_login") {
    $apiController->getLastCommentedItems();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "slider_notlogin") {
    $apiController->getMostValuableItems();
}else if (isset($array_ruta[0]) && $array_ruta[0] == "api" && isset($array_ruta[1]) && $array_ruta[1] == "filtrar_items") {
    $apiController->getFilteredItems();
}