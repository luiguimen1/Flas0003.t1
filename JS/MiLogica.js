/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    /**
     * esta es la funcion ajax que permite soliciatr al servidor datros
     * @param {type} URL
     * @param {type} parametros
     * @param {type} metodo
     * @return {undefined}
     */
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

    /**
     * Metodo que permite traer a la view sw Mercurio
     * @return {undefined}
     */
    function traerMercurio() {
        var url = "mercurio.php";
        var parametros = "acceso=true";
        var metodo = function (rrt) {
            $("#contenido").html(rrt);
        };
        fajax(url, parametros, metodo);
    }

    function traerVenus() {
        var url = "venus.php";
        var parametros = "acceso=true";
        var metodo = function (ssw) {
            $("#contenido").html(ssw);
        };
        fajax(url, parametros, metodo);
    }

    function itemTa(tmp) {
        var estr = $("<tr></tr>");
        estr.append("<td>" + tmp.id + "</td>" +
                "<td>" + tmp.nit + "</td>" +
                "<td>" + tmp.nombre + "</td>" +
                "<td>" + tmp.direccion + "</td>" +
                "<td>" + tmp.tele + "</td>" +
                "<td>" + tmp.contacto + "</td>" +
                "<td>" + tmp.actividadEco + "</td>" +
                "<td class='eliminar' post='" + tmp.id + "'>Eliminar</td>");
        $("#ListaTabla").append(estr);
    }

    var itemLocal;
    function asigEliminar() {
        $(".eliminar").click(function () {
            itemLocal = $(this);
            if (confirm("esta seguro de eliminar")) {
                var url = "Controller/Proveedor/delProveedor.php";
                var parametros = "id=" + $(this).attr("post");
                var metodo = function (datos) {
                    var data = $.parseJSON(datos);
                    if (data.sucess == "ok") {
                        alert("El proveedor fue Elimiando");
                        itemLocal.parent().remove();
                    } else {
                        alert("Hay regsitro dependientes en el sistema\n Comuniquese con el administrador");
                    }
                };
                fajax(url, parametros, metodo);
            }
        });
    }

    function traerFormulario() {
        var url = "View/proveedor/formulario.php";
        var parametros = "acceso=true";
        var metodo = function (ssw) {
            $("#contenido").html(ssw);
            $("#traerListado").click(function () {
                var url = "Controller/Proveedor/ListaProveedor.php";
                var parametros = "algo=si";
                $("#ListaTabla").html("");
                var metodo = function (datos) {
                    var data = $.parseJSON(datos);
                    var limite = data.length;
                    for (var i = 0; i < limite; i++) {
                        var local = data[i];
                        itemTa(local);
                    }
                    asigEliminar();
                };
                fajax(url, parametros, metodo);
            });


            $("#formRegistro").validate({
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
                    var parametros = $("#formRegistro").serialize();
                    var metodo = function (respuesta) {
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
        };
        fajax(url, parametros, metodo);
    }

    $("#BTMercurio").click(function () {
        traerMercurio();
    });

    $("#BTVenus").click(function () {
        traerVenus();
    });

    $("#Formulario").click(function () {
        traerFormulario();
    });


});