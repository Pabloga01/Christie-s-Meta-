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
            $sql = "select * from usuario where usuario='$user' and password='$password'";
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


    public function getListadoProductos(){

        $conexion = $this->getConexion();
        $sql = "select * from objeto";
        $registros = $conexion->query($sql);
        if ($registros->rowCount() > 0) {
            $datos_lista = [];
            foreach ($registros as $registro) {
                array_push($datos_lista,$registro);
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
