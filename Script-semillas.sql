
DROP TABLE IF EXISTS resultados;
DROP TABLE IF EXISTS muestras;


CREATE TABLE muestras (
  codigo_de_muestra VARCHAR(255) NOT NULL PRIMARY KEY,
  especie VARCHAR(220) NOT NULL,
  numero_de_presinto INT NOT NULL,
  empresa TEXT NOT NULL,
  cantidad_de_semillas INT,
  fecha_resgistro DATETIME DEFAULT CURRENT_TIMESTAMP,
  fecha_modificado DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  fecha_extraccion DATE NULL DEFAULT NULL,
  CHECK (cantidad_de_semillas > 0),
  CHECK (numero_de_presinto >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE resultados (
  codigo_de_muestra VARCHAR(255) NOT NULL PRIMARY KEY,
  poder_germinativo FLOAT NOT NULL,
  pureza FLOAT NOT NULL,
  materiales_inertes LONGTEXT NOT NULL,
  FOREIGN KEY (codigo_de_muestra) REFERENCES muestras(codigo_de_muestra) ON DELETE CASCADE,
  CHECK (poder_germinativo >= 0.0 and poder_germinativo <= 1.0),
  CHECK (pureza >= 0.0 and pureza <= 1.0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



