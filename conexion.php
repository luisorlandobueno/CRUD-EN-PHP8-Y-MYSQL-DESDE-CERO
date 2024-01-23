<?php

$servename = "localhost";
$username = "root";
$pass = "";
$dbname = "crud";


$conn = new mysqli($servename, $username, $pass, $dbname);

if ($conn->connect_error) {

    die("conexion fallida" . $conn->connect_error);
}
