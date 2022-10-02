SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS historia_medica;

USE historia_medica;

DROP TABLE IF EXISTS antc_fami;

CREATE TABLE `antc_fami` (
  `id_pa_fk` int(11) NOT NULL,
  `pariente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  KEY `id_pa_fk` (`id_pa_fk`),
  CONSTRAINT `antc_fami_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO antc_fami VALUES("2","Mama","Migraña","fuertes dolores de cabeza");



DROP TABLE IF EXISTS citas;

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_pa_fk` int(11) NOT NULL,
  `id_doc_fk` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `razon` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `id_pa_fk` (`id_pa_fk`,`id_doc_fk`),
  KEY `id_doc_fk` (`id_doc_fk`),
  CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO citas VALUES("1","1","1","2021-11-11","dolor");
INSERT INTO citas VALUES("2","2","1","2021-11-11","dolor de muela");
INSERT INTO citas VALUES("3","3","2","2021-11-10","dolor de brazo");
INSERT INTO citas VALUES("4","4","2","2022-07-04","dolor de cabeza");



DROP TABLE IF EXISTS consulta;

CREATE TABLE `consulta` (
  `n_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_r` date NOT NULL,
  `id_doc_fk` int(11) NOT NULL,
  `id_pa_fk` int(11) NOT NULL,
  `estado_c` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Sin Atender',
  PRIMARY KEY (`n_consulta`),
  KEY `id_doc_fk` (`id_doc_fk`,`id_pa_fk`),
  KEY `id_pa_fk` (`id_pa_fk`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO consulta VALUES("1","dolor de muevla","2021-11-10","1","1","Sin Atender");
INSERT INTO consulta VALUES("2","dolor de muela","2021-11-10","1","2","Atendido");
INSERT INTO consulta VALUES("3","dolor de brazo","2021-11-10","2","3","Sin Atender");



DROP TABLE IF EXISTS diagnostico;

CREATE TABLE `diagnostico` (
  `id_diagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `enfermedad` text COLLATE utf8_spanish_ci NOT NULL,
  `descrip_sintomas` text COLLATE utf8_spanish_ci NOT NULL,
  `tratamiento` text COLLATE utf8_spanish_ci NOT NULL,
  `consulta_fk` int(11) NOT NULL,
  `examenes` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_diagnostico`),
  KEY `consulta_fk` (`consulta_fk`),
  CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`consulta_fk`) REFERENCES `consulta` (`n_consulta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO diagnostico VALUES("1","caries ","dolor fuerte en la muela del lado izquierdo","calza de muela","2","panoramica");



DROP TABLE IF EXISTS enfermedades;

CREATE TABLE `enfermedades` (
  `id_pa_fk` int(11) NOT NULL,
  `respiratoria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gastro_intestinal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `neurologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hematologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alergia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  KEY `id_pa_fk` (`id_pa_fk`),
  CONSTRAINT `enfermedades_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO enfermedades VALUES("2","ninguna","ninguna","ninguna","ninguna","mani");



DROP TABLE IF EXISTS enfermera;

CREATE TABLE `enfermera` (
  `id_enfermera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_enfermera`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO enfermera VALUES("1","maria","romero","04143795613","11490541");
INSERT INTO enfermera VALUES("2","angel","medina","0416678908","29852890");



DROP TABLE IF EXISTS exa_fisico;

CREATE TABLE `exa_fisico` (
  `id_consul_fk` int(11) NOT NULL,
  `presion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `temperatura` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `f_respira` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `f_cardiaca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `altura` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  KEY `id_consul_fk` (`id_consul_fk`),
  CONSTRAINT `exa_fisico_ibfk_1` FOREIGN KEY (`id_consul_fk`) REFERENCES `consulta` (`n_consulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO exa_fisico VALUES("1","120/80","35","55","80","1.68","69");
INSERT INTO exa_fisico VALUES("2","120/80","35","55","89","1.97","80");
INSERT INTO exa_fisico VALUES("3","120/80","35","55","80","1.78","62");



DROP TABLE IF EXISTS habito;

CREATE TABLE `habito` (
  `id_pa_fk` int(11) NOT NULL,
  `alcohol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tabaco` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `drogas` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `alimentacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `vida_sexual` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sueno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  KEY `id_pa_fk` (`id_pa_fk`),
  CONSTRAINT `habito_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO habito VALUES("2","Frecuentemente","Regularmente","Nunca","3-5"," Regularmente","5-6 hr");



DROP TABLE IF EXISTS medico;

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_doc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_medico`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO medico VALUES("1","villarreal","kevin","04147217216","Odontólogo","consultorio A3","27815919");
INSERT INTO medico VALUES("2","caicedo","kevin","04247639947","Medicina Familiar","consultorio B2","28228862");



DROP TABLE IF EXISTS medico_paciente;

CREATE TABLE `medico_paciente` (
  `id_pa_fk` int(11) NOT NULL,
  `id_doc_fk` int(11) NOT NULL,
  KEY `id_pa_fk` (`id_pa_fk`,`id_doc_fk`),
  KEY `id_doc_fk` (`id_doc_fk`),
  CONSTRAINT `medico_paciente_ibfk_1` FOREIGN KEY (`id_pa_fk`) REFERENCES `paciente` (`id_paciente`),
  CONSTRAINT `medico_paciente_ibfk_2` FOREIGN KEY (`id_doc_fk`) REFERENCES `medico` (`id_medico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO medico_paciente VALUES("1","1");
INSERT INTO medico_paciente VALUES("2","1");
INSERT INTO medico_paciente VALUES("3","2");



DROP TABLE IF EXISTS paciente;

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `n_hc` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cedula_p` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_m` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_p` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `ocupacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `residencia` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'nuevo',
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO paciente VALUES("1","HC-000001","27815919","labrador","Caicedo","por","19","2021-08-11","loc","Viudo/da","San Cristobal","04147217213","nuevo");
INSERT INTO paciente VALUES("2","HC-000002","27815918","rojas","medina","angel","22","2009-02-13","Estudiante","Viudo/da","San Cristobal","04147227202","nuevo");
INSERT INTO paciente VALUES("3","HC-000003","11490542","hola","villarreal","holae","20","2021-09-15","ama de casa","Viudo/da","tariba","04147217213","nuevo");
INSERT INTO paciente VALUES("4","HC-000004","10012910","nadales","rondon","maria","48","1972-10-17","profesora","Soltero/ra","palmira","04149728375","nuevo");



DROP TABLE IF EXISTS receta;

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL AUTO_INCREMENT,
  `medicamento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `presentacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dosis` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `uso` text COLLATE utf8_spanish_ci NOT NULL,
  `diagnostico_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_receta`),
  KEY `diagnostico_fk` (`diagnostico_fk`),
  CONSTRAINT `receta_ibfk_1` FOREIGN KEY (`diagnostico_fk`) REFERENCES `diagnostico` (`id_diagnostico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO receta VALUES("1","ninguno","0","0","0","0","0","1");



DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `permisos` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO usuario VALUES("1","admin","admin","Administrador","6554432");
INSERT INTO usuario VALUES("3","maria","123456","Enfermera/ro","19345326");
INSERT INTO usuario VALUES("13","admin","12345","Administrador","27918");
INSERT INTO usuario VALUES("14","kevin","123456","Medico/ca","27815919");
INSERT INTO usuario VALUES("15","angel","123456","Enfermera/ro","29852890");
INSERT INTO usuario VALUES("16","enrique","123456","Medico/ca","28228862");



SET FOREIGN_KEY_CHECKS=1;