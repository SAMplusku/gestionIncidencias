<?php

$usuario = "sam";
$contrasena = "12345Abcde";
$servidor = "localhost";
$basededatos = "incidencias";

$conexion = mysqli_connect($servidor,$usuario,$contrasena);
$db = mysqli_select_db( $conexion, $basededatos );


$sqlQuery = "SELECT count(*) as inSitu, created_at as tarde FROM incidencias GROUP BY DATE(fechas);";

$resultado = mysqli_query( $conexion, $sqlQuery );

$data = array();
foreach ($resultado as $row) {
    $data[] = $row;
}

mysqli_close($conexion);

echo json_encode($data);

?>
