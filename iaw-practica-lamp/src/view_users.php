<?php
session_start();

if ($_SESSION['logincorrecto'] = 0;){
	header("Location: login.php");
	exit;
}

// including the database connection file
include_once("config.php");

//Indica que va ha acer una consulta
// fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY name ASC"); 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Name</td>
		<td>First Surname</td>
		<td>Second Surname</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update</td>
	</tr>

	<?php
	//Recorre el objeto que en su interior tiene un array y devuelve los valores del array que indiquemos
	while($res = mysqli_fetch_array($result)) {
		echo "<tr>\n";
		echo "<td>".$res['name']."</td>\n";
		echo "<td>".$res['first_surname']."</td>\n";
		echo "<td>".$res['second_surname']."</td>\n";
		echo "<td>".$res['age']."</td>\n";
		echo "<td>".$res['email']."</td>\n";

		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>\n";
		echo "</tr>\n";
	}

	mysqli_close($msqli);
	?>
	</table>
</body>
</html>
