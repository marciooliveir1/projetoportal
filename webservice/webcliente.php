<?php
//Aplicação cliente servidor
    $client = new SoapClient(null, array(
		'location' => 'http://localhost/parcialnoticias/webservice/webserver.php',
		// ex.: http://localhost/soap/server.php
		'uri' => 'http://localhost/parcialnoticias/webservice/',  				
		// ex.: http://localhost/soap/
		'trace' => 1));
	// Chamada do servico SOAP criado no server
	$result = $client->getAllPortais();
	// verifica erros na execucao do servico e exibe o resultado na tela
	if (is_soap_fault($result)){
		trigger_error("SOAP Fault: (faultcode: {$result->faultcode},
		faultstring: {$result->faulstring})", E_ERROR);
	}else{
//Mostra o resultado na tela	    
		print_r($result);
	}
?>
