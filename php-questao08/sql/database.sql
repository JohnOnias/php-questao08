create database loja; 
SHOW VARIABLES LIKE 'secure_file_priv';

use loja; 
create table tbProduto(
id int auto_increment primary key,
nome varchar(50),
quantidade int, 
preco_unitario decimal(10, 2),
img LONGBLOB
);

create table tbPedido(
id int auto_increment primary key,
nome varchar(50),
quantidade int, 
preco_unitario decimal(10, 2)
);

create table tbTotal(
total decimal(10, 2)
);

