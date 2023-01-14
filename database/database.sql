-- tables
-- Table: catastro
CREATE TABLE catastro (
    id serial NOT NULL,
    circunscripcion varchar(10) NOT NULL,
    seccion varchar(10) NOT NULL,
    chacra varchar(10) NOT NULL,
    quinta varchar(10) NOT NULL,
    fraccion varchar(10) NOT NULL,
    manzana varchar(10) NOT NULL,
    parcela varchar(10) NOT NULL,
    sub_parcela varchar(10) NOT NULL,
    observacion varchar(255) NOT NULL,
    fecha_informe date NOT NULL,
    pdf_informe varchar(255) NOT NULL,
    CONSTRAINT pk_catastro PRIMARY KEY (id)
);

-- Table: contribuyentes
CREATE TABLE contribuyentes (
    id serial NOT NULL,
    tipo_dni_id serial NOT NULL,
    nro_dni_contribuyente bigint NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    cuit varchar(50) NOT NULL,
    telefono bigint NOT NULL,
    fecha_nacimiento date NOT NULL,
    insc_ingresos_brutos varchar(255) NOT NULL,
    estado_civil_id serial NOT NULL,
    conyuge varchar(255) NOT NULL,
    nro_dni_conyuge bigint NOT NULL,
    CONSTRAINT pk_contribuyentes PRIMARY KEY (id)
);

CREATE INDEX idx_contribuyentes ON contribuyentes (nro_dni_contribuyente,apellidos,nombres);

-- Table: domicilios
CREATE TABLE domicilios (
    id serial NOT NULL,
    calle varchar(255) NOT NULL,
    numero int NOT NULL,
    CONSTRAINT pk_domicilio PRIMARY KEY (id)
);

-- Table: estado_baja
CREATE TABLE estado_baja (
    id serial NOT NULL,
    tipo_baja_id serial NOT NULL,
    deuda float NOT NULL,
    fecha_baja date NOT NULL,
    pdf_acta_solicitud_baja varchar(255) NOT NULL,
    pdf_informe_deuda varchar(255) NOT NULL,
    pdf_solicitud_baja varchar(255) NOT NULL,
    CONSTRAINT pk_estado_baja PRIMARY KEY (id)
);

-- Table: estado_civil
CREATE TABLE estado_civil (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    CONSTRAINT pk_estado_civil PRIMARY KEY (id)
);

-- Table: estado_habilitacion
CREATE TABLE estado_habilitacion (
    id serial NOT NULL,
    descripcion varchar(100) NOT NULL,
    fecha_vencimiento date NOT NULL,
    CONSTRAINT pk_estado_habilitacion PRIMARY KEY (id)
);

-- Table: expediente_contribuyente
CREATE TABLE expediente_contribuyente (
    id serial NOT NULL,
    expediente_id serial NOT NULL,
    contribuyentes_id serial NOT NULL,
    CONSTRAINT pk_expediente_contribuyente PRIMARY KEY (id)
);

-- Table: expediente_tipo_dependencia
CREATE TABLE expediente_tipo_dependencia (
    id serial NOT NULL,
    expedientes_id serial NOT NULL,
    tipo_dependencia_id serial NOT NULL,
    pdf_informe varchar(255) NOT NULL,
    CONSTRAINT id PRIMARY KEY (id)
);

-- Table: expedientes
CREATE TABLE expedientes (
    id serial NOT NULL,
    nro_expediente varchar(255) NOT NULL,
    nro_comercio varchar(255) NOT NULL,
    actividad_ppal varchar(255) NOT NULL,
    persona_juridica_id serial NOT NULL,
    anexo varchar(255) NOT NULL,
    inmueble_afectado_id serial NOT NULL,
    estado_habilitacion_id serial NOT NULL,
    fecha_habilitacion date NOT NULL,
    baja int NOT NULL,
    estado_baja_id serial NOT NULL,
    pdf_solicitud varchar(255) NOT NULL,
    catastro_id serial NOT NULL,
    bienes_de_uso varchar(255) NOT NULL,
    obeservaciones_grales varchar(255) NOT NULL,
    pdf_certificado_habilitacion varchar(255) NOT NULL,
    CONSTRAINT expedientes_pk PRIMARY KEY (id)
);

