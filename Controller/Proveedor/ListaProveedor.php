<?php
if($_POST){
    require '../../Class/DAO/ProveedorDAO.php';
    require '../../Class/VO/ProveedorVO.php';
    require '../../Class/BD/datos.php';
    require '../../Class/BD/MySQLi.php';
    $ProveedorDAO = new ProvvedorDAO();
    $ProveedorDAO->lista();
}else{
    echo "El acceso es retringido";
    echo "<br>Su ip y nombre de maqui fueron registrados";
    echo "<br>Si continua con esta acceso el FIB lo perseguira";
    
}