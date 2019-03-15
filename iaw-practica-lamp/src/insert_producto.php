<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Añadir Productos</title>
</head>

<body>

<?php
// including the database connection file
include_once("config.php");

//$codigo_producto = $_POST["codigo_producto"];
$nombre_producto = $_POST["nombre_producto"];
//$precio = $_POST["precio"];
//$fabricante = $_POST["nombre_fabricante"];

print_r($nombre_producto);
exit;

if (empty($nombre_producto) == 1){
	echo "<font color='red'>No se ha introducido ningun fabricante.";
	exit;
}


$query = "INSERT INTO producto (codigo, nombre, precio, fabricante) VALUES(?, ?, ?, ? )";
$codigo

// insert data to database
$statment = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($statment, "s", $nombre_producto);
mysqli_stmt_execute($statment);
mysqli_stmt_close($statment);


// display success message
echo "<font color='green'>Data added successfully.";
echo "<br/><a href='view_producto.php'>View Result</a>";

mysqli_close($mysqli);

?>

</body>
</html>
