<?php

require '../modelo.dao/UsuarioDao.php';
require '../modelo.dto/UsuarioDto.php';
require '../utilidades/Conexion.php';

 if (isset($_POST['registro'])) {
    $uDao = new UsuarioDao();
    
    $uDto = new UsuarioDto();
    $uDto->setIdUsuario($_POST['documento']);
    $uDto->setNombre($_POST['nombre']);
    $uDto->setApellido($_POST['apellido']);
    $uDto->setDireccion($_POST['direccion']);
    $uDto->setClave($_POST['clave']);
    

    $mensaje = $uDao->registrarUsuario($uDto);
    
    header("Location: ../registro.php?mensaje=".$mensaje);
    
} 
else if ($_GET['id']!=NULL) {
    $uDao = new UsuarioDao();
    
    $mensaje = $uDao->eliminarUsuario($_GET['id']);
    
    header("Location: ../listado.php?mensaje=".$mensaje);
    
} 
else if (isset($_POST['modificar'])) {
    $uDao = new UsuarioDao();
    
    $uDto = new UsuarioDto();
    $uDto->setIdUsuario($_POST['documento']);
    $uDto->setNombre($_POST['nombre']);
    $uDto->setApellido($_POST['apellido']);
    $uDto->setDireccion($_POST['direccion']);
    $uDto->setClave($_POST['clave']);
    

    $mensaje = $uDao->modificarUsuario($uDto);
    header("Location: ../listado.php?mensaje=".$mensaje);
    
} 