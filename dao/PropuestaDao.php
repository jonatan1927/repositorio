<?php
require '../modelo/Conexion.php';

class PropuestaDao {
        public function propuesta($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select propuesta.id as a,tema.descripcion as b, propuesta.estudiante as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h,  propuesta.observacion as p,
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema)
where propuesta.estudiante =? ; ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function registrar ($a,$b,$c,$d,$e,$f,$g,$h) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO `casotres`.`propuesta` (`tema`, `estudiante`, `docente`, `estado`, 
`descripcion`, `veces`, `inicio`, `final`)
 VALUES (?,?,?,?,?,?,?,?);");
            $query->bindParam(1,$a);
            $query->bindParam(2, $b);
            $query->bindParam(3, $c);   
            $query->bindParam(4, $d); 
            $query->bindParam(5, $e);
            $query->bindParam(6, $f);
            $query->bindParam(7, $g);   
            $query->bindParam(8, $h);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
        public function tema($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select id as a, descripcion as b, cupos as c from tema where estado = 0 and categoria = ? ;';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
            public function categoria() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select id as a, nombre as b from categoria;';
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
            public function propuestadoc($idUsuario) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select propuesta.id as a,tema.descripcion as b, tema.cupos as z, 
                propuesta.docente as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h, 
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.estudiante)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema)
where  propuesta.estado ="3" and propuesta.docente =? ; ';
            $query = $cnn->prepare($listarUsuarios);
            $query->bindParam(1, $idUsuario);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
            public function estado($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select estado.id as a, estado.descripcion as b from propuesta
inner join estado on (propuesta.estado=estado.id) where propuesta.id=?;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
            public function soloestado() {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select id as a, descripcion as b from estado;';
            $query = $cnn->prepare($listarUsuarios);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
            public function propu($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select propuesta.descripcion as a from propuesta where propuesta.id=?;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
             public function veces($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select propuesta.veces as a from propuesta WHERE id=?;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function actualizar ($a,$b,$c,$d,$e,$f) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`propuesta` SET `estado`=?, `veces`=?, 
`inicio`=?, 
`final`=?, `observacion`=? WHERE `id`=?;");
            $query->bindParam(1,$a);
            $query->bindParam(2, $b);
            $query->bindParam(3, $c);   
            $query->bindParam(4, $d); 
            $query->bindParam(5, $e);
            $query->bindParam(6, $f);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
    public function proyect ($a,$b,$c,$d) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO `casotres`.`proyecto` (`propuesta`, `fecha`,
                `observacion`, `entrega`) 
VALUES (?,?,?,?);");
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
             public function uno($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select tema from propuesta where id =?;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }   
              public function dos($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select cupos as a from tema where id=?;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchColumn();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
    public function tres ($a,$b) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`tema` SET `cupos`=? WHERE `id`=?;");
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
        public function nuevotema ($a,$b,$c) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("INSERT INTO `casotres`.`tema`
                (`descripcion`, `categoria`, `cupos`) 
                VALUES (?,?,?);
");
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
    
                  public function completo($a) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select descripcion as d, categoria as ca ,cupos as c from tema where id =?';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
        public function actualizalo ($a,$b,$c,$d) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`tema` SET `descripcion`=?,
                `categoria`=?, `cupos`=? WHERE `id`=?;");
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
        public function estadotema ($a) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`tema` SET `estado`='1' WHERE `id`=?;");
            $query->bindParam(1,$a);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
            public function horario ($a,$b,$c) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`categoria` SET `inicio`=?, `final`=? WHERE `id`=?;");
            $query->bindParam(1,$a);
            $query->bindParam(2,$b);
            $query->bindParam(3,$c);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }
                  public function catebusca($a,$b) {
        $cnn = Conexion::getConexion();

        try {
            $listarUsuarios = 'select id as a, nombre as b from categoria where  final>? and ?>inicio;';
            $query = $cnn->prepare($listarUsuarios);
                        $query->bindParam(1, $a);
                        $query->bindParam(2, $b);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }
        public function actualizarest ($a,$b) {
        $cnn = Conexion::getConexion();
        $mensaje ="";
        try {
            $query = $cnn->prepare("UPDATE `casotres`.`propuesta` SET `descripcion`=? WHERE `id`=?;");
            $query->bindParam(1,$a);
            $query->bindParam(2,$b);
            $query->execute();
            $mensaje="1";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

    
    
    
    
}