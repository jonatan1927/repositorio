<?php
class EnunciadoDto { 
    private $id = 0;
    private $nominal = "";
    private $descrip = "";
    private $idPregunta = "";
    
    function getId() {
        return $this->id;
    }

    function getNominal() {
        return $this->nominal;
    }

    function getDescrip() {
        return $this->descrip;
    }

    function getIdPregunta() {
        return $this->idPregunta;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNominal($nominal) {
        $this->nominal = $nominal;
    }

    function setDescrip($descrip) {
        $this->descrip = $descrip;
    }

    function setIdPregunta($idPregunta) {
        $this->idPregunta = $idPregunta;
    }



        
}