<?php
class Conexion
{
    # definimos la variable
    private static $conn;

    public static function getConexion()
    {

        $host = "localhost"; // el host de donde se aloja la base de datos
        $dbName = "recuperacionphp"; // el nombre de la base de datos
        $dbUser = "root"; // el nombre de usuario de la base de datos
        $dbPassword = "root"; // la contraseña del usuario
        $dns = "mysql:host={$host};dbname={$dbName};charset=utf8";
        try {
            if (self::$conn === null) {
                self::$conn = new PDO($dns, $dbUser, $dbPassword);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conn;
        } catch (PDOException $e) {
            throw new Exception("error de conexion");
        }
    }


}