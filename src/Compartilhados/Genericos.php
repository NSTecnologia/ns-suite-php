<?php
class Genericos{

	public function gravarLinhaLog($modelo, $msg){
		$dir = './log/';
		if(!file_exists($dir)) mkdir($dir);
		$arq = fopen($dir.date('Ymd').'.log', 'a+');
	    $msg = sprintf("[%s][%s]: %s%s", date('Y/m/d H:i:s'), $modelo, $msg, PHP_EOL);
	    fwrite($arq, $msg);
	    fclose($arq);
	}	
    public function salvaJSON($json, $caminho, $nome){
        $localSalvar = $caminho . $nome . '.json';
		$fp = fopen($localSalvar, 'w+');
		fwrite($fp, json_encode($json));
		fclose($fp);
    }
    
    public function salvaPDF($pdf, $caminho, $nome){
        $localSalvar = $caminho . $nome . '.pdf';
		$fp = fopen($localSalvar, 'w+');
		fwrite($fp, base64_decode($pdf));
		fclose($fp);
    }
    
    public function salvaXML($xml, $caminho, $nome){
        $localSalvar = $caminho . $nome . '.xml';
		$fp = fopen($localSalvar, 'w+');
		fwrite($fp, $xml);
		fclose($fp);
    }

    public function exibirNaTela($caminho, $nome) {
        $filename = $nome . '.pdf';
		$file = $caminho . $filename;		
		header('Content-type: application/pdf');
		header('Content-Disposition: inline; filename="' . $filename . '"');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($file));
		header('Accept-Ranges: bytes');

		@readfile($file);
	}
}
?>