<?php
// Esta clase conexion configuramos todos losparametros deconexion a la base de datos.
class conexion
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost:3310;dbname=trabajo2;port=3310;charset=utf8','root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
