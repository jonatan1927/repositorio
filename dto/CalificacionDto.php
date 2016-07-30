<?php

class CalificacionDto {
    private $idExamen = "";
    private $idEstudiante = "";
    private $calificacion = 0;
  
    function getIdExamen() {
        return $this->idExamen;
    }

    function getIdEstudiante() {
        return $this->idEstudiante;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function setIdExamen($idExamen) {
        $this->idExamen = $idExamen;
    }

    function setIdEstudiante($idEstudiante) {
        $this->idEstudiante = $idEstudiante;
    }

    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

   
    
    
}
?>