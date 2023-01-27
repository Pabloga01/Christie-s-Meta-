<?php
class ApiController
{

    function getMostValuableItems()
    {
        $db = new Conexion();
        $items = $db->getMostValuableItems();
        if (isset($items)) {
            if ($items) {
                echo json_encode($items);
            }
        }
    }

    function getLastCommentedItems()
    {
        $db = new Conexion();
        $items = $db->getLastCommentedItems();
        if (isset($items)) {
            if ($items) {
                echo json_encode($items);
            }
        }
    }

    function getFilteredItems()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                $arVar = [];

                // id_category: idCategory,
                // order_comments: orderComments,
                // order_sales: orderSales,
                // price: precio,
                $idCategory = "";
                $orderComments = "";
                $orderSales = "";
                $price = "";
                if (isset($jsonParams['search_value'])) {
                    $searchValue = $jsonParams['search_value'];
                    if ($searchValue != "") {
                        array_push($arVar, " where objeto.nombre like '%$searchValue%' ");
                    }
                }
                if (isset($jsonParams['id_category'])) {
                    $idCategory = $jsonParams['id_category'];
                    if (isset($jsonParams['search_value'])) {
                        if ($idCategory != "") {
                            array_push($arVar, " and objeto.id_categoria=$idCategory ");
                        }
                    } else {
                        if ($idCategory != "") {
                            array_push($arVar, " where objeto.id_categoria=$idCategory ");
                        }
                    }
                }
                if (isset($jsonParams['id_object'])) {
                    $idObject = $jsonParams['id_object'];
                    if ($idObject != "") {
                        array_push($arVar, " where objeto.id_objeto=$idObject ");
                    }
                }

                if (isset($jsonParams['price'])) {
                    $price = $jsonParams['price'];
                    if ($price != "") {
                        if (isset($jsonParams['id_category'])) {
                            array_push($arVar, " and objeto.precio<=$price ");
                        } else {
                            array_push($arVar, " where objeto.precio<=$price ");
                        }
                        array_push($arVar, " and objeto.precio <= $price ");
                    }
                }
                if (isset($jsonParams['order_comments'])) {

                    $orderComments = $jsonParams['order_comments'];
                    if ($orderComments != "") {
                        if (intval($orderComments) == 0) {
                            array_push($arVar, " order by objeto.puntuacion_comentarios desc");
                            // $orderComments = "DESC";
                        } else if (intval($orderComments) == 1) {
                            array_push($arVar, " order by objeto.puntuacion_comentarios asc");
                            // $orderComments = "ASC";
                        }
                    }
                }
                if (isset($jsonParams['order_sales'])) {

                    $orderSales = $jsonParams['order_sales'];
                    if ($orderSales != "") {
                        if ($orderSales == 0) {
                            $orderSales = "DESC";
                        } else if ($orderSales == 1) {
                            $orderSales = "ASC";
                        }
                        if (isset($jsonParams['order_comments']) && $jsonParams['order_comments'] != "") {
                            // array_push($arVar, " and order by venta.fecha $orderSales");
                        } else {
                            array_push($arVar, " order by objeto.puntuacion_compras $orderSales ");
                        }
                        // array_push($arVar, " order by venta.fecha $orderSales");
                    }
                }

