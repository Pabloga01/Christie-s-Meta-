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

                if (isset($jsonParams['id_category'])) {
                    $idCategory = $jsonParams['id_category'];
                    array_push($arVar, " where objeto.id_categoria=$idCategory");
                }
                if (isset($jsonParams['price'])) {
                    $price = $jsonParams['price'];
                    if ($price != "") {
                        if (isset($jsonParams['id_category'])) {
                            array_push($arVar, " and objeto.precio<=$price");
                        } else {
                            array_push($arVar, " where objeto.precio<=$price");
                        }
                    }
                }
                if (isset($jsonParams['order_comments'])) {

                    $orderComments = $jsonParams['order_comments'];
                    if ($orderComments != "") {
                        if (intval($orderComments) == 0) {
                            $orderComments = "DESC";
                        } else if (intval($orderComments) == 1) {
                            $orderComments = "ASC";
                        }
                        array_push($arVar, " order by comentario.fecha $orderComments");
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
                        if (isset($jsonParams['order_comments'])) {
                            // array_push($arVar, " and order by venta.fecha $orderSales");
                        } else {
                            array_push($arVar, " order by venta.fecha $orderSales");
                        }
                        // array_push($arVar, " order by venta.fecha $orderSales");
                    }
                }

                // var_dump($arVar);
                $db = new Conexion();
                $items = $db->getFilteredItems($arVar);
                if (isset($items)) {
                    if ($items) {
                        echo json_encode($items);
                    }
                }
            }
        }
    }
}
