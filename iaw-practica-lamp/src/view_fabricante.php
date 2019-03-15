<?php
// including the database connection file
include_once("config.php");

//Indica que va ha acer una consulta
// fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM fabricante ORDER BY codigo ASC"); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
</head>

<body>
<a href="formulario_fabricante.php">Añadir nuevo fabricante</a><br/><br/>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Codigo</td>
		<td>Nombre</td>

	</tr>

	<?php
	//Recorre el objeto que en su interior tiene un array y devuelve los valores del array que indiquemos
	while($row = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td>".$row['codigo']."</td>\n";
		echo "<td>".$row['nombre']."</td>\n";


		echo "<td><a href=\"edit_fabricante.php?id=$row[id]\">Edit</a> | <a href=\"delete_fabricante.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>\n";
		echo "</tr>\n";
	}

	mysqli_close($msqli);
	?>
	</table>
</body>
</html>
