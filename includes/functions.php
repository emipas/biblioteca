<?php
/**
 * loadContent
 * Load the Content
 * @param $default
 */
function loadContent($where, $default='') {
	// Get the content from the url
	// Sanitize it for security reasons
	$content = filter_input(INPUT_GET, $where, FILTER_SANITIZE_STRING);
	$default = filter_var($default, FILTER_SANITIZE_STRING);
	// If there wasn't anything on the url, then use the default
	$content = (empty($content)) ? $default : $content;
	// If you found have content, then get it and pass it back
	if ($content) {
		// sanitize the data to prevent hacking.
		$html = include 'content/'.$content.'.php';
		return $html;
	}
}

function addAutore() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array(
					'nome_autore' => filter_input(INPUT_POST,'nome_autore',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
							);
							// Set up a Contact object based on the posts
							$libro = new Libro($item);
							$results = $libro->aggiungiAutore();
					}
					}
					return $results;
}

function maintAutore() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array('id_autore' => (int) $_POST['id_autore'], 
					'nome_autore' => filter_input(INPUT_POST,'nome_autore',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
							);
							// Set up a Contact object based on the posts
							$libro = new Libro($item);
							$results = $libro->modificaAutore();
					}
					}
					return $results;
}

function deleteAutore() {
	$results = '';
	if (isset($_POST['elimina']) AND $_POST['elimina'] == 'Elimina') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.', '');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);

			// Delete the Contact from the table
			$results = Libro::eliminaAutore((int) $_POST['id_autore']);
		}
	}
	return $results;
}

function addCategoria() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array(
					'descrizione' => filter_input(INPUT_POST,'descrizione',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
							);
							// Set up a Contact object based on the posts
							$libro = new Libro($item);
							$results = $libro->aggiungiCategoria();
					}
					}
					return $results;
}

function maintCategoria() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array('id_categoria' => (int) $_POST['id_categoria'], 
					'descrizione' => filter_input(INPUT_POST,'descrizione',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
							);
							// Set up a Contact object based on the posts
							$libro = new Libro($item);
							$results = $libro->modificaCategoria();
					}
					}
					return $results;
}

function deleteCategoria() {
	$results = '';
	if (isset($_POST['elimina']) AND $_POST['elimina'] == 'Elimina') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.', '');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);

			// Delete the Contact from the table
			$results = Libro::eliminaCategoria((int) $_POST['id_categoria']);
		}
	}
	return $results;
}

function addUtente() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array(
					'nome_utente' => filter_input(INPUT_POST,'nome_utente',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
					);
			// Set up a Contact object based on the posts
			$libro = new Libro($item);		
			$results = $libro->aggiungiUtente();
			}
			}
			return $results;
}

function maintUtente() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array('id_utente' => (int) $_POST['id_utente'], 
					'nome_utente' => filter_input(INPUT_POST,'nome_utente',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES)
					);
			// Set up a Contact object based on the posts
			$libro = new Libro($item);		
			$results = $libro->modificaUtente();
			}
			}
			return $results;
}

function deleteUtente() {
	$results = '';
	if (isset($_POST['elimina']) AND $_POST['elimina'] == 'Elimina') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.', '');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);

			// Delete the Contact from the table
			$results = Libro::eliminaUtente((int) $_POST['id_utente']);
		}
	}
	return $results;
}

function addLibro() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.','');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);
			$item = array( 
					'titolo' => filter_input(INPUT_POST,'titolo',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
					'isbn' => filter_input(INPUT_POST,'isbn',
							FILTER_SANITIZE_STRING),
					'editore' => filter_input(INPUT_POST,'editore',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
					'numero_pagine' => filter_input(INPUT_POST,'numero_pagine',
							FILTER_SANITIZE_STRING),
					'collocazione' => filter_input(INPUT_POST,'collocazione',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
					'argomenti' => filter_input(INPUT_POST,'argomenti',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
					'num_pag_lette' => filter_input(INPUT_POST,'num_pag_lette',
							FILTER_SANITIZE_STRING),
					'data_inizio_lettura' => filter_input(INPUT_POST,'data_inizio_lettura',
							FILTER_SANITIZE_STRING),
					'data_fine_lettura' => filter_input(INPUT_POST,'data_fine_lettura',
							FILTER_SANITIZE_STRING),
					'note' => filter_input(INPUT_POST,'note',
							FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
			);

			// Set up a Contact object based on the posts
			$libro = new Libro($item);
				$results = $libro->aggiungiLibro();		
	}
	}
	return $results;
}

function deleteLibro() {
	$results = '';
	if (isset($_POST['elimina']) AND $_POST['elimina'] == 'Elimina') {
		// check the token
		$badToken = true;
		if (!isset($_POST['token'])
		|| !isset($_SESSION['token'])
		|| empty($_POST['token'])
		|| $_POST['token'] !== $_SESSION['token']) {
			$results = array('','Sorry, go back and try again. There was a security issue.', '');
			$badToken = true;
		} else {
			$badToken = false;
			unset($_SESSION['token']);

			// Delete the Contact from the table
			$results = Libro::eliminaLibro((int) $_POST['id_libro']);
		}
	}
	return $results;
}

function maintLibro() {
	$results = '';
	if(isset($_POST['salva']) AND $_POST['salva'] == 'Salva') {
    // check the token
    $badToken = true;
    if (!isset($_POST['token']) 
      || !isset($_SESSION['token']) 
      || empty($_POST['token']) 
      || $_POST['token'] !== $_SESSION['token']) {
      $results = array('','Sorry, go back and try again. There was a security issue.','');
      $badToken = true;
    } else {
      $badToken = false;
      unset($_SESSION['token']);
		$item = array(  'id_libro' => (int) $_POST['id_libro'], 
				'titolo' => filter_input(INPUT_POST,'titolo',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'isbn' => filter_input(INPUT_POST,'isbn',
						FILTER_SANITIZE_STRING),
				'nome_autore' => filter_input(INPUT_POST,'nome_autore',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'descrizione' => filter_input(INPUT_POST,'descrizione',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'editore' => filter_input(INPUT_POST,'editore',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'numero_pagine' => filter_input(INPUT_POST,'numero_pagine',
						FILTER_SANITIZE_STRING),
				'collocazione' => filter_input(INPUT_POST,'collocazione',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'argomenti' => filter_input(INPUT_POST,'argomenti',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'nome_utente' => filter_input(INPUT_POST,'nome_utente',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
				'num_pag_lette' => filter_input(INPUT_POST,'num_pag_lette',
						FILTER_SANITIZE_STRING),
				'data_inizio_lettura' => filter_input(INPUT_POST,'data_inizio_lettura',
						FILTER_SANITIZE_STRING),
				'data_fine_lettura' => filter_input(INPUT_POST,'data_fine_lettura',
						FILTER_SANITIZE_STRING),
				'note' => filter_input(INPUT_POST,'note',
						FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES),
		);

		// Set up a Contact object based on the posts
		$libro = new Libro($item);
		if ($libro->getId_libro()) {
			$results = $libro->modificaLibro();
		}
    }
	}
	return $results;
}