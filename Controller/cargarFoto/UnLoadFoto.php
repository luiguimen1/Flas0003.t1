<?php
require '../../Class/BD/datos.php';
require '../../Class/BD/MySQLi.php';
require '../../Class/DAO/ProductoDAO.php';


header('Access-Control-Allow-Origin: *');
// isset($_POST["pc"])
$json = file_get_contents("php://input");
$Local = json_decode($json);


$Local->POST = json_encode($_POST);

$post = json_decode($Local->POST);
$post->nombre = time().".jpg";

$ProductoDAO = new ProductoDAO();
if($ProductoDAO->fotoXId($post)){
    move_uploaded_file($_FILES["ionicfile"]["tmp_name"], "../../img/" . $post->nombre);
    echo $post->nombre;
}else{
    echo "no";
}



