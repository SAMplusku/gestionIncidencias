<?php

$usuario = "sam";
$contrasena = "12345Abcde";
$servidor = "localhost";
$basededatos = "incidencias";

$conexion = mysqli_connect($servidor,$usuario,$contrasena);
$db = mysqli_select_db( $conexion, $basededatos );


$sqlQuery = "SELECT count(*) as numIncidencias, created_at as fechas FROM incidencias GROUP BY DATE(created_at);";


$resultado = mysqli_query( $conexion, $sqlQuery );

$data = array();
foreach ($resultado as $row) {
    $data[] = $row;
}



echo json_encode($data);

mysqli_close($conexion);
?>
