-- cd C:\xampp\mysql\bin\
-- mysql -h localhost -u root -p 
 
 -- show tables;
 -- describe tabla;

drop database hostapp;

CREATE DATABASE hostapp;

USE hostapp; 

CREATE TABLE usuarios(
    id int (10) not null primary key auto_increment,
    nombre varchar(50) not null,
    apellido varchar(50) not null,
    dni varchar(10) not null,
	email varchar(30) not null,
	password varchar(255) not null,
	tipo_usuario varchar(2) DEFAULT 'n',
	CONSTRAINT dni_usuario_un UNIQUE (dni)
);

CREATE TABLE menu(
	id int (10) not null primary key auto_increment,
	id_admin int (10) not null,
	nombre_menu varchar(50) not null,
	entrante varchar(50) not null,
	plato_principal varchar(50) not null,
	precio DECIMAL(19,2) not null,
	foreign key (id_admin) references usuarios(id) on delete cascade on update cascade
); 

CREATE TABLE reservas(
    id int (10) not null primary key auto_increment,
    id_usuario int (10) not null,
	dni_usuario varchar(10) not null,
    id_menu int (10) not null,
    nombre varchar(50) not null,
	fecha_reserva DATE not null,
	email_usuario varchar(30),
    foreign key (id_usuario) references usuarios(id) on delete cascade on update cascade,
	foreign key (id_menu) references menu(id) on delete cascade on update cascade
);

-- Usuarios Admin
-- victor
insert into usuarios  (nombre, apellido, dni, email, password, tipo_usuario)  values('Victor','Allende','11737871-M', 'victor@gmail.es','ffc150a160d37e92012c196b6af4160d', 'a');
-- mateo
insert into usuarios  (nombre, apellido, dni, email, password, tipo_usuario)  values('Mateo','Allende','40161527-P', 'mateo@gmail.es','5b4c6f05e39f90fcebd51be99338c42e', 'a');
-- Usuarios normales
-- miguel
insert into usuarios  (nombre, apellido, dni, email, password)  values('Miguel','Lopez','26028544-L', 'miguel@gmail.es','9eb0c9605dc81a68731f61b3e0838937');
-- luis
insert into usuarios  (nombre, apellido, dni, email, password)  values('Luis','Perez','91363983-W', 'luis@gmail.es','502ff82f7f1f8218dd41201fe4353687');
-- jose
insert into usuarios  (nombre, apellido, dni, email, password)  values('Jose','Rodriguez','53497522-M', 'jose@gmail.es','662eaa47199461d01a623884080934ab');
-- Menu
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(1,'El carnívoro','Surtido Ibéricos', 'Chuletón de Buey 1/2 kg.',45.99);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(1,'El Vegetariano','Ensalada Capresse', 'Berenjenas con bechamel',13.59);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(2,'Marino','Paella de mariscos', 'Emperador asado',29.99);
insert into menu  (id_admin,nombre_menu,entrante,plato_principal,precio)  values(2,'Mar y Tierra','Croquetas variadas', 'Arroz caldoso de setas y langostinos',13.59);

