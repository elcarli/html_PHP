create database php_mysql_adivina;
use php_mysql_adivina;
create table puntuaciones(
	nombre varchar (20) not null,
    intentos int not null,
    primary key (nombre)
    );
    
select * from puntuaciones;