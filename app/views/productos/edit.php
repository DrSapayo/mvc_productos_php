<!DOCTYPE html>
<html lang="es">
<body>
    <form method="POST" action="/php_practica/mvc_productos_db/public/?accion=update&id=<?= $producto['id'] ?>">
        <input type="text" name="nombre" value=<?= $producto['nombre'] ?>>
        <input type="number" name="precio" value=<?= $producto['precio'] ?>>
        <input type="number" name="precio" value=<?= $producto['stock'] ?>>
        <select name="activo">
            <option value="1" <?= $producto['activo'] ? 'selected' : '' ?>>Activo</option>
            <option value="0" <?= !$producto['activo'] ? 'selected' : '' ?>></option>
        </select>
    </form>
    <button type="submit">Actualizar</button>
</body>
</html>