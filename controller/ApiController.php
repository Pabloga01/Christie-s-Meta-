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
            if(isset($_POST)){

            }
        }
        $db = new Conexion();
        $items = $db->getFilteredItems();
        if (isset($items)) {
            if ($items) {
                echo json_encode($items);
            }
        }
    }
}
