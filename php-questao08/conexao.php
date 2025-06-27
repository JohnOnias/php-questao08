<?php
$host = '127.0.0.1';
$user = 'root';
$password = '1225';
$database = 'loja';
$port = 3306; 
$conn = new mysqli($host, $user, $password, $database, $port);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>