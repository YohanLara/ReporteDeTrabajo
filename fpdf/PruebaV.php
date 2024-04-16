<?php
require('fpdf.php');
class PDF extends FPDF
{
   // Cabecera de página
   function Header()
   {
      $this->Image('r-inst.png', 120, 8, 80);
      $this->Ln(11); 
       
      include "../modelo/conexion.php";
      $id = $_GET['id'];   

      $consulta_info = $conexion->query(" SELECT * FROM reporte Where id = $id");//traemos datos de la empresa desde BD
      $dato_info = $consulta_info->fetch_object();
      
      $this->Image('logo.png', 12, 14, 25);
      $this->SetFont('Arial', '', 8); // Puedes ajustar el tipo de fuente y el tamaño según tus preferencias
      $this->Cell(1);
      $this->Cell(0, 25, utf8_decode('NIT. 830.080.201-7'), 0, 0, 'L');
      $this->Ln(1); // Puedes ajustar la distancia entre el texto y otros elementos si es necesario                                         //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      
      $this->Addfont('Anton.php','',"Anton.php");
      $this->SetFont('Anton.php', '',  15);
      $this->Cell(45);
      $this->SetTextColor(42, 47, 134);
      $this->Cell(10, 10, utf8_decode('REPORTE DE TRABAJO'), 0, 1, 'C', 0, '',  0);
      $this->SetTextColor(255, 0, 0); // Establecer el color del texto a rojo
      $this->Cell (85);
      $this->Cell(0, 0, utf8_decode("N0: E- $dato_info->id"), 0, 0, 'L', 0, '', 0); // Parte en negro
      $this->Ln(10);
      $this->SetTextColor(0, 0, 0);
     
   /* UBICACION */
$this->Cell(1);  // mover a la derecha

$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(21, 11, utf8_decode("Fecha:"), 0, 0, 'L', 0);
$this->Cell(96, 10, utf8_decode(" $dato_info->fecha"), 0, 0, '', 0);
$this->Ln(5);

/* TELEFONO */
$this->Cell(1);  // mover a la derecha
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(21, 11, utf8_decode("Cliente:"), 0, 0, 'L', 0);
$this->Cell(59, 10, utf8_decode(" $dato_info->cliente"), 0, 0, '', 0);
$this->Ln(5);


$this->Cell(1);  // mover a la derecha
$this->Cell(21, 11, utf8_decode("Pozo:"), 0, 0, 'L', 0);
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(85, 10, utf8_decode(" $dato_info->pozo"), 0, 0, '', 0);
$this->Ln(5);

/* COREEO */
$this->Cell(1);  // mover a la derecha
$this->Cell(21, 11, utf8_decode("Solicitado Por:"), 0, 0, 'L', 0);
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(0, 11, utf8_decode(" $dato_info->solicitado_por"), 0, 0, '', 0);
$this->Ln(8);
/* Nuevos bloques alineados a la izquierda */
$this->SetXY(115, 45); // Establecer la posición para "Solicitado Por:"
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(15, 6, utf8_decode("Municipio:"), 0, 0, 'L', 0);
$this->Cell(1); // Espacio entre las etiquetas y los valores
$this->Cell(30, 6, utf8_decode($dato_info->municipio), 0, 0, 'L', 0);
$this->Ln(5);

$this->SetXY(115, 50); // Establecer la posición para "Municipio:"
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(15, 6, utf8_decode("RIG:"), 0, 0, 'L', 0);
$this->Cell(1); // Espacio entre las etiquetas y los valores
$this->Cell(30, 6, utf8_decode($dato_info->rig), 0, 0, 'L', 0);
$this->Ln(5);

$this->SetXY(115, 55); 
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(15, 6, utf8_decode("Tecnico:"), 0, 0, 'L', 0, '', 0);
$this->Cell(1); // Espacio entre las etiquetas y los valores
$this->Cell(30, 6, utf8_decode($dato_info->tecnico), 0, 0, 'L', 0);
$this->Ln(8);


$this->SetXY(115, 60); 
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  9);
$this->Cell(15, 6, utf8_decode("Orden N°:"), 0, 0, 'L', 0, '', 0);
$this->Cell(1); // Espacio entre las etiquetas y los valores
$this->Cell(30, 6, utf8_decode($dato_info->numero_orden), 0, 0, 'L', 0);
$this->Ln(8);

$this->SetTextColor(255, 255, 255); //colorTexto
$this->SetFillColor(42, 47, 134); //colorFondo
$this->SetDrawColor(163, 163, 163); //colorBorde
$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  );
$this->Cell(194, 6, utf8_decode('DESCRIPCION DEL TRABAJO REALIZADO'), 1, 0, 'C', 1);
$this->Ln(5);
//------------------------------------------------------------------------------------------------------------    
$this->SetTextColor(0, 0, 0); //colorTexto
$observacionesRectWidth = 194; // Ancho
$observacionesRectX = 10; // Ajusta según la posición X deseada
$observacionesRectHeight = 25; // Ajusta según la altura deseada

