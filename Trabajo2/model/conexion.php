<?php
class conexion
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=trabajo2;port=3307;charset=utf8','root', '12345678');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
