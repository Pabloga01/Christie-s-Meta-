<?php


class Conexion
{

    private string $db_cadena;
    private string  $db_user;
    private string  $db_password;

    public function __construct()
    {
        $this->db_cadena = 'mysql:host=localhost;dbname=_christiesmeta';
        $this->db_user = 'root';
        $this->db_password = '';
    }

    public function getConexion()
    {
        return  $db = new PDO($this->db_cadena, $this->db_user, $this->db_password);
    }

    public function loginBBDD($user, $password)
    {
        try {
            $conexion = $this->getConexion();
            $sql = "select * from usuario where correo='$user' and password='$password'";
            $registros = $conexion->query($sql);
            if ($registros->rowCount() > 0) {
                // foreach ($registros as $registro){
                //     $id=$registro["id_usuario"];
                // }
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $registros->closeCursor();
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    public function getItemList($itemName)
    {

        $conexion = $this->getConexion();

        // if ($itemName == "objeto") {
        //     $sql = "SELECT * FROM $itemName ";
        // } else if ($itemName == "categoria") {
        //     $sql = "SELECT * FROM $itemName ";
        // } else {
        //     $sql = "select * from $itemName";
        // }
        $sql = "select * from $itemName";

        $registros = $conexion->query($sql);
        if ($registros->rowCount() > 0) {
            $datos_lista = [];
            foreach ($registros as $registro) {
                array_push($datos_lista, $registro);
            }
            $registros->closeCursor();
            $db = null;
            return $datos_lista;
            // echo json_encode($datos_lista);
        } else {
            $registros->closeCursor();
            $db = null;
            return false;
        }
    }


    public function getItemPagedList($q, $indice, $itemName)
    {

        $conexion = $this->getConexion();

        if ($itemName == "objeto") {
            $sql = "SELECT * FROM $itemName left outer join categoria on objeto.id_categoria=categoria.id_categoria limit $indice , $q";
        } else if ($itemName == "categoria") {
            $sql = "SELECT * FROM $itemName inner join objeto on categoria.id_categoria=objeto.id_categoria limit $indice , $q";
        } else {
            $sql = "select * from $itemName limit $indice , $q";
        }

        $registros = $conexion->query($sql);
        if ($registros->rowCount() > 0) {
            $datos_lista = [];
            foreach ($registros as $registro) {
                array_push($datos_lista, $registro);
            }
            $registros->closeCursor();
            $db = null;
            return $datos_lista;
            // echo json_encode($datos_lista);
        } else {
            $registros->closeCursor();
            $db = null;
            return false;
        }
    }
}
