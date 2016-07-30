<?php
class CursoDto {
    
    private $idCurso = "";
    private $nombre = "";
    private $usuario = "";
            
    function getIdCurso() {
        return $this->idCurso;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}
?>