                // var_dump($arVar);
                $db = new Conexion();
                $items = $db->getFilteredItems($arVar);
                if (isset($items)) {
                    if ($items != false) {
                        echo json_encode($items);
                    }
                }
            }
        }
    }


    function getItem()
    {

        if (isset($_GET["idItem"])) {
            $idItem = $_GET["idItem"];
            $db = new Conexion();
            $item = $db->getItemById($idItem);
            if (isset($item)) {
                if ($item) {
                    echo json_encode($item);
                }
            }
        }
    }


    function getCommentsByObject()
    {

        if (isset($_GET["idItem"])) {
            $idItem = $_GET["idItem"];
            $db = new Conexion();
            $item = $db->getCommentsByObject($idItem);
            if (isset($item)) {
                if ($item) {
                    echo json_encode($item);
                }
            }
        }
    }





    function buy_item()
    {
        if (isset($_GET["idItem"]) && isset($_GET["usuario"])) {
            $idItem = $_GET["idItem"];
            $usuario = $_GET["usuario"];
            $db = new Conexion();
            $item = $db->buyItem($idItem, $usuario);
            if (isset($item)) {
                if ($item) {
                    return true;
                }
            }
        }
        return false;
    }

    function comment_item()
    {
        if (isset($_GET["idItem"]) && isset($_GET["usuario"]) && isset($_GET["texto"])) {
            $idItem = $_GET["idItem"];
            $user = $_GET["usuario"];
            $text = $_GET["texto"];
            $db = new Conexion();
            $item = $db->commentItem($idItem, $user, $text);
            if (isset($item)) {
                if ($item) {
                    return true;
                }
            }
        }
        return false;
    }


    function getUserIdByUsertag()
    {
        if (isset($_GET["usuario"])) {
            $usuario = $_GET["usuario"];
            $db = new Conexion();
            $userId = $db->getUserId($usuario);
            if (isset($userId)) {
                if ($userId != false) {
                    echo $userId;
                }
            }
        }
    }

    function getUserByUsertag()
    {
        if (isset($_GET["usuario"])) {
            $usuario = $_GET["usuario"];
            $db = new Conexion();
            $user = $db->getUser2($usuario);
            if (isset($user)) {
                if ($user != false) {
                    echo json_encode($user);
                }
            }
        }
    }



    function getObjectsByCategory()
    {
        if (isset($_GET["idCategoria"])) {
            $idCategory = $_GET["usuario"];
            $db = new Conexion();
            $data = $db->getObjectsByCategory($idCategory);
            if (isset($data)) {
                if ($data != false) {
                    echo json_encode($data);
                }
            }
        }
    }




    function getObjectDetailed()
    {
        if (isset($_GET["idObject"])) {
            $idObject = $_GET["idObject"];
            $db = new Conexion();
            $item = $db->getObjectDetailed($idObject);
            if (isset($item)) {
                if ($item != false) {
                    var_dump($item);
                }
            }
        }
        return false;
    }















    function getFilteredCategories()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST)) {
                $foo = file_get_contents("php://input");
                $jsonParams = json_decode($foo, true);
                $arVar = [];



                if (isset($jsonParams['search_value']) && $jsonParams['select_value'] == "nombre") {
                    $searchValue = $jsonParams['search_value'];
                    if ($searchValue != "") {
                        array_push($arVar, " where nombre like '%$searchValue%' ");
                    }
                } else if (isset($jsonParams['search_value']) && $jsonParams['select_value'] == "descripcion") {
                    $searchValue = $jsonParams['search_value'];
                    if ($searchValue != "") {
                        array_push($arVar, " where descripcion like '%$searchValue%' ");
                    }
                } else if (isset($jsonParams['search_value']) && $jsonParams['select_value'] == "ordenMayor") {
                    $searchValue = $jsonParams['search_value'];
                    if ($searchValue != "") {
                        array_push($arVar, " where puntuacion > $searchValue ");
                    }
                } else if (isset($jsonParams['search_value']) && $jsonParams['select_value'] == "ordenMenor") {
                    $searchValue = $jsonParams['search_value'];
                    if ($searchValue != "") {
                        array_push($arVar, " where puntuacion < $searchValue ");
                    }
                }

                //  var_dump($arVar);
                $db = new Conexion();
                $items = $db->getFilteredCategories($arVar);
                if (isset($items)) {
                    if ($items != false) {
                        echo json_encode($items);
                    }
                }
            }
        }
    }



    function getObjectsGeoLoc()
    {
        $db = new Conexion();
        $items = $db->getObjectsGeoLoc();
        if (isset($items)) {
            if ($items != false) {
                echo json_encode($items);
            }
        }

        return false;
    }
}
