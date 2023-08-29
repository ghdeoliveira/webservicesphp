<?php

require_once "config.php";

$host = HOST;
$user = USER;
$pass = PASS;
$db = DB;

$conn = new mysqli($host, $user, $pass, $db);
mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) 
{
    die("Falha na conexão: " . $conn->connect_error);
} 
else 
{
    //echo "Conectado ao Banco de Dados MySql. <br>";
}

?>