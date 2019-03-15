<?php
// including the database connection file
include_once("config.php");


if(isset($_POST['Update'])) {
	$codigo = mysqli_real_escape_string($mysqli, $_POST['codigo']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);

	// checking empty fields
	if(empty($nombre)) {
			echo "<font color='red'>Name field is empty.</font><br/>";

	} else {
		// updating the table tambien comprueba que no te rompan el codigo
		$stmt = mysqli_prepare($mysqli, "UPDATE fabricante SET nombre='?' WHERE codigo='?'");
		mysqli_stmt_bind_param($stmt, "s", $nombre);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);
		

	  

		header("Location: dashboard_fabricante.php");
	}
}
?> 

<?php
// getting id from url
$codigo = $_GET['codigo'];

// selecting data associated with this particular id
$stmt = mysqli_prepare($mysqli, "SELECT nombre FROM fabricante WHERE codigo=?");
mysqli_stmt_bind_param($stmt, "i", $codigo);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nombre);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysli);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Data</title>
</head>

<body>
	<a href="dashboard_fabricante.php">Volver Atras</a>
	<br/><br/>

	<form name="form1" method="POST" action="edit_fabricante.php">
		<table border="0">
			<tr>
				<td>Nombre Fabricante</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre;?>"></td>
			</tr>


			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['codigo'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