-- Table: inmueble_afectado
CREATE TABLE inmueble_afectado (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    domicilio_id serial NOT NULL,
    tipo_inmueble_id serial NOT NULL,
    CONSTRAINT pk_inmueble_afectado PRIMARY KEY (id)
);

-- Table: logs_catastro
CREATE TABLE logs_catastro (
    id serial NOT NULL,
    catastro_id int NOT NULL,
    circunscripcion varchar(10) NOT NULL,
    seccion varchar(10) NOT NULL,
    chacra varchar(10) NOT NULL,
    quinta varchar(10) NOT NULL,
    fraccion varchar(10) NOT NULL,
    manzana varchar(10) NOT NULL,
    parcela varchar(10) NOT NULL,
    sub_parcela varchar(10) NOT NULL,
    observacion varchar(255) NOT NULL,
    fecha_informe date NOT NULL,
    pdf_informe varchar(255) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_catastro PRIMARY KEY (id)
);

-- Table: logs_contribuyentes
CREATE TABLE logs_contribuyentes (
    id serial NOT NULL,
    contribuyentes_id int NOT NULL,
    tipo_dni_id int NOT NULL,
    nro_dni_contribuyente bigint NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    cuit varchar(50) NOT NULL,
    telefono bigint NOT NULL,
    fecha_nacimiento date NOT NULL,
    insc_ingresos_brutos varchar(255) NOT NULL,
    estado_civil_id serial NOT NULL,
    conyuge varchar(255) NOT NULL,
    nro_dni_conyuge bigint NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_logs_contribuyentes PRIMARY KEY (id)
);

-- Table: logs_domicilios
CREATE TABLE logs_domicilios (
    id serial NOT NULL,
    domicilio_id int NOT NULL,
    calle varchar(255) NOT NULL,
    numero int NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_domicilio PRIMARY KEY (id)
);

