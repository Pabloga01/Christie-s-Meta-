<?php

class Usuario{

    private string $usuario;
    private string  $password;
    private float  $moneda;
    private string  $nombre;
    private string  $apellidos;
    private string  $rol;
    private string  $id_usuario;
    private string  $correo;

    public function __construct($usuario,$password,$moneda,$nombre,$apellidos,$rol,$id_usuario,$correo)
    {
        $this->usuario = $usuario;
        $this->password = $password;
        $this->moneda = $moneda;
        $this->nombre= $nombre;
        $this->apellidos = $apellidos;
        $this->rol = $rol;
        $this->id_usuario = $id_usuario;
        $this->correo= $correo;
    }

    public function setNombre(string $usuario){
        $this->usuario=$usuario;
    }

    public function getNombre():string{
        return $this->usuario;
    }

    
}
