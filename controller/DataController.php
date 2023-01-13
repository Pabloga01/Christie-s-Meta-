<?php

class DataController
{

    function cargarListadoProductos()
    {
        $db = new Conexion();
        $datos = $db->getListadoProductos();
        if (isset($datos)) {
            if ($datos != false) {
                echo json_encode($datos);
            }
        }
    }
}
