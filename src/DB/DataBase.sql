create database if not exists recuperacionphp;
use recuperacionphp;

create table if not exists roles(
    id int auto_increment primary key ,
    tipo varchar(10) not null unique
    );
create table if not exists usuarios(
    id int auto_increment primary key,
    username varchar(20) unique not null,
    contrasena text not null,
    role_id int not null
    );
create table if not exists libros(
    id int auto_increment primary key ,
    isbn char(13) not null unique,
    titulo varchar(20) not null,
    precio decimal(6,2) not null
    );
