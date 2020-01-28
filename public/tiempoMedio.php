<?php

$usuario = "sam";
$contrasena = "12345Abcde";
$servidor = "localhost";
$basededatos = "incidencias";

$conexion = mysqli_connect($servidor,$usuario,$contrasena);
$db = mysqli_select_db( $conexion, $basededatos );


$sqlQuery = "SELECT DATEDIFF(fechafin,created_at) as tiempoMedio FROM incidencias;";

$resultado = mysqli_query( $conexion, $sqlQuery );

$data = array();
foreach ($resultado as $row) {
    $data[] = $row;
}

mysqli_close($conexion);

echo json_encode($data);

?>
