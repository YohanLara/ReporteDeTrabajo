<?php
include "modelo/conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insertar'])) {
    // Recupera los datos del formulario
 
    $tecnico = $_POST["tecnico"];
    $cliente = $_POST["cliente"];
    $fecha = $_POST["fecha"];
    $municipio = $_POST["municipio"];
    $rig = $_POST["rig"];
    $solicitado_por = $_POST["solicitado_por"];
    $pozo = $_POST["pozo"];
    $numero_orden = $_POST["numero_orden"];
    $descripcion_trabajo = $_POST["descripcion_trabajo"];
    $observaciones = $_POST["observaciones"];
  
    // Crear un array para almacenar los datos de los ítems
    $items = array();

    // Verifica si se enviaron datos en los campos dinámicos (ítems)
    if (isset($_POST['item']) && is_array($_POST['item'])) {
        $item_count = count($_POST['item']);

        // Iterar sobre los ítems y almacenar en el array
        for ($i = 0; $i < $item_count; $i++) {
            $item = $_POST['item'][$i];
            $cantidad = $_POST['cantidad'][$i];
            $referencia = $_POST['referencia'][$i];
            $descripcion = $_POST['descripcion'][$i];

            $items[] = array(
                'item' => $item,
                'cantidad' => $cantidad,
                'referencia' => $referencia,
                'descripcion' => $descripcion
            );
        }
    }
    // Convertir el array de ítems a formato JSON
    $items_json = json_encode($items);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    // Eliminar el registro anterior de la tabla remision_data
    $eliminar_query = "DELETE FROM reporte";
    if (!$conexion->query($eliminar_query)) {
        echo "Error al eliminar el registro anterior: " . $conexion->error;
        $conexion->close();
        exit();
    }

    // Insertar datos en la tabla principal
    $query = "INSERT INTO reporte (  tecnico, cliente, fecha, municipio, rig, solicitado_por, pozo, numero_orden, descripcion_trabajo, observaciones, items_json) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la sentencia
    $stmt = $conexion->prepare($query);
    if (!$stmt) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    // Vincular parámetros
    $stmt->bind_param("sssssssssss",  $tecnico, $cliente, $fecha, $municipio, $rig, $solicitado_por, $pozo, $numero_orden, $descripcion_trabajo, $observaciones, $items_json );

    // // Ejecutar la sentencia
    if ($stmt->execute()) {
        // Obtener el ID del último registro insertado
        $id = $stmt->insert_id;
        // Redireccionar a la página de PDF en una nueva ventana
        echo '<script>window.open("./fpdf/PruebaV.php?id=' . $id. '", "_self");</script>';
        // Redireccionar a remision.php (formulario principal)
        echo '<script>window.location.href = "index.php";</script>';
        exit();
    } else {
        echo "Error al insertar datos: " . $stmt->error;
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $conexion->close();
}
?>

