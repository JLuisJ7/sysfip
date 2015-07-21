create table Cliente(
idCliente int unsigned primary key,
dni varchar(11),
nombres varchar(100),
atencion varchar(100),
direccion varchar(100),
telefono varchar(15),
correo varchar(20),
referencia varchar(100),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado char(1) DEFAULT '0'
);

create table Producto(
idProducto int unsigned auto_increment primary key,
descripcion varchar(30),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
estado char(1) DEFAULT '0'
);

create table Servicio(
idServicio int unsigned,
idProducto int unsigned, 
descripcion varchar(50),
metodo varchar(30),
tiempo_entrega int ,
cant_muestra int,
precio  numeric(8,2),
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
detalle varchar(200),
estado char(1) DEFAULT '0'
);


create table Cotizacion(
idCotizacion int unsigned PRIMARY KEY,
fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
idCliente int unsigned,
total numeric(8,2), 
fecha_entrega date,
registrado_por int unsigned,
estado varchar(10),
eliminado char(1) DEFAULT '1'
);

create table DetalleCotizacion(
idCotizacion int unsigned,
idProducto int unsigned,
idServicio int unsigned,
cantidad int, 
tiempo int,
costo numeric(8,2)
);

-- PRIMARY KEYs
ALTER TABLE Servicio ADD CONSTRAINT pk_idServ_idProd PRIMARY KEY(idServicio,idProducto);
-- FOREIGN KEYs

ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Cot FOREIGN KEY(idCotizacion) references Cotizacion(idCotizacion);
ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Prod FOREIGN KEY(idProducto) references Producto(idProducto);
ALTER TABLE DetalleCotizacion ADD CONSTRAINT fk_DetCot_Serv FOREIGN KEY(idServicio) references Servicio(idServicio);
ALTER TABLE Cotizacion ADD CONSTRAINT fk_cot_cli FOREIGN KEY(idCliente) references Cliente(idCliente);
ALTER TABLE Servicio ADD CONSTRAINT fk_Serv_Prod FOREIGN KEY(idProducto) references Producto(idProducto);
