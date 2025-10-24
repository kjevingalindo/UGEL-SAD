CREATE database sad_ugel;
use sad_ugel;

create table user (
 id int auto_increment primary key,
 name varchar (100) not null,
 email varchar (100) unique not null,
 password varchar (255) not null,
 role enum('admin','director','validador') default 'director',
 created_at timestamp default current_timestamp,
 update_at timestamp default current_timestamp on update current_timestamp);
 
 create table instituciones (
  id int auto_increment primary key,
  nombre varchar (100) not null,
  codigo_modular varchar (20) unique not null,
  direccion varchar (150) not null,
  id_director int,
  foreign key (id_director) references user(id) on delete set null,
  created_at timestamp default current_timestamp,
  updated_at timestamp default current_timestamp on update current_timestamp);
  
  create table docentes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  dni VARCHAR(15) UNIQUE NOT NULL,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  categoria VARCHAR(50),
  nivel VARCHAR(50),
  area VARCHAR(100),
  grado_estudio VARCHAR(100),
  fecha_ingreso DATE,
  estado ENUM('activo','licencia','retirado') DEFAULT 'activo',
  estado_validacion ENUM('pendiente','validado','rechazado') DEFAULT 'pendiente',
  id_institucion INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (id_institucion) REFERENCES instituciones(id) ON DELETE CASCADE
); 	



create table validaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_docente INT NOT NULL,
  id_validador INT NOT NULL,
  estado ENUM('pendiente','validado','rechazado') DEFAULT 'pendiente',
  observaciones TEXT,
  fecha_validacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_docente) REFERENCES docentes(id) ON DELETE CASCADE,
  FOREIGN KEY (id_validador) REFERENCES user(id) ON DELETE CASCADE
);



create table historiales (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_docente INT NOT NULL,
  id_user INT NOT NULL,
  accion VARCHAR(50),
  descripcion TEXT,
  fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_docente) REFERENCES docentes(id) ON DELETE CASCADE,
  FOREIGN KEY (id_user) REFERENCES user(id) ON DELETE CASCADE
);


create table periodos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  estado ENUM('activo','inactivo') DEFAULT 'activo',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

  