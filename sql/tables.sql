create database bdtrailers
default character set utf8
default collate utf8_general_ci;

use bdtrailers;

CREATE TABLE `trailer` (
  `cod` int(11) auto_increment,
  `titulo` varchar(35) not null,
  `descricao` varchar(256),
  `link` varchar(256) not null,
  constraint trailer_cod_pk primary key(cod)
) engine=InnoDB
default charset=utf8;

CREATE TABLE `usuario` (
    `id` INT(11) AUTO_INCREMENT,
    `nome` VARCHAR(15) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `senha` VARCHAR(32) NOT NULL,
    CONSTRAINT trailer_id_pk PRIMARY KEY(id)
)engine=InnoDB
default charset=utf8;

create table `rank` (
id int auto_increment,
idUser int,
idTrailer int,
constraint rank_id_pk primary key(id),
constraint rank_idUser_fk foreign key(idUser) references usuario(id),
constraint rank_idTrailer_fk foreign key(idTrailer) references trailer(cod)
)engine=InnoDB
default charset=utf8;

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@email.com', md5('admin'));



