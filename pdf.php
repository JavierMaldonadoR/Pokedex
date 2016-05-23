<?php 
    require_once("/FPDF/FPDF.php");
 class PDF extends FPDF
    { 
    function Header()
    {
        $this->SetFont('Arial','B',12);
        // Move to the right
        $this->Cell(80);
        $this->Cell(30,10,utf8_decode('Pokédex'),0,0,'C');
        $this->Ln(10);
    }
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
    //conectar
    $m = new MongoClient( "mongodb://root:root@ds019482.mlab.com:19482/pokemon");

    // seleccionar una base de datos
    $db = $m->pokemon;

    // seleccionar una colección (equivalente a una tabla en una base de datos relacional)
    $colección = $db->Pokedex;
    // encontrar todo lo que haya en la colección
    $cursor = $colección->find();

    ini_set('max_execution_time', 3000);
    
    switch ($_GET['orden']) {
                  case 'numero':
                    $cursor->sort(array('numero' => 1));
                    break;
                  case 'nombre':
                    $cursor->sort(array('nombre' => 1));
                    break;
                  case 'tipo1':
                    $cursor->sort(array('tipos.0' => 1));
                    break;
                  case 'tipo2':
                    $cursor->sort(array('tipos.1' => 1));
                    break;
                  case 'evolucion':
                    $cursor->sort(array('evolucion' => 1));
                    break;      
                }       
    $pdf = new PDF();
    $pdf->SetTitle("Pokédex",true);
    $pdf->AliasNbPages();

    //Formato
    $pdf->AddPage();
    $pdf->SetFont('Arial','',10);
    $pdf->Ln(6);
    $pdf->SetFillColor(65,89,243);

    //Titulos
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(14,6,'#',1,0,'C',true);
    $pdf->Cell(38,6,'Nombre',1,0,'C',true);
    $pdf->Cell(30,6,'Tipo 1',1,0,'C',true);
    $pdf->Cell(30,6,'Tipo 2',1,0,'C',true);
    $pdf->Cell(38,6,utf8_decode('Evolución'),1,0,'C',true);
    $pdf->Cell(30,6,'Imagen',1,0,'C',true);
    $pdf->Ln();

    //Datos
    foreach($cursor as $item) {
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(14,10,$item['numero'],1,0,'C',false);
        $pdf->Cell(38,10,$item['nombre'],1,0,'C',false);
        $pdf->Cell(30,10,$pdf->Image(settypes($item['tipos'][0]),$pdf->GetX()+4,$pdf->GetY()+2,22,6,'GIF'),1,0,'C',false);
        $pdf->Cell(30,10,$pdf->Image(settypes($item['tipos'][1]),$pdf->GetX()+4,$pdf->GetY()+2,22,6,'GIF'),1,0,'C',false);
        $pdf->Cell(38,10,utf8_decode($item['evolucion']),1,0,'C',false);
        $pdf->Cell(30,10,$pdf->Image($item['imagen'],$pdf->GetX()+10,$pdf->GetY(),10,10,'PNG'),1,0,'C',false);
        $pdf->Ln();
    }

function setTypes($type){
        switch ($type) {
        case 'PLANTA':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/d/d6/Tipo_planta.gif/revision/latest?cb=20140127195157";
        break;
        case 'VENENO':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/1/10/Tipo_veneno.gif/revision/latest?cb=20140127195142";
        break;
        case 'FUEGO':
        $url="http://vignette1.wikia.nocookie.net/es.pokemon/images/c/ce/Tipo_fuego.gif/revision/latest?cb=20140127195210";
        break;
        case 'VOLADOR':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/e/e1/Tipo_volador.gif/revision/latest?cb=20140127195141";
        break;
        case 'AGUA':
        $url="http://vignette4.wikia.nocookie.net/es.pokemon/images/9/94/Tipo_agua.gif/revision/latest?cb=20140127195223";
        break;
        case 'ACERO':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/d/d9/Tipo_acero.gif/revision/latest?cb=20140127195225";
        break;
        case 'BICHO':
        $url="http://vignette1.wikia.nocookie.net/es.pokemon/images/f/fe/Tipo_bicho.gif/revision/latest?cb=20140127195222";
        break;
        case 'DRAGON':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/0/01/Tipo_drag%C3%B3n.gif/revision/latest?cb=20140127195213";
        break;
        case 'ELECTRICO':
        $url="http://vignette4.wikia.nocookie.net/es.pokemon/images/1/1b/Tipo_el%C3%A9ctrico.gif/revision/latest?cb=20140127195211";
        break;
        case 'FANTASMA':
        $url="http://vignette1.wikia.nocookie.net/es.pokemon/images/4/47/Tipo_fantasma.gif/revision/latest?cb=20140127195210";
        break;
        case 'HIELO':
        $url="http://vignette4.wikia.nocookie.net/es.pokemon/images/4/40/Tipo_hielo.gif/revision/latest?cb=20140127195200";
        break;
        case 'LUCHA':
        $url="http://vignette1.wikia.nocookie.net/es.pokemon/images/b/b7/Tipo_lucha.gif/revision/latest?cb=20140127195159";
        break;
        case 'NORMAL':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/3/32/Tipo_normal.gif/revision/latest?cb=20140127195158";
        break;
        case 'HADA':
        $url="http://vignette2.wikia.nocookie.net/es.pokemon/images/b/bc/Tipo_hada.gif/revision/latest?cb=20140127195208";
        break;
        case 'PSIQUICO':
        $url="http://vignette4.wikia.nocookie.net/es.pokemon/images/1/15/Tipo_ps%C3%ADquico.gif/revision/latest?cb=20140127195156";
        break;
        case 'ROCA':
        $url="http://vignette2.wikia.nocookie.net/es.pokemon/images/e/e0/Tipo_roca.gif/revision/latest?cb=20140127195144";
        break;
        case 'TIERRA':
        $url="http://vignette3.wikia.nocookie.net/es.pokemon/images/1/1d/Tipo_tierra.gif/revision/latest?cb=20140127195143";
        break;
        case 'N/A':
        $url="http://chk.edu.mx/2012/images/FONDO%20BLANCO%20NUEVO.gif";
        break;
        }
        return $url;
        }

    $pdf->Output();
?>

