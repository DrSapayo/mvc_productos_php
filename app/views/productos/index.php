<!DOCTYPE html>
<html lang="es">
<body>
    <h2>Productos</h2>

    <a href="/php_practica/mvc_productos_db/public/?accion=create">Crear Producto</a>

    <ul>
    <?php foreach ($productos as $producto): ?>
        <li>
            <?= $producto->getNombre() ?> -
            $<?= $producto->getPrecio() ?> -
            Stock: <?= $producto->getStock() ?>
            <div>
                <a href="/php_practica/mvc_productos_db/public/?accion=edit&id=<?= $producto->getId() ?>">
                    Editar  
                </a>
            </div>
            <div>
                <a href="/php_practica/mvc_productos_db/public/?accion=delete&id=<?= $producto->getId() ?>"
                    onclick="return confirm('¿Eliminar producto?')">
                    Eliminar
                </a>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
    
</body>
</html>