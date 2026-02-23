<?php

require_once __DIR__ . '/../config/database.php';

class Producto {

    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $activo;

    public function __construct($nombre, $precio, $stock, $activo) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->activo = $activo;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    
    public function getPrecio(){
        return $this->precio;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getActivo(){
        return $this->activo;
    }

    public static function obtenerTodos(){
        $db = Database::conectar();

        $sql = "SELECT * FROM productos WHERE activo = 1";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $productos = [];

        while ($fila = $stmt->fetch()){
            $producto = new Producto(
                $fila['nombre'],
                $fila['precio'],
                $fila['stock'],
                $fila['activo']
            );
            $producto->id = $fila['id'];
            $productos[] = $producto;
        }
        return $productos;
    }

    public function guardar(){

        $db = Database::conectar();

        $sql = 'INSERT INTO productos (nombre, precio, stock, activo)
                VALUES (:nombre, :precio, :stock, :activo)';
        
        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':nombre' => $this->nombre,
            ':precio' => $this->precio,
            ':stock' => $this->stock,
            ':activo' => $this->activo
        ]);
    }

    public static function obtenerPorId($id) {
        $db = Database::conectar();

        $sql = 'SELECT * FROM productos WHERE id = ? AND activo = 1';
        $stmt = $db->prepare($sql);

        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id) {
        $db = Database::conectar();
        $stmt = $db->prepare("
            UPDATE productos
            SET nombre = ?, precio = ?, stock = ?, activo = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $this->nombre,
            $this->precio,
            $this->stock,
            $this->activo,
            $id
        ]);
    }

    public static function eliminar($id) {
        $db = Database::conectar();
        $stmt = $db->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$id]);
    }

    public static function desactivar($id) {
        $db = Database::conectar();
        $stmt = $db->prepare("UPDATE productos SET activo = 0 WHERE id = ?");
        $stmt->execute([$id]);
    }

}

?>