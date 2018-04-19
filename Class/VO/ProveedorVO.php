<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProveedorVO
 *
 * @author TECH INSTITUTE PC8
 */
class ProveedorVO {

    //put your code here
    private $id;
    private $nit;
    private $nombre;
    private $direccion;
    private $tele;
    private $contacto;
    private $actividadEco;
    
    function getId() {
        return $this->id;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTele() {
        return $this->tele;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getActividadEco() {
        return $this->actividadEco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTele($tele) {
        $this->tele = $tele;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setActividadEco($actividadEco) {
        $this->actividadEco = $actividadEco;
    }


}
