-- /Create database pointeri_reporte;

CREATE TABLE IF NOT EXISTS reporte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tecnico VARCHAR(100),
    cliente VARCHAR(150),
    fecha DATE,
    municipio VARCHAR(100), 
    rig VARCHAR(10),
    solicitado_por VARCHAR(100),
    pozo VARCHAR(100),
    numero_orden VARCHAR(100),
    descripcion_trabajo VARCHAR(500),
    observaciones Varchar(500),
    items_json JSON
);

