<?php
class PreguntaDto { 
    private $id = "";
    private $rta = "";
    private $descrip = "";
    private $idCurso = "";
    private $estado = 0;
    
    function getId() {
        return $this->id;
    }      
    function getRta() {
        return $this->rta;
    }

    function getDescrip() {
        return $this->descrip;
    }

    function getIdCurso() {
        return $this->idCurso;
    }

    function getEstado() {
        return $this->estado;
    }
      function setId($id) {
        $this->id = $id;
    }

    function setRta($rta) {
        $this->rta = $rta;
    }

    function setDescrip($descrip) {
        $this->descrip = $descrip;
    }

    function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


    


    
    
    
}