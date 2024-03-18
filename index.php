<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    

<?php
include "controlador/insertcode.php";  
include "modelo/conexion.php"; 
?>

<!-- HTML del formulario con la imagen -->
<form id="formulario" action="" class="row g-3" style="max-width: 1000px; margin: 0 auto; position: relative;" method="post" autocomplete="off">
    <img src="fpdf/Pi.jpg" alt="imagen-superior-izquierda" class="imagen-superior-izquierda">
    <h4 id="formulario-titulo">FORMULARIO REPORTE DE TRABAJO</h4>



    <div class="col-md-6 campo-delgado">
    <label for="tecnico" class="form-label">Tecnico</label>
    <input type="text" class="form-control" name="tecnico" id="tecnico" oninput="this.value = this.value.toUpperCase()">
</div>

    <div class="col-md-6 campo-delgado">
        <label for="cliente" class="form-label">Cliente</label>
        <input type="text" class="form-control" name="cliente" id="cliente" oninput="this.value = this.value.toUpperCase()">
    </div>

    <div class="col-3 campo-delgado">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" name="fecha" id="fecha">
    </div>

    <div class="col-md-4 campo-delgado">
        <label for="municipio" class="form-label">Municipio</label>
        <input type="text" class="form-control" name="municipio" id="municipio"oninput="this.value = this.value.toUpperCase()">
    </div>

    <div class="col-5 campo-delgado">
        <label for="solicitado_por" class="form-label">Solicitado Por</label>
        <input type="text" class="form-control" name="solicitado_por" id="solicitado_por" oninput="this.value = this.value.toUpperCase()">
    </div>

    <div class="col-md-4 campo-delgado">
        <label for="rig" class="form-label">RIG</label>
        <input type="text" class="form-control" name="rig" id="rig"oninput="this.value = this.value.toUpperCase()">
    </div>

    <div class="col-md-4 campo-delgado">
        <label for="pozo" class="form-label">Pozo</label>
        <input type="text" class="form-control" name="pozo" id="pozo"oninput="this.value = this.value.toUpperCase()">
    </div>
    <div class="col-md-4 campo-delgado">
        <label for="numero_orden" class="form-label">Orden N°</label>
        <input type="number" class="form-control" name="numero_orden" id="numero_orden">
    </div>

    <div class="col-md-12">
        <label for="descripcion_trabajo" class="estilo-label">DESCRIPCIÓN DEL TRABAJO REALIZADO</label>
        <textarea class="form-control" name="descripcion_trabajo" id="descripcion_trabajo" rows="3" style="border: 1px solid black;"></textarea>
    </div>


    <!-- Datos del ítem -->
    <div class="col-md-1 campo-delgado">
        <label for="item" class="form-label"><span>Item</span></label>
        <input type="number" class="form-control" name="item[]" value="1" readonly>
    </div>
    <div class="col-md-2 campo-delgado">
        <label for="cantidad" class="form-label"><span>Cantidad</span></label>
        <input type="number" class="form-control" name="cantidad[]">
    </div>
    <div class="col-md-4 campo-delgado">
        <label for="referencia" class="form-label"><span>Referencia</span></label>
        <input type="text" class="form-control" name="referencia[]">
    </div>
    <div class="col-md-5 campo-delgado">
        <label for="descripcion" class="form-label"><span>Descripcion</span></label>
        <input type="text" class="form-control" name="descripcion[]">
    </div>
   
    <button id="adicional" name="adicional" type="button" class="btn" style="background-color: rgb(42, 47, 134); color: white;" onclick="agregarCampos()"> Más Campos +</button>
    <button type="button" class="btn" style="background-color: rgb(134, 197, 237); color: white;" onclick="eliminarFila(this)">Menos Campos -</button>
    
    <div class="col-md-12 ">
  <label for="observaciones">Observaciones</label>
  <textarea class="form-control" name="observaciones" id="observaciones" rows="3" style="border: 1px solid black;"></textarea>
</div>


    <div class="col-8">
    <button type="submit" name="insertar" id="insertar" style = "background-color: rgb(72, 109, 178); color: white;" class="btn btn-success">Insertar Datos</button>
    </div>
</form>


<script src="js/inp-dim.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

