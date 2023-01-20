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
            $sql = "SELECT * FROM $itemName limit $indice , $q";
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





    public function updateUser($arVal, $idUser)
    {
        $paramsOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }
        $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "update usuario set $paramsOnString where id_usuario=$idUser";
            $registros = $conexion->query($sql);
            if ($registros) {
                // foreach ($registros as $registro){
                //     $id=$registro["id_usuario"];
                // }
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    public function updateObject($arVal, $id)
    {
        $paramsOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }
        $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "update objeto set $paramsOnString where id_objeto=$id";
            $registros = $conexion->query($sql);
            if ($registros) {

                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function updateCategory($arVal, $idCategory)
    {
        $paramsOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }
        //var_dump($arVal);
        echo $paramsOnString;
        $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "update categoria set $paramsOnString where id_categoria=$idCategory";
            $registros = $conexion->query($sql);
            if ($registros) {

                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function deleteUser($userId)
    {
        try {
            $conexion = $this->getConexion();
            $sql = "delete from usuario where id_usuario=$userId";
            $registros = $conexion->query($sql);
            if ($registros) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function deleteObject($idObject)
    {
        try {
            $conexion = $this->getConexion();
            $sql = "delete from objeto where id_objeto=$idObject";
            $registros = $conexion->query($sql);
            if ($registros) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function deleteCategory($idCategory)
    {
        try {
            $conexion = $this->getConexion();
            $sql = "delete from categoria where id_categoria=$idCategory";
            $registros = $conexion->query($sql);
            if ($registros) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function addCategory($arVal, $headers)
    {
        $paramsOnString = "";
        $headersOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }

        foreach ($headers as $element) {
            $headersOnString .= $element . ",";
        }

        echo $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        echo $headersOnString = substr($headersOnString, 0, strlen($headersOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "insert into categoria ($headersOnString) values ($paramsOnString)";
            $registros = $conexion->query($sql);
            if ($registros->rowCount() > 0) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }

    public function addObject($arVal, $headers)
    {
        $paramsOnString = "";
        $headersOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }

        foreach ($headers as $element) {
            $headersOnString .= $element . ",";
        }
        //var_dump($arVal);
        echo $paramsOnString;
        $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        $headersOnString = substr($headersOnString, 0, strlen($headersOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "insert into objeto ($headersOnString) values ($paramsOnString)";
            $registros = $conexion->query($sql);
            if ($registros) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }


    public function addUser($arVal, $headers)
    {
        $paramsOnString = "";
        $headersOnString = "";
        foreach ($arVal as $element) {
            $paramsOnString .= $element . ",";
        }

        foreach ($headers as $element) {
            $headersOnString .= $element . ",";
        }
        //var_dump($arVal);
        echo $paramsOnString = substr($paramsOnString, 0, strlen($paramsOnString) - 1);
        echo "<br>";
        echo $headersOnString = substr($headersOnString, 0, strlen($headersOnString) - 1);
        try {
            $conexion = $this->getConexion();
            $sql = "insert into usuario ($headersOnString) values ($paramsOnString)";
            $registros = $conexion->query($sql);
            if ($registros->rowCount() > 0) {
                $registros->closeCursor();
                $db = null;
                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $ex) {
            return false;
        }
    }
}
