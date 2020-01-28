<?php

$usuario = "sam";
$contrasena = "12345Abcde";
$servidor = "localhost";
$basededatos = "incidencias";

$conexion = mysqli_connect($servidor,$usuario,$contrasena)or die("No se puede conectar con el servidor");
$db = mysqli_select_db( $conexion, $basededatos)or die("No se puede conectar a la base de datos");

if (!($conexion)) {
    echo "Error conectando a la base de datos.";
}

if (!$db) {
    echo "ERROR";
}

$sqlQuery = "SELECT count(*) as numIncidencias, DATE(created_at) as fechas FROM incidencias GROUP BY DATE(created_at);";

$resultado = mysqli_query( $conexion, $sqlQuery );

$data = array();
foreach ($resultado as $row) {
    $data[] = $row;
}

mysqli_close($conexion);

echo json_encode($data);
?>
