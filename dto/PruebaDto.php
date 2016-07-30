<?php
class PruebaDto { 
    private $idExamen = "";
    private $idPregunta = "";
    
    function getIdExamen() {
        return $this->idExamen;
    }

    function getIdPregunta() {
        return $this->idPregunta;
    }

    function setIdExamen($idExamen) {
        $this->idExamen = $idExamen;
    }

    function setIdPregunta($idPregunta) {
        $this->idPregunta = $idPregunta;
    }


     
}