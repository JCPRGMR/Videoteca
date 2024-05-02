-- Active: 1709320591459@@127.0.0.1@3306@videoteca
drop database videoteca;
create database videoteca;
use videoteca;
create table usuarios(
    id_usuario int not null primary key auto_increment,
    username varchar(25) not null,
    contrasenas varchar(25) not null,
    f_registro_usuario datetime not null,
    f_modificacion_usuario datetime not null
);
create table actividades(
    id_actividad int not null primary key AUTO_INCREMENT,
    des_actividad varchar(50) not null,
    f_registro_actividad datetime not null,
    f_modificcacion_actividad datetime not null
);
create table departamentos(
    id_departamento int not null PRIMARY key AUTO_INCREMENT,
    des_departamento varchar(50) not null,
    f_registro_departamento datetime not null,
    f_modificacion_departamento datetime not null
);
create table areas(
    id_area int not null primary key auto_increment,
    des_area varchar(50) not null,
    f_registro_area datetime not null,
    f_modificacion_area datetime not null
);
create table tipos(
    id_tipo int not null primary key auto_increment,
    des_tipo varchar(50) not null,
    f_registro_tipo datetime not null,
    f_modificacion_tipo datetime not null
);
create table videos(
    id_video bigint not null primary key auto_increment,
    cod_video varchar(25) not null,
    titulo varchar(50) not null,
    detalles text not null,
    ruta text not null,
    ruta_apache text not null,
    nombre_original text not null,
    miniatura text,
    id_fk_departamento int not null,
    id_fk_area int not null,
    id_fk_tipo int not null,
    fecha_subida date not null,
    f_registro_video datetime not null,
    f_modificacion_video datetime not null,
    Foreign Key (id_fk_area) REFERENCES areas(id_area),
    Foreign Key (id_fk_tipo) REFERENCES tipos(id_tipo),
    Foreign Key (id_fk_departamento) REFERENCES departamentos(id_departamento)
);
create table contratos(
    id_contrato bigint not null primary key auto_increment,
    nro_contrato varchar(100),
    contrato text not null,
    vence date,
    foto_contrato text,
    id_fk_video bigint not null,
    foreign key (id_fk_video) references videos(id_video)
);
create table departamentos_areas(
    id_fk_departamento int not null,
    id_fk_area int not null,
    Foreign Key (id_fk_departamento) REFERENCES departamentos(id_departamento),
    Foreign Key (id_fk_area) REFERENCES areas(id_area)
);
create table departamentos_tipos(
    id_fk_departamento int not null,
    id_fk_tipo int not null,
    Foreign Key (id_fk_departamento) REFERENCES departamentos(id_departamento),
    Foreign Key (id_fk_tipo) REFERENCES tipos(id_tipo)
);
create table etiquetas(
    des_etiqueta varchar(250) primary key
);
create table usuarios_actividad(
    remote_addr varchar(20) not null,
    http_cookie text,
    id_fk_usuario int not null,
    id_fk_actividad int not null,
    id_fk_video bigint not null,
    Foreign Key (id_fk_usuario) REFERENCES usuarios(id_usuario),
    Foreign Key (id_fk_actividad) REFERENCES actividades(id_actividad),
    Foreign Key (id_fk_video) REFERENCES videos(id_video)
);

INSERT INTO departamentos(id_departamento, des_departamento, f_registro_departamento, f_modificacion_departamento) VALUES
(1, "PRENSA", NOW(), NOW()),
(2, "PROGRAMACION", NOW(), NOW());

-- DROP VIEW vista_videos; 
CREATE VIEW vista_videos
AS
SELECT cod_video, des_area, des_tipo, id_departamento, des_departamento, titulo, detalles, ruta_apache, ruta, miniatura, id_video FROM videos
INNER JOIN areas on videos.id_fk_area = id_area
INNER JOIN tipos on videos.id_fk_tipo = id_tipo
INNER JOIN departamentos on videos.id_fk_departamento = id_departamento ORDER BY f_registro_video DESC
