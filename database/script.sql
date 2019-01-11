create table oficina(
	id serial,
	nombre text,
	estado character default 'N',
	constraint pk_oficina primary key (id)
);

create table publicacion(
	id serial,
	titulo text,
	corta text,
	larga text,
	tipo integer,
	imagen text,
	archivo text,
	estado character default 'N',
	fecha timestamp without time zone default now(),
	vistas integer default 0,
	id_oficina integer,
	id_tipodocumento integer,
	constraint pk_publicacion primary key (id)
);

create table slider(
	id serial,
	titulo text,
	lado character,
	boton text,
	color text,
	orden integer,
	estado character default 'N',
	id_oficina integer,
	constraint pk_slider primary key (id)
);

create table usuario(
	id serial,
	usuario text,
	password text,
	id_oficina integer,
	estado character default 'N',
	constraint pk_usuario primary key (id)
);

create table menu(
	id serial,
	nombre text,
	descripcion text,
	id_oficina integer,
	orden integer,
	estado character default 'N',
	constraint pk_menu primary key (id)
);


create table tipodocumento(
	id serial,
	nombre text,
	estado character default 'N',
	constraint pk_tipodocumento primary key (id)
);