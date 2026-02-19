/* Creamos la base de datos usando los atributos del mismo modelo de producto
y se usa el uft8m4 para soportar la mayoría de caracteres */

CREATE DATABASE mvc_productos CHARACTER SET uft8mb4;

USE mvc_productos;

/* Creamos la tabla en la base de datos, con un id que se auto incrementa
y es la primary key, varchar es el numero de caracteres, decimal usa el numero de digitos y
numero de decimales, tinyint es basicamente un booleano, 1 = true, 0 = false
se usa activo para usar el DELETE de manera lógica, no eliminando el elemento porque eso
rompería la bd, es decir, cuando sea 0 no se mostrará pero seguirá existiendo y el
created_at es para llevar registro de cuando se crean los objetos */

CREATE TABLE productos (

    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    activo TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);