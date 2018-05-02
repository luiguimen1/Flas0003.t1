<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoDAO
 *
 * @author TECH INSTITUTE PC8
 */
class ProductoDAO {

    //put your code here
    public function add($array) {
        $sql = "insert into producto (nombre,cantidad,precio,fkCategoria,des,foto) values(?,?,?,?,?,?);";
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $smtp = $conn->prepare($sql);
        // {"cat":"1","nom":"456","pre":"346","can":"36","des":"4564"}
        $ProductoVO = new ProductoVO();
        $ProductoVO->setCat($array->cat);
        $ProductoVO->setNom($array->nom);

        $cat = $ProductoVO->getCat();
        $nom = $ProductoVO->getNom();
        $precio = $array->pre;
        $can = $array->can;
        $des = $array->des;
        $foto = md5(time());

        $smtp->bind_param("sidiss", $nom, $can, $precio, $cat, $des, $foto);

        $resultado = array();

        if ($smtp->execute()) {
            $resultado["success"] = "ok";
            $resultado["foto"] = $foto;
        } else {
            $resultado["success"] = "no";
        }

        $smtp->close();
        $conn->close();
        echo json_encode($resultado);
    }

    public function ListXCat($array) {
        $sql = "select id,nombre,cantidad,precio,fkCategoria,des,foto from producto where fkcategoria = ?;";
        $ProductoVO = new ProductoVO();
        $ProductoVO->setFkCa($array->cat);
        $cat = $ProductoVO->getFkCa();
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $smtp = $conn->prepare($sql);
        $smtp->bind_param("i",$cat);
        
        $smtp->execute();
        $smtp->bind_result($id,$nom,$can,$pre,$fkC,$des,$fot);
        
         $respuesta = array();
        while ($smtp->fetch()) {
            $tmp = array();
            $tmp["id"] = $id;
            $tmp["nombre"] = $nom;
            $tmp["can"] = $can;
            $tmp["pre"] = $pre;
            $tmp["fkC"] = $fkC;
            $tmp["des"] = $des;
            $tmp["foto"] = $fot;
            $respuesta[sizeof($respuesta)] = $tmp;
        };
        
        echo json_encode($respuesta);
        $smtp->close();
        $conn->close();
        
    }

    public function prodXID($array) {
        
    }

    public function fotoXId($array) {
        $cuando = $array->Cod;
        $porquien = $array->nombre;

        $sql = "update producto set foto = ? where foto like ?;";

        // abcd
        //AbcD
        $BD = new ConectarBD();
        $conn = $BD->getMysqli();
        $smtp = $conn->prepare($sql);
        $smtp->bind_param("ss", $porquien, $cuando);

        $resp;
        if ($smtp->execute()) {
            $resp = true;
        } else {
            $resp = false;
        }
        
        $smtp->close();
        $conn->close();
        return $resp;
    }

}