-- Table: logs_estado_baja
CREATE TABLE logs_estado_baja (
    id serial NOT NULL,
    estado_baja_id int NOT NULL,
    tipo_baja_id serial NOT NULL,
    deuda float NOT NULL,
    fecha_baja date NOT NULL,
    pdf_acta_solicitud_baja varchar(255) NOT NULL,
    pdf_informe_deuda varchar(255) NOT NULL,
    fecha_solicitud_baja varchar(255) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_estado_civil
CREATE TABLE logs_estado_civil (
    id serial NOT NULL,
    estado_civil_id int NOT NULL,
    descripcion varchar(50) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_estado_habilitacion
CREATE TABLE logs_estado_habilitacion (
    id serial NOT NULL,
    estado_habilitacion_id int NOT NULL,
    descripcion varchar(100) NOT NULL,
    fecha_vencimiento date NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_estado_habilitacion PRIMARY KEY (id)
);

-- Table: logs_expedientes
CREATE TABLE logs_expedientes (
    id serial NOT NULL,
    expediente_id int NOT NULL,
    nro_expediente varchar(255) NOT NULL,
    nro_comercio varchar(255) NOT NULL,
    actividad_ppal varchar(255) NOT NULL,
    persona_juridica_id int NOT NULL,
    anexo varchar(255) NOT NULL,
    inmueble_afectado_id int NOT NULL,
    estado_habilitacion_id int NOT NULL,
    fecha_habilitacion date NOT NULL,
    estado_baja_id int NOT NULL,
    pdf_solicitud varchar(255) NOT NULL,
    catastro_id int NOT NULL,
    tipo_dependencia_id int NOT NULL,
    bienes_de_uso varchar(255) NOT NULL,
    observaciones_grales varchar(255) NOT NULL,
    pdf_certificado_habilitacion varchar(255) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_logs_expedientes PRIMARY KEY (id)
);

-- Table: logs_persona_juridica
CREATE TABLE logs_persona_juridica (
    id serial NOT NULL,
    persona_juridica_id int NOT NULL,
    cuit bigint NOT NULL,
    nombre_representante varchar(255) NOT NULL,
    apellido_representante varchar(255) NOT NULL,
    nro_dni_representante varchar(10) NOT NULL,
    telefono bigint NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_persona_juridica PRIMARY KEY (id)
);

-- Table: logs_tipo_baja
CREATE TABLE logs_tipo_baja (
    id serial NOT NULL,
    tipo_baja_id int NOT NULL,
    descripcion varchar(50) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_tipo_dependencia
CREATE TABLE logs_tipo_dependencia (
    id serial NOT NULL,
    tipo_dependencia_id int NOT NULL,
    nombre varchar(50) NOT NULL,
    observaciones varchar(255) NOT NULL,
    fecha_informe date NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_tipo_dni
CREATE TABLE logs_tipo_dni (
    id serial NOT NULL,
    dni_id int NOT NULL,
    descripcion varchar(50) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_tipo_inmueble
CREATE TABLE logs_tipo_inmueble (
    id serial NOT NULL,
    tipo_inmueble_id int NOT NULL,
    descripcion varchar(50) NOT NULL,
    fecha_vencimiento date NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_inmueble PRIMARY KEY (id)
);

-- Table: logs_tipo_permiso
CREATE TABLE logs_tipo_permiso (
    id serial NOT NULL,
    tipo_permiso_id int NOT NULL,
    descripcion varchar(50) NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: logs_usuarios
CREATE TABLE logs_usuarios (
    id serial NOT NULL,
    usuario varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    tipo_permiso_id serial NOT NULL,
    accion char(1) NOT NULL,
    fecha_creacion timestamp NOT NULL,
    fecha_modificacion timestamp NOT NULL,
    usuario_id int NOT NULL,
    usuario_nombre varchar(255) NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

-- Table: persona_juridica
CREATE TABLE persona_juridica (
    id serial NOT NULL,
    cuit bigint NOT NULL,
    nombre_representante varchar(255) NOT NULL,
    apellido_representante varchar(255) NOT NULL,
    nro_dni_representante varchar(10) NOT NULL,
    telefono bigint NOT NULL,
    CONSTRAINT pk_persona_juridica PRIMARY KEY (id)
);

-- Table: tipo_baja
CREATE TABLE tipo_baja (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    CONSTRAINT pk_tipo_baja PRIMARY KEY (id)
);

-- Table: tipo_dependencia
CREATE TABLE tipo_dependencia (
    id serial NOT NULL,
    nombre varchar(255) NOT NULL,
    observaciones varchar(255) NOT NULL,
    fecha_informe date NOT NULL,
    CONSTRAINT pk_tipo_dependencia PRIMARY KEY (id)
);

-- Table: tipo_dni
CREATE TABLE tipo_dni (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    CONSTRAINT pk_tipo_dni PRIMARY KEY (id)
);

-- Table: tipo_inmueble
CREATE TABLE tipo_inmueble (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    fecha_vencimiento date NOT NULL,
    CONSTRAINT pk_tipo_inmueble PRIMARY KEY (id)
);

-- Table: tipo_permiso
CREATE TABLE tipo_permiso (
    id serial NOT NULL,
    descripcion varchar(50) NOT NULL,
    CONSTRAINT pk_tipo_permisos PRIMARY KEY (id)
);

-- Table: usuarios
CREATE TABLE usuarios (
    id serial NOT NULL,
    usuario varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    tipo_permiso_id serial NOT NULL,
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

-- foreign keys
-- Reference: fk_contribuyentes_estado_civil (table: contribuyentes)
ALTER TABLE contribuyentes ADD CONSTRAINT fk_contribuyentes_estado_civil FOREIGN KEY fk_contribuyentes_estado_civil (estado_civil_id)
    REFERENCES estado_civil (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_contribuyentes_tipo_dni (table: contribuyentes)
ALTER TABLE contribuyentes ADD CONSTRAINT fk_contribuyentes_tipo_dni FOREIGN KEY fk_contribuyentes_tipo_dni (tipo_dni_id)
    REFERENCES tipo_dni (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_estados_baja_tipo_baja (table: estado_baja)
ALTER TABLE estado_baja ADD CONSTRAINT fk_estados_baja_tipo_baja FOREIGN KEY fk_estados_baja_tipo_baja (tipo_baja_id)
    REFERENCES tipo_baja (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expediente_contribuyente_contribuyentes (table: expediente_contribuyente)
ALTER TABLE expediente_contribuyente ADD CONSTRAINT fk_expediente_contribuyente_contribuyentes FOREIGN KEY fk_expediente_contribuyente_contribuyentes (contribuyentes_id)
    REFERENCES contribuyentes (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expediente_tipo_dependencia_expedientes (table: expediente_tipo_dependencia)
ALTER TABLE expediente_tipo_dependencia ADD CONSTRAINT fk_expediente_tipo_dependencia_expedientes FOREIGN KEY fk_expediente_tipo_dependencia_expedientes (expedientes_id)
    REFERENCES expedientes (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expediente_tipo_dependencia_tipo_dependencia (table: expediente_tipo_dependencia)
ALTER TABLE expediente_tipo_dependencia ADD CONSTRAINT fk_expediente_tipo_dependencia_tipo_dependencia FOREIGN KEY fk_expediente_tipo_dependencia_tipo_dependencia (tipo_dependencia_id)
    REFERENCES tipo_dependencia (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_catastro (table: expedientes)
ALTER TABLE expedientes ADD CONSTRAINT fk_expedientes_catastro FOREIGN KEY fk_expedientes_catastro (catastro_id)
    REFERENCES catastro (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_contribuyente_expediente (table: expediente_contribuyente)
ALTER TABLE expediente_contribuyente ADD CONSTRAINT fk_expedientes_contribuyente_expediente FOREIGN KEY fk_expedientes_contribuyente_expediente (expediente_id)
    REFERENCES expedientes (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_estado_baja (table: expedientes)
ALTER TABLE expedientes ADD CONSTRAINT fk_expedientes_estado_baja FOREIGN KEY fk_expedientes_estado_baja (estado_baja_id)
    REFERENCES estado_baja (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_estado_habilitacion (table: expedientes)
ALTER TABLE expedientes ADD CONSTRAINT fk_expedientes_estado_habilitacion FOREIGN KEY fk_expedientes_estado_habilitacion (estado_habilitacion_id)
    REFERENCES estado_habilitacion (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_inmueble_afectado (table: expedientes)
ALTER TABLE expedientes ADD CONSTRAINT fk_expedientes_inmueble_afectado FOREIGN KEY fk_expedientes_inmueble_afectado (inmueble_afectado_id)
    REFERENCES inmueble_afectado (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_expedientes_persona_juridica (table: expedientes)
ALTER TABLE expedientes ADD CONSTRAINT fk_expedientes_persona_juridica FOREIGN KEY fk_expedientes_persona_juridica (persona_juridica_id)
    REFERENCES persona_juridica (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_inmueble_afectado_domicilio (table: inmueble_afectado)
ALTER TABLE inmueble_afectado ADD CONSTRAINT fk_inmueble_afectado_domicilio FOREIGN KEY fk_inmueble_afectado_domicilio (domicilio_id)
    REFERENCES domicilios (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_inmueble_afectado_tipo_inmueble (table: inmueble_afectado)
ALTER TABLE inmueble_afectado ADD CONSTRAINT fk_inmueble_afectado_tipo_inmueble FOREIGN KEY fk_inmueble_afectado_tipo_inmueble (tipo_inmueble_id)
    REFERENCES tipo_inmueble (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- Reference: fk_usuarios_tipo_permiso (table: usuarios)
ALTER TABLE usuarios ADD CONSTRAINT fk_usuarios_tipo_permiso FOREIGN KEY fk_usuarios_tipo_permiso (tipo_permiso_id)
    REFERENCES tipo_permiso (id)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT;

-- End of file.

