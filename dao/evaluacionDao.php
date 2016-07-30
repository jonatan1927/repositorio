<?php
require '../modelo/Conexion.php';

class evaluacionDao {
        public function evaluar($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select* from (select categoria.nombre as a, tema.descripcion as b, usuario.nombre as c,
proyecto.propuesta as d,propuesta.descripcion as e,count(*) as f from proyecto
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id)
inner join categoria on (tema.categoria=categoria.id)
inner join usuario on (usuario.id=propuesta.estudiante)
where  proyecto.estado='2' and propuesta.docente=?
group by proyecto.propuesta) as de where f = '3';";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function idente($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select id from proyecto where propuesta =? limit 1;';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function nota ($a,$b,$c,$d) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO `casotres`.`evaluacion` "
                    . "(`proyecto`, `fecha`, `item`, `valor`) "
                    . "VALUES (?,?,?,?);");
            $query->bindParam(1,$a);
            $query->bindParam(2, $b);
            $query->bindParam(3, $c);
            $query->bindParam(4, $d);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
     

        public function evaluados($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select tema.descripcion as a ,propuesta.descripcion as b, avg(evaluacion.valor) as nota
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
where propuesta.docente =?
 group by evaluacion.proyecto;";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function actualizar ($a) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`proyecto` SET  `estado`='3' WHERE `propuesta`=?;");
            $query->bindParam(1,$a);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
        public function lanota($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select tema.descripcion as a ,propuesta.descripcion as b 
                ,propuesta.id as c,proyecto.segundoevaluador as se,
avg(evaluacion.valor) as nota
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
where propuesta.estudiante =?
 group by evaluacion.proyecto;";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function uno($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select id from proyecto where propuesta =?  limit 1;";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function dos($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select propuesta.docente, usuario.nombre from propuesta
inner join usuario on(usuario.id=propuesta.docente)
where propuesta.id=?;";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function tres($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select id as a,item as b, valor as c from evaluacion where proyecto=?";
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}

        public function notaadm() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select tema.descripcion as a ,propuesta.descripcion as b, propuesta.docente as doc
                ,propuesta.id as c,proyecto.segundoevaluador as se,
avg(evaluacion.valor) as nota
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
 group by evaluacion.proyecto;";
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function cambia ($c,$d) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`evaluacion` SET `valor`= ? WHERE `id`= ? ;");
            $query->bindParam(1,$c);
            $query->bindParam(2,$d);
            $query->execute();
            $mensaje="1";
     
   } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function segundoeva ($c) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`proyecto` SET `segundoevaluador`= '1' WHERE `propuesta`= ? ;");
            $query->bindParam(1,$c);
            $query->execute();
            $mensaje="1";
     
   } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
        public function datosss() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "    select categoria.nombre as a,tema.descripcion as b ,tema.cupos as c, 
dd.inscritos as d from 
(select tema as te, count(tema) as inscritos  from propuesta
group by tema order by tema) as dd LEFT OUTER join tema on
(dd.te=tema.id) inner join categoria on (tema.categoria=categoria.id);";
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function reporte() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select evaluacion.proyecto as a, avg(evaluacion.valor) as b,
proyecto.propuesta as c,propuesta.tema as d, substring(tema.descripcion,1,20)  as e
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
group by propuesta.tema;;";
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
        public function repo() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select id as a, cupos as b from tema;";
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}
    public function docenteuno ($c,$d) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`propuesta` SET `docente`=? WHERE `id`=?;");
            $query->bindParam(1,$c);
            $query->bindParam(2,$d);
            $query->execute();
            $mensaje="1";
     
   } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function docentedos ($c) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`proyecto` SET `estado`='2' WHERE `propuesta`=?;");
            $query->bindParam(1,$c);
            $query->execute();
            $mensaje="1";
     
   } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    
        public function evaluadores() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = "select id as a , nombre as b from usuario where rol=2;";
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
}

    
        }
        
        
 
        
        