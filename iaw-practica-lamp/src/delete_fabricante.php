<?php


// including the database connection file
include("config.php");

// getting id of the data from url
$codigo = $_GET['codigo'];

// deleting the row from table
$stmt = mysqli_prepare($mysqli, "DELETE FROM fabricante WHERE codigo=?");
mysqli_stmt_bind_param($stmt, "i", $codigo);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysqli);

header("Location:dashboard_fabricante.php");
?>

 