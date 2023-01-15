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


    function loadProductPagedList()
    {
        if (isset($_GET['q']) && isset($_GET['indice']) ) {
            $q = intval($_GET['q']);
            $indice = intval($_GET['indice']);
          //  $criterio = $_GET['criterio'];
           // $orden = $_GET['orden'];

            $db = new Conexion();
            $datos = $db->getProductPagedList($q,$indice);
            if (isset($datos)) {
                if ($datos != false) {
                    echo json_encode($datos);
                }
            }
        }
    }
}
