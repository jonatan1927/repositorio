drop database casotres;
create database casotres;
use casotres;
/*tabla usuario rol 0 est, 1 admi, 2 docente */
CREATE TABLE IF NOT EXISTS `casotres`.`Usuario` (
    `id` VARCHAR(45) NOT NULL,
    `nombre` VARCHAR(200)  DEFAULT 'DATO NO SUMINISTRADO',
    `contrasena` VARCHAR(45) NOT NULL  DEFAULT '1234',
    `rol` VARCHAR(45) NOT NULL DEFAULT '0',
    `correo` VARCHAR(500),
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;
/*tabla categoria 0 poner, 1 quitar*/
CREATE TABLE IF NOT EXISTS `casotres`.`Categoria` (
    `id` int NOT NULL auto_increment ,
    `nombre` VARCHAR(200)  NOT NULL,
    `estado` VARCHAR(45) NOT NULL DEFAULT '0',
	`inicio` datetime ,
	`final` datetime ,

    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;
/*tabla estado 0 */
CREATE TABLE IF NOT EXISTS `casotres`.`Estado` (
    `id` int NOT NULL auto_increment ,
    `descripcion` VARCHAR(200)  NOT NULL,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB;
/*tabla tema 0 cupo, 1 no hay cupo*/
CREATE TABLE IF NOT EXISTS `casotres`.`Tema` (
    `id` int NOT NULL auto_increment ,
    `descripcion` VARCHAR(200) NOT NULL,
    `categoria` int NOT NULL,
    `cupos` INT NOT NULL,
    `estado` int NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
INDEX `fk_Categoria_Tema1_idx` (`categoria` ASC),
    CONSTRAINT `fk_Cat_Tema` FOREIGN KEY (`categoria`)
        REFERENCES `casotres`.`Categoria` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla propuesta*/
CREATE TABLE IF NOT EXISTS `casotres`.`Propuesta` (
    `id` int NOT NULL auto_increment ,
    `tema` int NOT NULL,
    `estudiante` VARCHAR(45) NOT NULL,
    `docente` VARCHAR(45) NOT NULL,
    `estado` int NOT NULL default 3,
    `descripcion` VARCHAR(2000) NOT NULL,
    `observacion` VARCHAR(2000) NOT NULL default 'no tiene',
    `veces` int NOT NULL DEFAULT 0,
    `inicio` datetime NOT NULL,
	`final` datetime NOT NULL,
    PRIMARY KEY (`id`),
INDEX `fk_tema_Propuesta1_idx` (`tema` ASC),
    CONSTRAINT `fk_Pro_Tema` FOREIGN KEY (`tema`)
        REFERENCES `casotres`.`Tema` (`id`),
INDEX `fk_estudiante_Propuesta2_idx` (`estudiante` ASC),
    CONSTRAINT `fk_Pro_Estudiante` FOREIGN KEY (`estudiante`)
        REFERENCES `casotres`.`Usuario` (`id`),
INDEX `fk_profesor_Propuesta3_idx` (`docente` ASC),
    CONSTRAINT `fk_Pro_Docente` FOREIGN KEY (`docente`)
        REFERENCES `casotres`.`Usuario` (`id`),
INDEX `fk_estado_Propuesta4_idx` (`estado` ASC),
    CONSTRAINT `fk_Pro_Estado` FOREIGN KEY (`estado`)
        REFERENCES `casotres`.`Estado` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Proyecto estado 0 = evaluando, 1= calificar 2 listo, 3 evaluado segunto = 0 no 1 si*/
CREATE TABLE IF NOT EXISTS `casotres`.`Proyecto` (
    `id` int NOT NULL auto_increment ,
    `propuesta` int NOT NULL ,
	`fecha` datetime NOT NULL,
    `observacion` VARCHAR(3000) NOT NULL,
    `entrega` VARCHAR(1000) NOT NULL,
    `estado` int NOT NULL default 0,
    `segundoevaluador` int NOT NULL default 0,
    PRIMARY KEY (`id`),
INDEX `fk_Proyecto_propu1_idx` (`propuesta` ASC),
    CONSTRAINT `fk_Proyect_Propuesta` FOREIGN KEY (`propuesta`)
        REFERENCES `casotres`.`Propuesta` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
/*tabla Evaluacion*/
CREATE TABLE IF NOT EXISTS `casotres`.`Evaluacion` (
    `id` int NOT NULL auto_increment ,
    `proyecto` int NOT NULL ,
	`fecha` datetime NOT NULL,
    `item` VARCHAR(1000) NOT NULL,
    `valor` int NOT NULL default 0,
    PRIMARY KEY (`id`),
INDEX `fk_Evaluacion_proyecto_idx` (`proyecto` ASC),
    CONSTRAINT `fk_Evalua_proyecto` FOREIGN KEY (`proyecto`)
        REFERENCES `casotres`.`Proyecto` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
)  ENGINE=InnoDB;
select* from categoria;
select* from Tema;
insert into Categoria values ('','Categoria 1','0','',''),
('','Categoria 2','0','',''),
('','Categoria 3','0','','');
insert into Tema values 
('','Sociedad Comerciales','1','12','0'),
('','Sociedades civiles','1','12','0'),
('','Sociedades de hecho','1','5','0'),
('','Responsabilidad por producto defectuoso','2','8','0'),
('','Responsabilidad civil por actividades peligrosas','2','10','0'),
('','Responsabilidad civil contrato de transporte','2','8','0'),
('','Responsabilidad civil contrato de fiducia','2','5','0'),
('','Responsabilidad civil extracontractual','2','8','0'),
('','Responsabilidad civil contractual','2','8','0'),
('','Sujetos de especial proteccion legal y 
constitucional, por su estado de debilidad manifiesta','3','10','0'),
('','Sujetos de especial proteccion legal y
constitucional, por razones etarias','3','12','0');
insert into usuario values ('1234','jonathan velasquez','1234','1','jdelrojo1927@gmail.com');
insert into usuario values ('4321','Juan ALIMAÑA','1234','2','');
insert into usuario values ('3214','Juan funes','1234','1','');
insert into usuario values ('2345','juan perez','1234','0','jvelasquez970@misena.edu.co');
insert into usuario values ('3456','juan ramirez','1234','2','jonatan1927v@hotmail.co');
select* from usuario;

insert into usuario (id,nombre) values ('9876','joselito baca');
INSERT INTO `casotres`.`estado` (`id`, `descripcion`) VALUES ('1', 'aprobar');

INSERT INTO `casotres`.`estado` (`id`, `descripcion`) VALUES ('2', 'rechasar');

INSERT INTO `casotres`.`estado` (`id`, `descripcion`) VALUES ('3 ', 'solicitar codificacion');


INSERT INTO `casotres`.`propuesta` (`tema`, `estudiante`, `docente`, `estado`, 
`descripcion`, `veces`, `inicio`, `final`)
 VALUES ('1', '2345', '3456', '1', 'muro de edificaciones', '1', 
'2016-04-12 00:07:59', '2016-05-12 00:07');
select correo as a from usuario where correo <> '';

select propuesta.id as a,tema.descripcion as b, propuesta.docente as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h, 
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.estudiante)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema)
where  propuesta.estado ="3" and propuesta.docente = '3456';


select propuesta.id as a,tema.descripcion as b, propuesta.estudiante as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h, 
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema);


select estado.id as a, estado.descripcion as b from propuesta
inner join estado on (propuesta.estado=estado.id) where propuesta.id='2';

select propuesta.descripcion as a from propuesta where propuesta.id='2';

select usuario.id from usuario;

select id as a, descripcion as b from tema where categoria = 1;
select id as a, nombre as b from categoria;
select id as a, descripcion as b from estado;
select* from tema;
select* from proyecto;
select* from propuesta;
select* from estado;


select propuesta.veces as a from propuesta WHERE id='1';

UPDATE `casotres`.`propuesta` SET `estado`='3', `veces`='2', 
`inicio`='2016-04-13 00:07:59', 
`final`='2016-04-21 00:07:00' WHERE `id`='1';

INSERT INTO `casotres`.`proyecto` (`propuesta`, `fecha`, `observacion`, `entrega`) 
VALUES ('1', '2016-04-12 00:07:59', '0', '0');

UPDATE `casotres`.`estado` SET `descripcion`='aprobado' WHERE `id`='1';

UPDATE `casotres`.`estado` SET `descripcion`='rechazado' WHERE `id`='2';

UPDATE `casotres`.`estado` SET `descripcion`='en revision' WHERE `id`='3';

select tema from propuesta where id ='6';
select cupos as a from tema where id='10';
UPDATE `casotres`.`tema` SET `cupos`='9' WHERE `id`='10';


select propuesta.id as a,tema.descripcion as b,tema.cupos as z, propuesta.estudiante as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h, 
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema);


select proyecto.id as z,tema.descripcion as b, propuesta.descripcion as z, 
proyecto.fecha as f ,proyecto.observacion as g,
proyecto.entrega as h, proyecto.estado as i
from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join proyecto on (proyecto.propuesta = propuesta.id)
inner join tema on (tema.id=propuesta.tema) where proyecto.estado <>0 and
propuesta.docente='3456';

select proyecto.id as z
from propuesta
inner join proyecto on (proyecto.propuesta = propuesta.id)
where propuesta.estudiante='2345' and proyecto.entrega = '0' limit 1;

select propuesta from proyecto where id='3';

	select* from (select  categoria.nombre as a, tema.descripcion as b, usuario.nombre as c,
	proyecto.propuesta as d,propuesta.descripcion as e,count(*) as f from proyecto
	inner join propuesta on(propuesta.id=proyecto.propuesta)
	inner join tema on (propuesta.tema=tema.id)
	inner join categoria on (tema.categoria=categoria.id)
	inner join usuario on (usuario.id=propuesta.estudiante)
	where  proyecto.estado='2' and propuesta.docente='3456'
	group by proyecto.propuesta) as de where f = '3';


select tema.descripcion,propuesta.descripcion,propuesta.id, avg(evaluacion.valor) as nota
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
where propuesta.estudiante ='2345'
 group by evaluacion.proyecto;

select id from proyecto where propuesta ='8'  limit 1;

select propuesta.docente, usuario.nombre from propuesta
inner join usuario on(usuario.id=propuesta.docente)
where propuesta.id='3';

select id as a,item as b, valor as c from evaluacion where proyecto='6';


select* from evaluacion;
select* from proyecto;
select* from propuesta;

UPDATE `casotres`.`proyecto` SET  `estado`='2' WHERE `propuesta`='6';
use casotres;
select* from tema;

INSERT INTO `casotres`.`tema`
                (`descripcion`, `categoria`, `cupos`) 
                VALUES ('parques','1','34');

select descripcion as d, categoria as ca ,cupos as c from tema
select descripcion as d, categoria as ca ,cupos as c from tema where id =14;
UPDATE `casotres`.`evaluacion` SET `valor`= 5 WHERE `id`= 40;

select evaluacion.proyecto as a, avg(evaluacion.valor) as b,
proyecto.propuesta as c,propuesta.tema as d, substring(tema.descripcion,1,20)  as e
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
group by propuesta.tema;

    select categoria.nombre as a,tema.descripcion as b ,tema.cupos as c, 
dd.inscritos as d from 
(select tema as te, count(tema) as inscritos  from propuesta
group by tema order by tema) as dd LEFT OUTER join tema on
(dd.te=tema.id) inner join categoria on (tema.categoria=categoria.id)

select descripcion as a, cupos as b from tema;
select* from tema;
select t
use casotres;
select* from categoria;
select id as a, nombre as b from categoria where  final>'2016-04-20 12:58:04' and
'2016-04-16 12:58:04'>inicio;
select* from propuesta;
select* from estado;

select propuesta.id as a,tema.descripcion as b, propuesta.estudiante as c,
usuario.nombre as d,
estado.descripcion as e,
propuesta.descripcion as f, propuesta.veces as g,propuesta.inicio as h,  propuesta.observacion as p,
propuesta.final as j  from usuario
inner join propuesta on (usuario.id = propuesta.docente)
inner join estado on (estado.id = propuesta.estado)
inner join tema on (tema.id=propuesta.tema)

select* from propuesta;
select* from 

UPDATE `casotres`.`propuesta` SET `estado`='2', `observacion`='eeddeed',
 `veces`='2', `inicio`='2016-03-16 13:03:15', `final`='2016-04-34 13:03:12'
WHERE `id`='4';

select id as a , nombre as b from usuario where rol=2;
select* from proyecto;
UPDATE `casotres`.`propuesta` SET `estudiante`='4321' WHERE `id`='3';
UPDATE `casotres`.`proyecto` SET `estado`='2' WHERE `propuesta`='1';

select tema.descripcion as a ,propuesta.descripcion as b, propuesta.docente as doc
                ,propuesta.id as c,proyecto.segundoevaluador as se,
avg(evaluacion.valor) as nota
from evaluacion
inner join proyecto on(evaluacion.proyecto=proyecto.id)
inner join propuesta on(propuesta.id=proyecto.propuesta)
inner join tema on (propuesta.tema=tema.id) 
 group by evaluacion.proyecto;

