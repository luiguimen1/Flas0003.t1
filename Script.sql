create table categoria(
id int primary key not null auto_increment,
nombre varchar(45) not null unique,
descripcion varchar(150) null,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table producto(
id int primary key auto_increment,
nombre varchar(100) not null unique,
cantidad int null default 0,
valor double null default 0,
fkCategoria int not null);

alter table producto add constraint PadreCategoria foreign key (fkCategoria) references categoria(id) on delete restrict on update cascade;