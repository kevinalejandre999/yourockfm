CREATE TABLE votaciones (
  vot_id INTEGER(11) NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(50) NOT NULL,
  fecha DATE,
  activo BOOLEAN,
  PRIMARY KEY(vot_id)
)
ENGINE=InnoDB;

CREATE TABLE visitas (
  vist_id INTEGER(11) NOT NULL AUTO_INCREMENT,
  anio INTEGER(4) NOT NULL,
  mes INTEGER(2) NOT NULL,
  dia INTEGER(2) NOT NULL,
  hora INTEGER(2) NOT NULL,
  minuto INTEGER(2) NOT NULL,
  segundo INTEGER(2) NOT NULL,
  ip VARCHAR(20) NOT NULL,
  navegador VARCHAR(100) NOT NULL,
  sesion_id VARCHAR(50) NOT NULL,
  PRIMARY KEY(vist_id)
)
ENGINE=InnoDB;

CREATE TABLE programaciones (
  prog_id INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  descripcion VARCHAR(200) NOT NULL,
  hora_inicio VARCHAR(10),
  hora_fin VARCHAR(10),
  en_aire BOOLEAN,
  conductores VARCHAR(100),
  prog_img VARCHAR(50),
  cond_img VARCHAR(50),
  PRIMARY KEY(prog_id)
)
ENGINE=InnoDB;

CREATE TABLE musicas (
  musi_id INTEGER(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  anio INTEGER(4),
  puntos_acumulados INTEGER(11),
  posicion_general INTEGER(11),
  PRIMARY KEY(musi_id)
)
ENGINE=InnoDB;

CREATE TABLE grupos (
  grup_id INTEGER(11) NOT NULL AUTO_INCREMENT,
  musi_id INTEGER(11) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  fecha_fundacion DATE,
  genero VARCHAR(100),
  integrantes VARCHAR(200),
  nacionalidad VARCHAR(50),
  img_path VARCHAR(100),
  puntos_acumulados INTEGER(11) ,
  posicion_general INTEGER(6) ,
  obs VARCHAR(200),
  PRIMARY KEY(grup_id),
  FOREIGN KEY(musi_id)
    REFERENCES musicas(musi_id)
      ON DELETE RESTRICT
      ON UPDATE CASCADE
)
ENGINE=InnoDB;

CREATE TABLE rankings (
  musi_id INTEGER(11) NOT NULL,
  vot_id INTEGER(11) NOT NULL,
  total_puntos INTEGER(11),
  posicion INTEGER(5) ,
  PRIMARY KEY(musi_id, vot_id),
  FOREIGN KEY(musi_id)
    REFERENCES musicas(musi_id)
      ON DELETE RESTRICT
      ON UPDATE RESTRICT,
  FOREIGN KEY(vot_id)
    REFERENCES votaciones(vot_id)
      ON DELETE RESTRICT
      ON UPDATE RESTRICT
)
ENGINE=InnoDB;

CREATE TABLE votacion_detalle (
  vot_id INTEGER(11) NOT NULL,
  vist_id INTEGER(11) NOT NULL,
  musi_id INTEGER(11) NOT NULL,
  puntos INTEGER(2),
  PRIMARY KEY(vot_id, vist_id),
  FOREIGN KEY(vot_id)
    REFERENCES votaciones(vot_id)
      ON DELETE RESTRICT
      ON UPDATE RESTRICT,
  FOREIGN KEY(vist_id)
    REFERENCES visitas(vist_id)
      ON DELETE RESTRICT
      ON UPDATE RESTRICT,
  FOREIGN KEY(musi_id)
    REFERENCES musicas(musi_id)
      ON DELETE RESTRICT
      ON UPDATE RESTRICT
)
ENGINE=InnoDB;


