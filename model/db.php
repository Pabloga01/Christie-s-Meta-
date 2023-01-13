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

    public function loginBBDD($user,$password)
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
}
