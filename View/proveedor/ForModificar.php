<?php
ob_start();
session_name("Idprovvedor");
session_start();
if ($_POST) {
    $_SESSION["Idprovvedor"] = $_POST["Id"];
    require '../../Class/DAO/ProveedorDAO.php';
    require '../../Class/VO/ProveedorVO.php';
    require '../../Class/BD/datos.php';
    require '../../Class/BD/MySQLi.php';
    $ProveedorDAO = new ProvvedorDAO();
    ?>
    <center>
        <h1>Formulario Actualización del Proveedor</h1>
        <div class="COL-12">
            <div class="COL-4" style="float: left;">
                <form id="formRegistroM" name="formRegistroM">
                    <div class="COL-12">
                        <div class="label">
                            <label>Nit</label>
                        </div>
                        <div class="input">
                            <input type="text" id="nit" name="nit" value=""/>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Nombre proveedor</div>
                        <div class="input">
                            <input type="text" id="nom" name="nom" value=""/>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Direccion</div>
                        <div class="input">
                            <input type="text" id="dir" name="dir" value=""/>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Telefono</div>
                        <div class="input">
                            <input type="text" id="tele" name="tele" value=""/>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Contacto</div>
                        <div class="input">
                            <input type="text" id="cont" name="cont" value=""/>
                        </div>
                    </div>
                    <div class="COL-12">
                        <div class="label">Actividad economica</div>
                        <div class="input">
                            <textarea id="act" name="act"></textarea>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button type="submit" id="Ejecutar">Actualizar</button>
                            <button type="reset" id="limpiar">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </center>
    <script>
        $(document).ready(function () {
            function fajax(URL, parametros, metodo) {
                $.ajax({
                    url: URL,
                    data: parametros,
                    type: 'POST',
                    cache: false,
                    dataType: 'html',
                    success: function (ZZx) {
                        metodo(ZZx);
                    },
                    error: function (xhr, status) {
                        alert("Existe un problema");
                    }
                });
            }
            var data = <?php $ProveedorDAO->listaXID($_POST); ?>;
            //var data = $.parseJSON(data);
            if (data.length == 1) {
                data = data[0];
                $("#nit").val(data.nit);
                $("#nom").val(data.nombre);
                $("#dir").val(data.direccion);
                $("#tele").val(data.tele);
                $("#cont").val(data.contacto);
                $("#act").val(data.actividadEco);
                // idProvedorModi = data.id;

                $("#formRegistroM").validate({
                    rules: {
                        nit: {
                            required: true,
                            number: true,
                            digits: true
                        },
                        nom: {
                            required: true,
                            rangelength: [3, 70]
                        },
                        dir: {
                            required: true,
                            rangelength: [3, 100]
                        },
                        cont: {
                            required: true,
                            rangelength: [3, 70]
                        },
                        tele: {
                            required: true,
                            number: true,
                            digits: true,
                            rangelength: [7, 10]
                        },
                        act: {
                            required: true,
                            rangelength: [7, 200]
                        }
                    },
                    messages: {
                        CC: {
                            digits: "Upppsssss, No puede tener ni comas, ni puntos",
                            number: "Pilasss, debe ser su numero de Cedula"
                        }
                    },
                    submitHandler: function () {
                        var url = "Controller/Proveedor/ADDProvedor.php";
                        var parametros = $("#formRegistroM").serialize();
                        var metodo = function (respuesta) {
                            console.log(respuesta);
                            var data = $.parseJSON(respuesta);
                            if (data.sucess == "ok") {
                                $("#limpiar").trigger("click");
                                alert("Los datos fueron registrados en la BD");
                            } else {
                                alert("Los datos NO fueron registrados en la BD");
                            }
                        };
                        fajax(url, parametros, metodo);

                    }
                });
            } else {
                alert("El usuario buscado no existe\nSi el problema persiste comunique con su\nadministrador o cargue la lista");
            }


        });
    </script>

    <?php
} else {
    echo "El acceso es retringido";
    echo "<br>Su ip y nombre de maqui fueron registrados";
    echo "<br>Si continua con esta acceso el FIB lo perseguira";
}
