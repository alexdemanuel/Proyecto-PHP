<?php
// including the database connection file
include_once("config.php");
$id=$_POST["id"];
//Indica que va ha realizar una consulta
// fetching data in descending order (lastest entry first)
$query = "SELECT producto.codigo AS codigo_producto, " .
                "producto.nombre AS nombre_producto, " .
                "producto.precio, producto.codigo_fabricante, " .
				"fabricante.nombre AS nombre_fabricante, " .
				"producto.imagen ".
         "FROM producto INNER JOIN fabricante ON producto.codigo_producto=$id";

$result = mysqli_query($mysqli, $query); 


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
</head>

<body>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td> Imágen </td>
		<td>Codigo producto</td>
		<td>Nombre producto</td>
        <td>Precio</td>
        <td>Codigo Fabrincante</td>
        <td>Nombre Fabrincante</td>
        <td> Descripcion del producto</td>

        

	</tr>

	<?php
	//Recorre el objeto que en su interior tiene un array y devuelve los valores del array que indiquemos
	while($row = mysqli_fetch_array($result)) {
 

		echo "<tr>\n";
		echo "<td><img src=\"".$row["imagen"]."\" width='100' heigth='100'></td> \n";
		echo "<td>".$row['codigo_producto']."</td>\n";
        echo "<td>".utf8_encode($row['nombre_producto'])."</td>\n";
        echo "<td>".$row['precio']."</td>\n";
        echo "<td>".$row['codigo_fabricante']."</td>\n";
		echo "<td>".$row['nombre_fabricante']."</td>\n";
		echo "</tr>";
	}

	mysqli_close($msqli);
	?>
	</table>
</body>
</html>
