<?php
header('Access-Control-Allow-Origin: *');

require '../../Class/BD/MySQLi.php';
require '../../Class/BD/datos.php';
require '../../Class/DAO/ProductoDAO.php';
require '../../Class/VO/ProductoVO.php';
$json = file_get_contents("php://input");
$Local = json_decode($json);
$ProductoDAO = new ProductoDAO();
$ProductoDAO->add($Local);



