<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$bd = 'bdejemplopdf';

$conexion = new mysqli($server, $user, $pass, $bd);
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno);
}

?>