// Dibujar el rectángulo de observaciones debajo de las celdas
$observacionesRectY = $this->GetY() + 1; // Posición Y debajo de las celdas
$this->Rect($observacionesRectX, $observacionesRectY, $observacionesRectWidth, $observacionesRectHeight, 'D');

$this->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$this->SetFont('Nunito-Regular.php', '',  10);


$this->SetXY($observacionesRectX + 0, $observacionesRectY + 1); // Ajustar posición del texto dentro del rectángulo

$anchoMaximo = $observacionesRectWidth - 2; // Restamos 4 para dejar un pequeño margen a los lados

$texto = utf8_decode( $dato_info->descripcion_trabajo);
$lineas = $this->MultiCell($anchoMaximo, 3, $texto, 'L');

// Ajustar la posición Y para continuar debajo del rectángulo de observaciones
$this->SetY($observacionesRectY + $observacionesRectHeight + 2);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(42, 47, 134); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      
      $this->SetFont('Arial', 'B', 9);
      $this->Cell(12, 8, utf8_decode('ÍTEM'), 1, 0, 'C', 1);
      $this->Cell(20, 8, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
      $this->Cell(50, 8, utf8_decode('REFERENCIA O P/N'), 1, 0, 'C', 1);
      $this->Cell(112, 8, utf8_decode('DESCRIPCIÓN'), 1, 1, 'C', 1);

   }
   // Pie de página
   function Footer()
   {
$this->SetY(-28); // Posición: a 1,5 cm del final   
$this->SetFont('Arial', 'I', 6); // Tipo de fuente, cursiva, tamañoTexto

// Texto personalizado en el pie de página
$textoPersonalizado = "Calle 73 bis No. 27A-10 Tel.:(571) 311 1857 / 69 Bogotá D.C Colombia instrumentacion@pointerinstrument.com\nOriginal y copia blanca facturación / Copia azul cliente / Desarrollado por: Kevin Yohan Lara Tavera";
$this->MultiCell(0, 3, utf8_decode($textoPersonalizado), 0, 'C');
   }
}

// conexion a base de datos
$conexion=new mysqli("localhost","root","","pointeri_reporte");
$conexion->set_charset("utf8");    

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$id = $_GET['id'];
$i = 0; //incrementa las celdas de las tablas
$pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$pdf->SetFont('Nunito-Regular.php', '',  9);
$pdf->SetDrawColor(163, 163, 163);

// Definir el ancho de cada celda
$itemWidth = 12;
$cantidadWidth = 20;
$referenciaWidth = 50;
$descripcionWidth = 112;

// // AJUSTA TEXTO DENTRO DE DESCRIPCION
// $descripcionRectX = 92; // Ajusta según la posición X deseada
$descripcionRectWidth = 50; // 
$margenSuperior = 1; 

$x = 10;
$y = 109;

// Función para contar las líneas que ocupará un texto en un ancho dado
// function countLines() {
 
// }
// Iterar para mostrar 7 campos fijos
for ($i = 0; $i < 8; $i++) {
    // Dibujar rectángulos para cada columna
    $pdf->Rect($x, $y, $itemWidth, 12);
    $pdf->Rect($x + $itemWidth, $y, $cantidadWidth, 12);
    $pdf->Rect($x + $itemWidth + $cantidadWidth, $y, $referenciaWidth, 12);
    $pdf->Rect($x + $itemWidth + $cantidadWidth + $referenciaWidth, $y, $descripcionWidth, 12);

    // Colocar texto dentro de los rectángulos (vacíos por ahora)
    $pdf->SetXY($x, $y);
    $pdf->MultiCell($itemWidth, 6, '', 0, 'C');
    $pdf->SetXY($x + $itemWidth, $y);
    $pdf->MultiCell($cantidadWidth, 6, '', 0, 'C');
    $pdf->SetXY($x + $itemWidth + $cantidadWidth, $y);
    $pdf->MultiCell($referenciaWidth, 6, '', 0, 'C');
    $pdf->SetXY($x + $itemWidth + $cantidadWidth + $referenciaWidth, $y);
    $pdf->MultiCell($descripcionWidth, 6, '', 0, 'L');

    $y += 12;
}
$y = 109;

