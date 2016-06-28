
<?php
require_once 'includes/init.php';
$class  = filter_input(INPUT_GET, 'risorsa',  FILTER_SANITIZE_STRING);
$method = filter_input(INPUT_GET, 'metodo', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

if ($class == 'author'){

	if ($method == 'save'){
		$entityBody = file_get_contents('php://input');
		
		$authObj = json_decode($entityBody);
		$item = array(
					'nome_autore' => $authObj->nomeAutore
							);
		$libro = new Libro($item);
		$results = $libro->aggiungiAutore();

		header('Content-Type: application/json');
		if ($results[1] == "Autore aggiunto correttamente. "){
			http_response_code(200);
			$risposta = array("Code"=>"200", "Reason"=>"Autore aggiunto", "boh"=>"ll");

		} else {
			http_response_code(404);
			$risposta = array("Code"=>"404", "Reason"=>"Autore non aggiunto", "boh"=>"ll");

		}
		echo json_encode($risposta);
		
		

	}
}




//$this->response($this->json($libri), 200); // send user detailsLibro::getLibri()
/*
if $class == 'libro'

	if $method == 'get'
		//prendo tutti i libri del db e li ritorno come json
		
*/