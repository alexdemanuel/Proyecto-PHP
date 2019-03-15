CREATE DATABASE IF NOT EXISTS lamp_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE lamp_db;

CREATE USER IF NOT EXISTS 'lamp_user'@'%';

SET PASSWORD FOR 'lamp_user'@'%' = 'lamp_user';

GRANT ALL PRIVILEGES ON lamp_db.* TO 'lamp_user'@'%';


CREATE TABLE users (
  id int(11) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  age int(3) NOT NULL,
  email varchar(100) NOT NULL UNIQUE,
  password varchar(100) NOT NUll,
  
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE fabricante (
  codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
);

CREATE TABLE producto (
  codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  precio DOUBLE NOT NULL,
  codigo_fabricante INT UNSIGNED NOT NULL,
  imagen VARCHAR(1024) NOT NULL,
  FOREIGN KEY (codigo_fabricante) REFERENCES fabricante(codigo)
);

INSERT INTO users VALUES(1, "root", 20, "root@iaw.com", "$2y$10$qKrhxNE1KwIsqGnOFRouOuYNP9TzyxSDSDqYnbST9TAQVlpUQgHUO");

INSERT INTO fabricante VALUES(1, 'Asus');
INSERT INTO fabricante VALUES(2, 'Lenovo');
INSERT INTO fabricante VALUES(3, 'Hewlett-Packard');
INSERT INTO fabricante VALUES(4, 'Samsung');
INSERT INTO fabricante VALUES(5, 'Seagate');
INSERT INTO fabricante VALUES(6, 'Crucial');
INSERT INTO fabricante VALUES(7, 'Gigabyte');
INSERT INTO fabricante VALUES(8, 'Huawei');
INSERT INTO fabricante VALUES(9, 'Xiaomi');

INSERT INTO producto VALUES(1, 'Disco duro SATA3 1TB', 86.99, 5, '../assets/images/1.jpeg');
INSERT INTO producto VALUES(2, 'Memoria RAM DDR4 8GB', 120, 6, '../assets/images/2.jpeg');
INSERT INTO producto VALUES(3, 'Disco SSD 1 TB', 150.99, 4, '../assets/images/3.jpeg');
INSERT INTO producto VALUES(4, 'GeForce GTX 1050Ti', 185, 7, '../assets/images/4.jpeg');
INSERT INTO producto VALUES(5, 'GeForce GTX 1080 Xtreme', 755, 7, '../assets/images/5.jpeg');
INSERT INTO producto VALUES(6, 'Monitor 24 LED Full HD', 202, 1, '../assets/images/6.jpeg');
INSERT INTO producto VALUES(7, 'Monitor 27 LED Full HD', 245.99, 1, '../assets/images/7.jpeg');
INSERT INTO producto VALUES(8, 'Portátil Yoga 520', 559, 2, '../assets/images/8.jpeg');
INSERT INTO producto VALUES(9, 'Portátil Ideapd 320', 444, 2, '../assets/images/9.jpeg');
INSERT INTO producto VALUES(10, 'Impresora HP Deskjet 3720', 59.99, 3, '../assets/images/10.jpeg');
INSERT INTO producto VALUES(11, 'Impresora HP Laserjet Pro M26', 180, 3, '../assets/images/11.jpeg');
