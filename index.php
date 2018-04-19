<?php
require './Class/VO/ProveedorVO.php';
$miGato = new ProveedorVO();
$miGato->setNombre("Felix el gato");

?>


﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/miCSS.css">
        <script src="JS/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="JS/jquery.validate.js" type="text/javascript"></script>
        <script src="JS/additional-methods.js" type="text/javascript"></script>
        <script src="JS/localization/messages_es.js" type="text/javascript"></script>
        
        
        <script src="JS/MiLogica.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="pagina">
            <div id="enca">
                <center><h1>Sistemas de Información</h1></center>	
            </div>
            <div id="contec">
                <div id="menu" class="degRojo">
                    <h1>El menu <?php echo $miGato->getNombre(); ?></h1>
                    <ul>
                        <li><a id="BTMercurio">Mercurio</a></li>
                        <li><a id="BTVenus">Venus</a></li>
                        <li><a>Tierra</a></li>
                        <li><a id="Formulario">El formulario</a></li>
                    </ul>
                </div>
                <div id="contenido">
                    <center>
                        <h1>Sistema Solar</h1>
                        <?php for($i=0;$i<10;$i++){ ?>
                        <img src="img/SisSolar.jpg" alt=""/>
                        <?php } ?>
                    </center>
                </div>
            </div>
            <div id="pie">
                <div class="cajas">
                    <h2>Ubicación</h2>
                </div>
                <div class="cajas">
                    <h2>Redes</h2>
                    <p>id ghosi ghoir</p>
                </div>
                <div class="cajas">
                    <h2>Contactenos</h2>
                </div>
                <div class="cajas degVerde borButon">
                    <h2>Copy rigth@</h2>
                </div>
            </div>
        </div>
    </body>
</html>