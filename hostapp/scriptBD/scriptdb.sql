-- cd C:\xampp\mysql\bin\
-- mysql -h localhost -u root -p 
 
 -- show tables;
 -- describe tabla;

drop database hostapp;

CREATE DATABASE hostapp;

USE hostapp; 

CREATE TABLE usuarios(
    id int (10) not null primary key auto_increment,
    nombre varchar(255) not null,
    apellido varchar(255) not null,
    dni varchar(10) not null,
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
	dni_usuario varchar(10) not null,
    id_menu int (10) not null,
    nombre varchar(255) not null,
	fecha_reserva DATE not null,
	email_usuario varchar(255),
    foreign key (id_usuario) references usuarios(id) on delete cascade on update cascade,
	foreign key (id_menu) references menu(id) on delete cascade on update cascade
);

-- Usuarios Admin
insert into usuarios  (nombre, apellido, dni, email, password, tipo_usuario)  values('Victor','Allende','0000', 'victor@gmail.es','victor', 'a');
insert into usuarios  (nombre, apellido, dni, email, password, tipo_usuario)  values('Mateo','Allende','1111', 'mateo@gmail.es','mateo', 'a');
-- Usuarios normales
insert into usuarios  (nombre, apellido, dni, email, password)  values('Victor','Allende','2222', 'victor@gmail.es','victor');
insert into usuarios  (nombre, apellido, dni, email, password)  values('Pepe','Perez','3333', 'pepe@gmail.es','pepe');
insert into usuarios  (nombre, apellido, dni, email, password)  values('Jose','Redriguez','4444', 'jose@gmail.es','jose');
-- Menu
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(1,'El carnívoro','Surtido Ibéricos', 'Chuletón de Buey 1/2 kg.',45.99);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(1,'El Vegetariano','Ensalada Capresse', 'Berenjenas con bechamel',13.59);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(2,'Marino','Paella de mariscos', 'Emperador asado',29.99);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(2,'Mar y Tierra','Croquetas variadas', 'Arroz caldoso de setas y langostinos',13.59);

