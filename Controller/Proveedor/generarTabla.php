<?php

header('Access-Control-Allow-Origin: *');
// isset($_POST["pc"])
$json = file_get_contents("php://input");
$Local = json_decode($json);

$respuesta = array();

for ($i = 1; $i < $Local->n2; $i++) {
    $tmp = array();
    $tmp["n1"] = $Local->n1;
    $tmp["n2"] = $i;
    $tmp["resul"] = ($Local->n1 * $i);
    $respuesta[]=$tmp;
}
echo json_encode($respuesta);
