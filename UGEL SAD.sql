Create database UGEL_SAD;
use UGEL_SAD;

-- Tabla roles
CREATE TABLE roles (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla usuarios
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role_id BIGINT UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE SET NULL
);

-- Tabla instituciones
CREATE TABLE instituciones (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigo_modular VARCHAR(20) UNIQUE NOT NULL,
    direccion VARCHAR(150) NOT NULL,
    id_director BIGINT UNSIGNED NULL,
    nivel VARCHAR(50) NOT NULL,
    distrito VARCHAR(50) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    region VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_director) REFERENCES users(id) ON DELETE SET NULL
);

-- Tabla estados de docentes (separada para evitar conflictos)
CREATE TABLE estados_docente (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla docentes
CREATE TABLE docentes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(15) UNIQUE NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    categoria VARCHAR(50),
    nivel VARCHAR(50),
    area VARCHAR(100),
    grado_estudio VARCHAR(100),
    fecha_ingreso DATE,
    estado_id BIGINT UNSIGNED NOT NULL DEFAULT 1,
    id_institucion BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (estado_id) REFERENCES estados_docente(id),
    FOREIGN KEY (id_institucion) REFERENCES instituciones(id) ON DELETE CASCADE
);

-- Tabla tipos de validación
CREATE TABLE tipos_validacion (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla validaciones
CREATE TABLE validaciones (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_docente BIGINT UNSIGNED NOT NULL,
    id_validador BIGINT UNSIGNED NOT NULL,
    id_tipo_validacion BIGINT UNSIGNED NOT NULL,
    estado ENUM('pendiente','validado','rechazado') DEFAULT 'pendiente',
    observaciones TEXT,
    fecha_validacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_docente) REFERENCES docentes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_validador) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_tipo_validacion) REFERENCES tipos_validacion(id)
);

-- Tabla historiales
CREATE TABLE historiales (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_docente BIGINT UNSIGNED NOT NULL,
    id_user BIGINT UNSIGNED NOT NULL,
    accion VARCHAR(50),
    descripcion TEXT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_docente) REFERENCES docentes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabla periodos
CREATE TABLE periodos (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    estado ENUM('activo','inactivo') DEFAULT 'activo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO roles (nombre, descripcion) VALUES
('Administrador', 'Acceso total al sistema'),
('Director', 'Gestión de su institución y docentes'),
('Docente', 'Acceso a su perfil y reportes personales');

INSERT INTO estados_docente (nombre) VALUES
('activo'), ('licencia'), ('retirado');

INSERT INTO tipos_validacion (nombre) VALUES
('Pendiente'), ('Validado'), ('Rechazado');
