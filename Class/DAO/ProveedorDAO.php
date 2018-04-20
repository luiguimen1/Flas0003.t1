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
        $ProveedorVO->setId($array["id"]);
        if ($ProveedorVO->getId() != "null") {
            $this->modificarProveedor($ProveedorVO);
        } else {
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
            $this->respuesta($conn,$stmp);
        }
    }

    private function modificarProveedor($ProveedorVO) {
        $sql = 'update proveedor set nit=?,nombre=?,direccion=?,tele=?,contacto=?,actividadEco=? where id = ?;';
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $ni = $ProveedorVO->getNit();
        $no = $ProveedorVO->getNombre();
        $di = $ProveedorVO->getDireccion();
        $te = $ProveedorVO->getTele();
        $con = $ProveedorVO->getContacto();
        $act = $ProveedorVO->getActividadEco();
        $id = $ProveedorVO->getId();
        $stmp->bind_param("ssssssi", $ni, $no, $di, $te, $con, $act, $id);
        $this->respuesta($conn,$stmp);
    }

    public function lista() {
        $sql = "select * from proveedor order by nombre;";
        $BD = new ConectarBD();
        echo json_encode($BD->query($sql));
    }

    public function listaXID($array) {
        $Proveedor = new ProveedorVO();
        $Proveedor->setId($array["Id"]);
        $sql = "select id, nit, nombre, direccion, tele, contacto, actividadEco from proveedor where id = ?;";
        //$sql = "select * from proveedor where id = ".$Proveedor->getId().";";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $stmp = $conn->prepare($sql);
        $id = $Proveedor->getId();
        $stmp->bind_param("i", $id);
        $stmp->execute();
        $stmp->bind_result($id, $nit, $nombre, $direccion, $tele, $contacto, $actividadEco);
        $respuesta = array();
        while ($stmp->fetch()) {
            $tmp = array();
            $tmp["id"] = $id;
            $tmp["nit"] = $nit;
            $tmp["nombre"] = $nombre;
            $tmp["direccion"] = $direccion;
            $tmp["tele"] = $tele;
            $tmp["contacto"] = $contacto;
            $tmp["actividadEco"] = $actividadEco;
            $respuesta[sizeof($respuesta)] = $tmp;
        }
        echo json_encode($respuesta);
        $stmp->close();
        $conn->close();
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
        $this->respuesta($conn,$stmp);
    }
    
    
    function respuesta($conn,$stmp){
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
