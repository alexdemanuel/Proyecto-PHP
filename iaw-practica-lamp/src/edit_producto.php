<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['codigo']);
    $codigo_producto = mysqli_real_escape_string($mysqli, $_POST['codigo_producto']);
	$nombre_producto = mysqli_real_escape_string($mysqli, $_POST['nombre_producto']);
	$precio = mysqli_real_escape_string($mysqli, $_POST['precio']);
	$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre_fabricante']);

	// checking empty fields
	if(empty($codigo_producto) || empty($nombre_producto) || empty($precio)|| empty($nombre_fabricante)) {
		if(empty($codigo_producto)) {
			echo "<font color='red'>codigo producto field is empty.</font><br/>";
		}

		if(empty($nombre_producto)) {
			echo "<font color='red'>nombre producto field is empty.</font><br/>";
		}

		if(empty($precio)) {
			echo "<font color='red'>Precio field is empty.</font><br/>";
        }
        if(empty($fabricante)) {
			echo "<font color='red'>Fabricante field is empty.</font><br/>";
		}
	} else {
		// updating the table tambien comprueba que no te rompan el codigo
		$stmt = mysqli_prepare($mysqli, "UPDATE producto SET name=?,age=?,email=? WHERE id=?");
		mysqli_stmt_bind_param($stmt, "ssiss", $codigo_producto, $nombre_producto, $precio, $fabricante, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_free_result($stmt);
		mysqli_stmt_close($stmt);

		// redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>

<?php
// getting id from url
$id = $_GET['codigo'];

// selecting data associated with this particular id
$stmt = mysqli_prepare($mysqli, "SELECT codigo, nombre, precio, codigo_fabricante FROM producto WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $codigo_producto, $nombre_producto, $precio, $fabricante);
mysqli_stmt_fetch($stmt);
mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
mysqli_close($mysli);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Producto</title>
</head>

<body>
	<a href="view_producto.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Codigo Producto</td>
				<td><input type="text" name="codigo_producto" value="<?php echo $codigo_producto;?>"></td>
			</tr>
			<tr>
				<td>Nombre Producto</td>
				<td><input type="text" name="nombre_producto" value="<?php echo $nombre_producto;?>"></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input type="text" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
            <tr>
				<td>Nombre Fabricante</td>
				<td><input type="text" name="nombre_fabricante" value="<?php echo $nombre_fabricante;?>"></td>
			</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['codigo'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
