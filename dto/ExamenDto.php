<?php
class ExamenDto { 
    private $idExamen = "";
    private $curso = "";
    private $horaInicio = "";
    private $horaFinal = "";
    
    function getIdExamen() {
        return $this->idExamen;
    }

    function getCurso() {
        return $this->curso;
    }

    function getHoraInicio() {
        return $this->horaInicio;
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }

    function setIdExamen($idExamen) {
        $this->idExamen = $idExamen;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }


    
    
    
}