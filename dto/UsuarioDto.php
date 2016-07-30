<?php

class UsuarioDto {

    private $idUsuario = 0;
    private $nombre = "";
    private $apellido = "";
    private $direccion = "";
    private $clave = "";
    private $rol = "";
   

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getClave() {
        return $this->clave;
    }
    function getRol() {
        return $this->rol;
    }

        

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }
    function setRol($rol) {
        $this->rol = $rol;
    }




}
