<?php
class Categoria
{
    private int $id_categoria;
    private string  $nombre;
    private int  $puntuacion;
    private string  $descripcion;
    private int  $cod_categoria_padre;
    private string  $fotografia;


    public function __construct($id_categoria, $nombre, $puntuacion, $descripcion,)
    {
        $this->id_categoria = $id_categoria;
        $this->nombre = $nombre;
        $this->puntuacion = $puntuacion;
        $this->descripcion = $descripcion;
    }

    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function getNombre():string{
        return $this->nombre;
    }

}
