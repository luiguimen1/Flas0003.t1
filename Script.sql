debo tener una BD

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

create table cliente(
id int primary key auto_increment,
cc varchar(10) not null unique,
nombre varchar(70) not null,
email varchar(70) null default "sin@correo.com");

create table factura(
id int primary key auto_increment,
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
fkCliente int not null,
fkClVende int not null);

alter table factura add constraint PadreaCliente foreign key(fkCliente) references cliente(id) on delete restrict on update cascade;

alter table factura add constraint PadreaClVender foreign key(fkClVende) references cliente(id) on delete restrict on update cascade;

create table proveedor(
id int primary key auto_increment,
nit varchar(20) not null unique,
nombre varchar(100) not null,
direccion varchar(100) not null,
tele varchar(20) not null,
contacto varchar(70) not null,
actividadEco varchar(200) not null);

create table entradas(
id int primary key auto_increment,
cantidad int not null,
precio double not null,
fechaCom date not null,
fechaReg TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
fkProducto int not null,
fkProveedor int not null);

alter table entradas add constraint PadreaProdEntra foreign key(fkProducto) references producto(id) on delete restrict on update cascade;

alter table entradas add constraint PadreaProveedor foreign key(fkProveedor) references proveedor(id) on delete restrict on update cascade;

create table detallesVenta(
id int primary key auto_increment,
cantidad int not null,
precio double not null,
fkFactura int not null,
fkProducto int not null);

alter table detallesVenta add constraint PadreaFactura foreign key(fkFactura) references Factura(id) on delete restrict on update cascade;

alter table detallesVenta add constraint PadreaProdcuto2 foreign key(fkProducto) references producto(id) on delete restrict on update cascade;


