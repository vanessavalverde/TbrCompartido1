<?php
//Clase padre
class persona
{
    private $id;
    private $Nombre;
    private $Apellido;
    private $Edad;
    private $Genero;

    public function __CONSTRUCT($id,$Nombre, $Apellido, $Edad, $Genero)
    {
        try {
            $this->id=$id;
            $this->Nombre = $Nombre;
            $this->Apellido = $Apellido;
            $this->Edad = $Edad;
            $this->Genero = $Genero;
        } catch (Exception $e) {
            die($e->getMessEdad());
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }

    function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }
    function getNombre()
    {
        return $this->Nombre;
    }

    function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }
    function getApellido()
    {
        return $this->Apellido;
    }

    function setEdad($Edad)
    {
        $this->Edad = $Edad;
    }
    function getEdad()
    {
        return $this->Edad;
    }

    function setGenero($Genero)
    {
        $this->Genero = $Genero;
    }

    function getGenero()
    {
        return $this->Genero;
    }    
}
