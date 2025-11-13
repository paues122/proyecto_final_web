<?php 
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

require_once __DIR__."/sistema.php";
class Reporte extends Sistema{
    var $content;
    function __construct(){
        $this->content= ob_get_clean();
    }
    function institucionesInvestigadores(){
        $instituciones = new Institucion();
        $data = $instituciones->reporteInstitucionesInvestigadores();
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->setDefaultFont('Arial');
        $this->content="
        <h1 style='color:blue'> Cantidad de investigadores en cada institución</h1>
        <table style='width:100%; border:1px solid black; border-collapse: collapse;'>
            <thead>
                <tr style='width:100%; border:1px solid black;'>
                    <th style='width:350px'>Institución</th>
                    <th>Investigadores</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($data as $institucion):
                $this->content.="
                <tr>
                    <td>".
                    $institucion['institucion'];
                    $this->content.="</td>
                    <td>".
                    $institucion['total_investigadores'];
                    $this->content.=" </td>
                </tr>";
            endforeach;
            $this->content.="
            </tbody>
        </table>";
        $html2pdf->writeHTML($this->content);
        $html2pdf->output('ReporteInstitucion.pdf');
    }

    function institucionesExcel($nombre){
        $instituciones = new Institucion();
        $data = $instituciones->reporteInstitucionesInvestigadores();
        // Crear una nueva instancia de la hoja de cálculo
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Añadir datos a las celdas
        $sheet->setCellValue('A1', 'Institución');
        $sheet->setCellValue('B1', 'Cantidad de Investigadores');
        $i=2;
        foreach ($data as $institucion):
            $sheet->setCellValue('A'.$i, $institucion['institucion']);
            $sheet->setCellValue('B'.$i, $institucion['total_investigadores']);
            $i++;
        endforeach;
        // Crear un escritor para el formato XLS
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);

        // Configurar las cabeceras para la descarga del archivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$nombre.'"');
        header('Cache-Control: max-age=0');

        // Guardar el archivo directamente en el stream de salida
        $writer->save('php://output');
        exit;
    }

    function reporteQR(){
        $qrCode = QrCode::create("<h1>Reporte de QR Code</h1><p>Generado en PHP</p>")
        ->setSize(300)
        ->setMargin(10);

    // 4. Crear una instancia del escritor
        $writer = new PngWriter();

    // 5. Generar y mostrar la imagen en el navegador
        $result = $writer->write($qrCode);
        header('Content-Type: '.$result->getMimeType());
        echo $result->getString();
    }
}
?>