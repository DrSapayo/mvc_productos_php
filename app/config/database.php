<?php

class Database {

    private static $host = 'localhost';
    private static $db = 'mvc_productos';
    private static $user = 'root';
    private static $pass = 'admin';
    private static $charset = 'uft8mb4';

    public static function conectar(){


{/*
El try, con la variable dns, lo que hace es hacer el string necesario para hallar la base de datos
Options, el ATTR_ERRMODE dá formato a los errores que pueda tener y el ATTR_DEFAULT_FETCH_MODE hace que lo que sea que
deba mostrar de los elementos tenga un formato parecido a un JSON facilitando la lectura y/o manipulacion
return inicializa el PDO con el string de la direccion de la bd, el user, la contra y las options para manejar los errores y que
no explote, ya luego en el catch se recibe lo que pueda retornar el options en la variable e y luego matar y mostrar el
error en cuestion
*/}
        try {
            $dns = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            return new PDO($dns, self::$user, self::$pass, $options);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>