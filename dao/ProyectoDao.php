<?php
require '../modelo/Conexion.php';

class ProyectoDao {
        public function proyecto($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select proyecto.id as z, propuesta.descripcion as a,tema.descripcion as b, 
propuesta.estudiante as c,
usuario.nombre as d, proyecto.fecha as f ,proyecto.observacion as g,
proyecto.entrega as h, proyecto.estado as i
from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join proyecto on (proyecto.propuesta = propuesta.id)
inner join tema on (tema.id=propuesta.tema) where propuesta.estudiante=?';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function entrega($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select proyecto.id as z
from propuesta
inner join proyecto on (proyecto.propuesta = propuesta.id)
where propuesta.estudiante=? and proyecto.entrega = "0" limit 1;';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function actualizar ($a,$b,$c) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`proyecto` SET `fecha`=?, `entrega`=?, "
                    . "`estado`='1' WHERE `id`=?;");
            $query->bindParam(1,$a);
            $query->bindParam(2, $b);
            $query->bindParam(3, $c);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
        public function proyectodoc($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select proyecto.id as z,tema.descripcion as b, propuesta.descripcion as y,  
proyecto.fecha as f ,proyecto.observacion as g,
proyecto.entrega as h, proyecto.estado as i
from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join proyecto on (proyecto.propuesta = propuesta.id)
inner join tema on (tema.id=propuesta.tema) where proyecto.estado <>'0' and
propuesta.docente=? ;";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function observaciones ($a,$b) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`proyecto` SET `observacion`=?,"
                    . " `estado`='2' WHERE `id`=? ;");
            $query->bindParam(1,$a);
            $query->bindParam(2, $b);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }







        }
        
        