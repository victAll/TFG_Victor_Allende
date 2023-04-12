/*cd C:\xampp\mysql\bin\
 mysql -h localhost -u root -p 
 
 
 show tables;
 describe administrador;*/

CREATE DATABASE hostapp;

USE hostapp; 

CREATE TABLE usuarios(
    id int (10) not null primary key auto_increment,
    nombre varchar(255) not null,
    apellido varchar(255) not null,
    dni varchar(20) not null,
	email varchar(20) not null,
	password varchar(255) not null,
	tipo_usuario varchar(2) DEFAULT 'n',
	CONSTRAINT dni_usuario_un UNIQUE (dni)
);

CREATE TABLE menu(
	id int (10) not null primary key auto_increment,
	id_admin int (10) not null,
	nombre_menu varchar(255) not null,
	entrante varchar(255) not null,
	plato_principal varchar(255) not null,
	precio DECIMAL(19,4) not null,
	foreign key (id_admin) references usuarios(id) on delete cascade on update cascade
); 

CREATE TABLE reservas(
    id int (10) not null primary key auto_increment,
    id_usuario int (10) not null,
	dni_usuario varchar(20) not null,
    id_menu int (10) not null,
    nombre varchar(255) not null,
	fecha_reserva DATE not null,
	email_usuario varchar(255),
    foreign key (id_usuario) references usuarios(id) on delete cascade on update cascade,
	foreign key (id_menu) references menu(id) on delete cascade on update cascade
);




insert into usuarios  (nombre, apellido, dni, email, password, tipo_usuario)  values('Victor','Allende','0000','admin@gmail.es', 'admin', 'a');


insert into usuarios  (nombre, apellido, dni, email, password)  values('Victor','Allende','1111', 'victor@gmail.es','victor');
insert into usuarios  (nombre, apellido, dni, email, password)  values('Pepe','Perez','2222', 'pepe@gmail.es','pepe');
insert into usuarios  (nombre, apellido, dni, email, password)  values('Jose','Redriguez','3333', 'jose@gmail.es','jose');

insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(1,'El carnívoro','Surtido Ibéricos', 'Chuletón de Buey 1/2 kg.',45.00);



SELECT res.id as id, res.nombre as nombre_reserva, res.fecha_reserva as fecha_reserva, res.email_usuario as email_reserva, res.id_usuario as id_usuario,
us.nombre as nombre_usuario, us.dni as dni_usuario, us.email as email_usuario, us.apellido as apellido,
m.nombre_menu as nombre_menu, m.entrante as entrante, m.plato_principal as plato_principal
FROM reservas res 
INNER JOIN usuarios us
ON res.id_usuario = us.id
INNER JOIN menu m 
ON m.id = res.id_menu;