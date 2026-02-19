<?php

require_once __DIR__ . '/../app/config/database.php';

$db = Database::conectar();

echo "Conexión exitosa";

?>