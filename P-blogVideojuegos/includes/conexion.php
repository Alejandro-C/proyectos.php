<?php
// conexion
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "blog";
$port= 3308;

$bd = mysqli_connect($servidor,$usuario,$clave,$baseDatos, $port);

mysqli_query($bd, 'SET NAMES utf8');

// iniciando la sesion
if (!isset($_SESSION)) session_start();