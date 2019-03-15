<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Añadir fabricante</title>
</head>

<body>

<?php
// including the database connection file
include_once("config.php");

$nombre_fabricante = $_POST["nombre_fabricante"];


if (empty($nombre_fabricante) == 1){
	echo "<font color='red'>No se ha introducido ningun fabricante.";
	exit;
}


$query = "INSERT INTO fabricante (nombre) VALUES('".$nombre_fabricante."')";

// insert data to database
$statment = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($statment, "s", $nombre_fabricante);
mysqli_stmt_execute($statment);
mysqli_stmt_close($statment);


// display success message
echo "<font color='green'>Data added successfully.";
echo "<br/><a href='dashboard_fabricante.php'>View Result</a>";

mysqli_close($mysqli);

?>

</body>
</html>