$consulta = $conexion->query("SELECT * FROM reporte WHERE id = $id ");
$reportes = [];

while ($reporte_data = $consulta->fetch_object()) {
    $reportes[] = $reporte_data;
}

// Iterar sobre las reportes y mostrar los datos en las celdas correspondientes
foreach ($reportes as $reporte) {
    $datos_items = json_decode($reporte->items_json);

    foreach ($datos_items as $datos_item) {
        $item = $datos_item->item;
        $cantidad = $datos_item->cantidad;
        $referencia = $datos_item->referencia;
        $descripcion = $datos_item->descripcion;
    
        // Limitar la descripción si excede el ancho máximo
        if ($pdf->GetStringWidth($descripcion) > $descripcionWidth) {
            $descripcion = substr($descripcion, 0, 228) . '.'; // Limitar a 340 caracteres
        }
    
        // Limitar la referencia si excede el ancho máximo
        if ($pdf->GetStringWidth($referencia) > $referenciaWidth) {
            $referencia = substr($referencia, 0, 81) . '.'; // Limitar a 50 caracteres
        }
        
        $anchoMaximo = 112;
        // Dibujar rectángulos para cada columna
        $pdf->Rect($x, $y, $itemWidth, 12);
        $pdf->Rect($x + $itemWidth, $y, $cantidadWidth, 12);
        $pdf->Rect($x + $itemWidth + $cantidadWidth, $y, $referenciaWidth, 12);
        $pdf->Rect($x + $itemWidth + $cantidadWidth + $referenciaWidth, $y, $descripcionWidth, 12);

        // Colocar texto dentro de los rectángulos
        $pdf->SetXY($x, $y);
        $pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
        $pdf->SetFont('Nunito-Regular.php', '',  9);
        $pdf->MultiCell($itemWidth, 6, utf8_decode($item), 0, 'C');
        $pdf->SetXY($x + $itemWidth, $y);
        $pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
        $pdf->SetFont('Nunito-Regular.php', '',  9);
        $pdf->MultiCell($cantidadWidth, 6, utf8_decode($cantidad), 0, 'C');
        $pdf->SetXY($x + $itemWidth + $cantidadWidth, $y);
        $pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
        $pdf->SetFont('Nunito-Regular.php', '',  9);
        $pdf->SetXY($x + $itemWidth + $cantidadWidth, $y + $margenSuperior); // Ajuste de margen superior
        $texto_referencia = utf8_decode($referencia);
        $pdf->MultiCell($referenciaWidth, 3, $texto_referencia, 0, 'C');

        $pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
        $pdf->SetFont('Nunito-Regular.php', '',  9);
        $pdf->SetXY($x + $itemWidth + $cantidadWidth + $descripcionRectWidth, $y + $margenSuperior); // Ajuste de margen superior
        $texto = utf8_decode($descripcion);
        $pdf->MultiCell($anchoMaximo, 3, $texto, 0, 'L');

        // Actualizar la posición Y para la siguiente fila
        $y += 12;
    }
}


//--------------------------------------------------------------------------------------------------------------
// // // Definir el ancho del rectángulo de observaciones
$observacionesRectWidth = 194; // Ancho
$observacionesRectX = 10; // Ajusta según la posición X deseada
$observacionesRectHeight = 25; // Ajusta según la altura deseada

// Dibujar el rectángulo de observaciones debajo de las celdas
$observacionesRectY = 207; // Posición Y debajo de las celdas
$pdf->Rect($observacionesRectX, $observacionesRectY, $observacionesRectWidth, $observacionesRectHeight, 'D');

$pdf->AddFont('Nunito-Regular.php', '', "Nunito-Regular.php");
$pdf->SetFont('Nunito-Regular.php', '',  9);
$pdf->SetXY($observacionesRectX + 0, $observacionesRectY +2); // Ajustar posición del texto dentro del rectángulo

