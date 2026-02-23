<?php

require_once __DIR__ . '/../models/Producto.php';

class ProductoController{

    public function index(){
    $productos = Producto::obtenerTodos();
    require_once __DIR__ . '/../views/productos/index.php';
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto(
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                1
            );

            $producto->guardar();

            header('Location: /php_practica/mvc_productos_db/public/');
            exit;

        }
        
        require_once __DIR__ . '/../views/productos/create.php';
    }

    public function edit(){

        $id = $_GET['id'];
        $producto = Producto::obtenerPorId($id);
        require_once __DIR__ . '/../views/productos/edit.php';
    }

    public function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto(
                $_POST['nombre'],
                $_POST['precio'],
                $_POST['stock'],
                1
            );
            $producto->actualizar($_GET['id']);

            header('location: /php_practica/mvc_productos_db/public/');
            exit;
        }
    }

    public function delete(){
        $id = $_GET['id'];
        Producto::desactivar($id);
        header('Location: /php_practica/mvc_productos_db/public/');
        exit;
    }
}

?>