<?php

session_start();

$_SESSION['logincorrecto'] = 0;

header("Location: login.php");
exit;


?>