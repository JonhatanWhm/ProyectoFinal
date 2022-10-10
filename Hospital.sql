
create database hospital;
use hospital;

create table listaenfermos(
id varchar (20) primary key,
nombre varchar(40),
apellido varchar(40),
edad varchar(40),
telefono varchar(40),
numero_dni varchar(20),
tipoproblema varchar(40),
nomproblema varchar(40)
);

CREATE TABLE listaenfermos(
  id int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(40) DEFAULT NULL,
  apellidos varchar(40) DEFAULT NULL,
  razon_social varchar(40)DEFAULT NULL,
  edad varchar(40) DEFAULT NULL,
  telefono varchar(40) DEFAULT NULL,
  id_tipo_enfermos int(20) DEFAULT NULL,
  nomproblema varchar(40),
  id_tipo_documento int(20) DEFAULT NULL,
  numero_documento varchar(20) DEFAULT NULL,
  estado tinyint(1) DEFAULT 1,
  PRIMARY KEY (id),
  KEY FKTipoPaciente_enfermos_idx (id_tipo_enfermos),
  KEY FKTipoDocumento_enfermos_idx (id_tipo_documento),
  CONSTRAINT FKTipoEnfermos_enfermos FOREIGN KEY (id_tipo_enfermos) REFERENCES tipo_enfermos (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FKTipoDocumento_enfermos FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento (id) ON DELETE NO ACTION ON UPDATE NO ACTION
);

INSERT INTO listaenfermos VALUES (1,'Alexis','Mamani','Gabriel Alexis Mamani Arriola','20','1266126633',2,'Covid 19',1,'36987514',2);
select * from listaenfermos;
DROP TABLE `hospital`.`listaenfermos`;

SELECT codigo, B.nombre as apellido
       from listaenfermos;
       
       SELECT codigo, nombre AS NombrePaciente, apellido as Apellido , 
       edad as edad, telefono as telefono, 
       numero_dni as numeroDNI, tipoproblema, nomproblema 
       from listaenfermos INNER JOIN tipo_enfermos;

SELECT codigo, nombre AS NombrePaciente, apellido AS Apellido , 
       edad AS edad, telefono AS telefono, 
       numero_dni AS numeroDNI, tipoproblema, nomproblema 
       from listaenfermos;
               
SELECT A.id, razon_social, B.nombre AS tipo_cliente, 
                 C.nombre AS tipo_documento, A.numero_documento
            FROM cliente A INNER JOIN tipo_cliente B
                ON A.id_tipo_cliente = B.id INNER JOIN tipo_documento C
                ON A.id_tipo_documento = C.id
            WHERE A.id_tipo_cliente;


select * from listaenfermos;
DROP TABLE `hospital`.`listaenfermos`;

INSERT INTO listaenfermos VALUES (123456,'alexis','mamani','258963','20',1,1,12661266,'enfermedad','Covid 19');
INSERT INTO listaenfermos VALUES (963258,'tulio','tribiño','987456','31',3,1,31023546,'fractura','costilla rota');
      


CREATE TABLE tipo_enfermos (
  id int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  estado tinyint(1) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;


select * from tipo_enfermos;
DROP TABLE hospital.tipo_enfermos;

INSERT INTO tipo_enfermos VALUES (963258,'Julio','tribiño','elmono12@gmail.com','31','fractura','costilla rota');
 
INSERT INTO tipo_enfermos VALUES (1,'fractura',1),(2,'enfermedad',1),(3,'coma',1);

INSERT INTO tipo_enfermos VALUES ('1','fractura',1),('2','enfermedad',1),('3','coma',1);


CREATE TABLE tipo_documento (
  id int(30) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  estado tinyint(1) DEFAULT 1,
  PRIMARY KEY (id)
)ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO tipo_documento VALUES (1,'DNI',1),(2,'RUC',1),(3,'Carné Extranjería',1);


select * from tipo_documento;
DROP TABLE hospital.tipo_documento;

INSERT INTO tipo_documento VALUES (1,'DNI',1),(2,'RUC',1),(3,'Carné Extranjería',1);



create table doctores(
id varchar(40),
nombre varchar(40),
apellido varchar(40),
edad varchar(40),
telefono varchar(40),
gmail varchar(40),
direccion varchar(40),
estadocivil varchar(40),
especialidad varchar(40),
horario varchar(40),
sueldo varchar(40)
);

select * from doctores;
DROP TABLE `hospital`.`doctores`;

CREATE TABLE tipo_especialidades (
  id int(20) NOT NULL AUTO_INCREMENT,
  nombre varchar(30) NOT NULL,
  estado tinyint(1) DEFAULT 1,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

select * from tipo_especialidades;
DROP TABLE `hospital`.tipo_especialidades;

INSERT INTO tipo_especialidades VALUES (1,'Medicina Familiar',1),(2,'Médicina Interna',1),(3,'Pediatría',1),(4,'Gineco obstetricia',1),(5,'Cirugía',1),(6,'Psiquiatría',1),(7,'Cardiología',1),(8,'Dermatología',1);

create table usuarios(
id int primary key not null,
usuario varchar(200) not null,
contraseña varchar(200) not null
); 
drop table usuarios
insert into usuarios values('1','alan','12345')



  


