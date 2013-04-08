<?php
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

    // get the HTML
    /*
	ob_start();
    include(dirname(__FILE__).'/res/exemple00.php');
    $content = ob_get_clean();
	*/
	
	
	$content = "<page>
		<h1>HTML2PDF Demo ...</h1>";
	
	$content .= "<table border='1'>";
	$content .= "<thead><tr><td>No</td><td>Content</td></tr></thead>";
	$content .= "<tbody>";
	for ($i = 0; $i < 30; $i++){
		$content .= "<tr><td>".$i."</td><td>";
		for ($j = 0; $j < 30; $j++){
			$content .= "This is line ".$j.". ";
		}
		$content .= "</td> </tr>";
	}
	$content .= "</tbody>";
	$content .= "</table>";
	
	
	$content .= "</page>";
	
    // convert in PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('test.pdf');
	}
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
