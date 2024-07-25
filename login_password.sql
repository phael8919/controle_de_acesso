create database usuarios;

use usuarios;

create table users (
	id int auto_increment primary key,
    login varchar(50) not null,
    senha varchar(30) not null
);

insert into users(login, senha) 
values ('admin_boss','@pass_boss');

select * from users;