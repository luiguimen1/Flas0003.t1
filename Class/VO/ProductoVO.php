<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoVO
 *
 * @author TECH INSTITUTE PC8
 */
class ProductoVO {
    //put your code here
    
    private $id;
    private $nom;
    private $des;
    private $cat;
    private $pre;
    private $foto;
    private $fkCa;
    
    
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getDes() {
        return $this->des;
    }

    function getCat() {
        return $this->cat;
    }

    function getPre() {
        return $this->pre;
    }

    function getFoto() {
        return $this->foto;
    }

    function getFkCa() {
        return $this->fkCa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setDes($des) {
        $this->des = $des;
    }

    function setCat($cat) {
        $this->cat = $cat;
    }

    function setPre($pre) {
        $this->pre = $pre;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setFkCa($fkCa) {
        $this->fkCa = $fkCa;
    }

}
