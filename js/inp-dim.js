 // Declarar un contador global
 var contadorItems = 2;

function agregarCampos() {
    // Verificar si el contador ya ha alcanzado el límite de 7
   

    var container = $("form");
    // Construir la nueva fila dinámicamente
    var nuevaFila = $('<div class="row g-1"></div>').append(
        '<div class="col-md-1 campo-delgado">' +
        '  <label for="item" class="form-label"><span>Item</span></label>' +
        '  <input type="number" class="form-control" name="item[]" value="' + contadorItems + '" readonly>' +
        '</div>' +
        '<div class="col-md-2 campo-delgado">' +
        '  <label for="cantidad" class="form-label"><span>Cantidad</span></label>' +
        '  <input type="number" class="form-control" name="cantidad[]">' +
        '</div>' +
        '<div class="col-md-4 campo-delgado">' +
        '  <label for="referencia" class="form-label"><span>Referencia</span></label>' +
        '  <input type="text" class="form-control" name="referencia[]">' +
        '</div>' +
        '<div class="col-md-5 campo-delgado">' +
        '   <label for="descripcion" class="form-label"><span> Descripcion</span></label>' +
        '  <textarea class="form-control" name="descripcion[]" rows="1" style="border: 1px solid black;"></textarea>' +
        '</div>'
    );
    if (contadorItems > 8) {
        return; // No hacer nada si ya hay 7 elementos
    }
    // Incrementar el contador de ítems
    contadorItems++;

    
    // Limpiar los valores clonados
    nuevaFila.find('input[type="text"]').val('');

    // Agregar la nueva fila antes del botón "Más +"
    container.find('#adicional').before(nuevaFila);
}

function eliminarFila() {
    var container = $("form");

    // Obtener todas las filas clonadas
    var filas = container.find('.row.g-1');

    // Verificar que haya más de una fila antes de eliminar
    if (filas.length > 0) {
        // Eliminar la última fila
        filas.last().remove();
        // Decrementar el contador de ítems cuando se elimina una fila
        contadorItems--;
    }
}
