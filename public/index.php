<?php 

require_once __DIR__ . '/../app/controllers/ProductoController.php';

$controller = new ProductoController();

$accion = $_GET['accion'] ?? 'index';

if ($accion === "create") {
    $controller->create();
} elseif ($accion === "edit"){
    $controller->edit();
} elseif ($accion === "delete"){
    $controller->delete();
}else {
    $controller->index();
}

?>