<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvvedorDAO
 *
 * @author TECH INSTITUTE PC8
 */
class ProvvedorDAO {

    //put your code here
    /**
     * Metodo que permite Crear proveedor
     */
    public function crearProveedor($array) {
        $ProveedorVO = new ProveedorVO();
        $ProveedorVO->setNit($array["nit"]);
        $ProveedorVO->setActividadEco($array["act"]);
        $ProveedorVO->setContacto($array["cont"]);
        $ProveedorVO->setDireccion($array["dir"]);
        $ProveedorVO->setTele($array["tele"]);
        $ProveedorVO->setNombre($array["nom"]);
        $sql = 'insert into proveedor (nit,nombre,direccion,tele,contacto,actividadeco) '
                . 'values(?,?,?,?,?,?);';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $ni = $ProveedorVO->getNit();
        $no = $ProveedorVO->getNombre();
        $di = $ProveedorVO->getDireccion();
        $te = $ProveedorVO->getTele();
        $con = $ProveedorVO->getContacto();
        $act = $ProveedorVO->getActividadEco();
        $stmp->bind_param("ssssss", $ni, $no, $di, $te, $con, $act);

        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

    public function lista() {
        $sql = "select * from proveedor order by nombre;";
        $BD = new ConectarBD();
        echo json_encode($BD->query($sql));
    }

    public function eliminar($array) {
        $ProveedorVO = new ProveedorVO();
        $ProveedorVO->setId($array["id"]);

        $BD = new ConectarBD();

        $conn = $BD->getMysqli();

        $sql = "delete from proveedor where id = ?;";
        $stmp = $conn->prepare($sql);
        $id = $ProveedorVO->getId();
        $stmp->bind_param("i", $id);
        $respuesta = array();
        if ($stmp->execute() == 1) {
            $respuesta["sucess"] = "ok";
        } else {
            $respuesta["sucess"] = "no";
        }
        $stmp->close();
        $conn->close();
        echo json_encode($respuesta);
    }

}