$anchoMaximo = $observacionesRectWidth - 26 ; // Restamos 4 para dejar un pequeño margen a los lados


$pdf->Cell(23, 3, utf8_decode("Observaciones:"), 0, 'L', 0);
$pdf->SetXY(34, 209);
// $pdf->Cell(25,1,);
$texto = utf8_decode("$reporte->observaciones");
$lineas = $pdf->MultiCell($anchoMaximo, 3, $texto, 0, 'L');


// Ajustar la posición Y para continuar debajo del rectángulo de observaciones
$pdf->SetY($observacionesRectY + $observacionesRectHeight + 2);
//-----------------------------------------------------------------------------------------------------------------
// CUADRO (ELABORADO POR)
// Definir el ancho del rectángulo para "Elaborado por"
$observacionesRectWidth = 94; // Ancho
$observacionesRectX = 10; // Ajusta según la posición X deseada
$observacionesRectHeight = 30; // Ajusta según la altura deseada

// Dibujar el rectángulo para "Elaborado por"
$observacionesRectY = $pdf->GetY() + 0; // Posición Y debajo de las celdas
$pdf->Rect($observacionesRectX, $observacionesRectY, $observacionesRectWidth, $observacionesRectHeight, 'D');

// Agregar texto centrado en la parte superior del cuadro "Elaborado por"
$pdf->SetXY($observacionesRectX, $observacionesRectY);
$pdf->Cell($observacionesRectWidth, 5, utf8_decode('Elaborado por'), 0, 0, 'C', 0);

// Agregar línea para firmar
$pdf->Line($observacionesRectX + 5, $observacionesRectY + $observacionesRectHeight - 16, $observacionesRectX + $observacionesRectWidth - 5, $observacionesRectY + $observacionesRectHeight - 16);
//------------------------------------------------------------------------------------------------------------------
// CUADRO (RECIBIDO POR)
// Definir el ancho del rectángulo para "Recibido por"
$observacionesRectWidth = 98; // Ancho
$observacionesRectX = 106; // Ajusta según la posición X deseada
$observacionesRectHeight = 30; // Ajusta según la altura deseada

// Dibujar el rectángulo para "Recibido por"
$observacionesRectY = $pdf->GetY() + 0; // Posición Y debajo de las celdas
$pdf->Rect($observacionesRectX, $observacionesRectY, $observacionesRectWidth, $observacionesRectHeight, 'D');

// Agregar texto centrado en la parte superior del cuadro "Recibido por"
$pdf->SetXY($observacionesRectX, $observacionesRectY);
$pdf->Cell($observacionesRectWidth, 5, utf8_decode('Recibido por'), 0, 0, 'C', 0);

// Agregar línea para firmar
$pdf->Line($observacionesRectX + 5, $observacionesRectY + $observacionesRectHeight - 16, $observacionesRectX + $observacionesRectWidth - 5, $observacionesRectY + $observacionesRectHeight - 16);

//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
// Agregar texto debajo de la línea [CORRESPONDE A ELABORADO POR]
$pdf->SetY($observacionesRectY + $observacionesRectHeight - 14); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX - 91); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 0, utf8_decode('Firma'), 0, 0, 'L', 0);

$pdf->SetY($observacionesRectY + $observacionesRectHeight - 10); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX - 91); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 0, utf8_decode('Nombre'), 0, 0, 'L', 0);

$pdf->SetY($observacionesRectY + $observacionesRectHeight - 10); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX - 91); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 8, utf8_decode('C.C.'), 0, 0, 'L', 0);
//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

//CORRESPONDE A (RECIBIDO POR)
// Agregar texto debajo de la línea
$pdf->SetY($observacionesRectY + $observacionesRectHeight - 14); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX + 5); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 0, utf8_decode('Firma'), 0, 0, 'L', 0);

$pdf->SetY($observacionesRectY + $observacionesRectHeight - 10); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX + 5); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 0, utf8_decode('Nombre'), 0, 0, 'L', 0);

$pdf->SetY($observacionesRectY + $observacionesRectHeight - 10); // Ajustar la posición Y debajo de la línea
$pdf->SetX($observacionesRectX + 5); // Ajustar la posición X al lado izquierdo del cuadro
$pdf->SetFontSize(7); // Establecer el tamaño de la letra a 7 puntos
$pdf->Cell(0, 8, utf8_decode('C.C.'), 0, 0, 'L', 0);

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
