<?php

// esto siempre tiene que se la primera linea del condigo si no peta
session_start();


//Esto es para acceder al al BD
include_once("config.php");

$email = $_POST["email"];
$password = $_POST["password"]; 

if (empty($email) == 1 || empty($password) == 1){
    header('Location: login.php');
	exit;
}

$query = "SELECT count(*) " .
         "FROM users " .
         "WHERE email = ? AND password = ?";

// insert data to database
$statment = mysqli_prepare($mysqli, $query);
mysqli_stmt_bind_param($statment, "ss", $email, md5($password));
mysqli_stmt_execute($statment);
$resultado = mysqli_stmt_get_result($statment);

if ($resultado->num_rows == 1){
    $_SESSION["logincorrecto"] = 1;
    header('Location: dashboard.php');
}else {
    $_SESSION['logincorrecto'] = 0;
    header('Location: index.php');
}
mysqli_stmt_close($statment);
mysqli_close($mysqli);
?>

