# Registro de semillas
Registra y gestiona muestras de semillas recibidas. Cada muestra contiene información sobre su origen y posteriormente se le asocian resultados de análisis.


# Solucion implementada

Se crearon dos tablas:

<div align="center">
<img src="DiagramaSemillasSQL.png" alt="Texto alternativo">
</div>


# Requerimientos

Crear las tablas "Muestras" y "Resultados"

```

CREATE TABLE muestras (
  codigo_de_muestra INT AUTO_INCREMENT PRIMARY KEY,
  especie VARCHAR(255) NOT NULL,
  numero_de_presinto INT NOT NULL,
  empresa TEXT NOT NULL,
  cantidad_de_semillas INT,
  CHECK (cantidad_de_semillas > 0),
  CHECK (numero_de_presinto >= 0)
);


CREATE TABLE resultados (
  codigo_de_muestra INT PRIMARY KEY,
  poder_germinativo FLOAT NOT NULL,
  pureza FLOAT NOT NULL,
  materiales_inertes LONGTEXT NOT NULL,
  FOREIGN KEY (codigo_de_muestra) REFERENCES muestras(codigo_de_muestra) ON DELETE CASCADE,
  CHECK (poder_germinativo >= 0.0 and poder_germinativo <= 1.0),
  CHECK (pureza >= 0.0 and pureza <= 1.0)
);

```


## Version

CakePHP 5.2.9