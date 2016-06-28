<?php
class Libro {

	protected $id_libro;

	protected $isbn;

	protected $titolo;

	protected $editore;

	protected $numero_pagine;

	protected $collocazione;

	protected $argomenti;

	protected $id_serie;

	protected $id_autore;
	
	protected $nome_autore;	

	protected $id_categoria;
	
	protected $descrizione;
	
	protected $num_pag_lette;	
	
	protected $data_inizio_lettura;	
	
	protected $data_fine_lettura;    
	
	protected $note;	
	
	protected $id_utente;

	protected $nome_utente;	
	
	public function getNome_autore() {
		return $this->nome_autore;
	}
	
	public function getId_autore() {
		return $this->id_autore;
	}
	
	public function getId_categoria() {
		return $this->id_categoria;
	}

	public function getId_utente() {
		return $this->id_utente;
	}
	
	public function getDescrizione() {
		return $this->descrizione;
	}
	
	public function getNum_pag_lette() {
		return $this->num_pag_lette;
	}
	
	public function getData_inizio_lettura() {
		return $this->data_inizio_lettura;
	}
	
	public function getData_fine_lettura() {
		return $this->data_fine_lettura;
	}
	
	public function getNote() {
		return $this->note;
	}
	
	public function getNome_utente() {
		return $this->nome_utente;
	}

	
	
	public function __construct($input = false) {
		if (is_array($input)) {
			foreach ($input as $key => $val) {
				$this->$key = $val;
			}
		}
	}

	public function getId_libro() {
		return $this->id_libro;
	}

	public function getIsbn() {
		return $this->isbn;
	}

	public function getTitolo() {
		return $this->titolo;
	}

	public function getEditore() {
		return $this->editore;
	}

	public function getNumero_pagine() {
		return $this->numero_pagine;
	}

	public function getCollocazione() {
		return $this->collocazione;
	}

	public function getArgomenti() {
		return $this->argomenti;
	}

	public function getId_serie() {
		return $this->id_serie;
	}
	
	protected function _verifyInputAutore() {
		$error = false;
		if (empty($this->nome_autore)) {
			$error = true;
		}
		if ($error) {
			return false;
		} else {
			return true;
		}
	}
	
	protected function _verifyInputCategoria() {
		$error = false;
		if (empty($this->descrizione)) {
			$error = true;
		}
		if ($error) {
			return false;
		} else {
			return true;
		}
	}
	
	protected function _verifyInputUtente() {
		$error = false;
		if (empty($this->nome_utente)) {
			$error = true;
		}
		if ($error) {
			return false;
		} else {
			return true;
		}
	}
	
	protected function _verifyInputLibro() {
		$error = false;
		if (empty($this->titolo)) {
			$error = true;
		}
		if (empty($this->isbn)) {
			$error = true;
		}
		if (($this->num_pag_lette)>($this->numero_pagine)) {
			$error = true;
		}
		if ($error) {
			return false;
		} else {
			return true;
		}
	}
	
	public static function getLibri() {
		// clear the results
		$items = '';
		// Get the connection
		$connection = Database::getConnection();
		// Set up query
		$query = 'SELECT * FROM libro JOIN autore_libro ON libro.id_libro=
				autore_libro.id_libro JOIN autore ON
				autore_libro.id_autore=autore.id_autore 
				JOIN categoria_libro ON libro.id_libro =
				categoria_libro.id_libro JOIN categoria ON
				categoria_libro.id_categoria = categoria.id_categoria
		        JOIN libro_letto ON libro.id_libro = libro_letto.id_libro
                JOIN utente ON utente.id_utente = libro_letto.id_utente';
		// Run the query
		$result_obj = '';
		$result_obj = $connection->query($query);
		// Loop through the results,
		// passing them to a new version of this class,
		// and making a regular array of the objects
		try {
			while($result = $result_obj->fetch_object('Libro')) {
					$items[]= $result;
			}
			// pass back the results
			return($items);
		}
	
		catch(Exception $e) {
			return false;
		}
	}
	
	public static function getLibro($id_libro) {
		$connection = Database::getConnection();
		$query = 'SELECT * FROM libro JOIN autore_libro ON libro.id_libro=
				autore_libro.id_libro JOIN autore ON
				autore_libro.id_autore=autore.id_autore 
				JOIN categoria_libro ON libro.id_libro =
				categoria_libro.id_libro JOIN categoria ON
				categoria_libro.id_categoria = categoria.id_categoria
		        JOIN libro_letto ON libro.id_libro = libro_letto.id_libro
                JOIN utente ON utente.id_utente = libro_letto.id_utente
				WHERE libro.id_libro = "'. (int) $id_libro .'"';
		$result_obj ='';
		try {
			$result_obj = $connection->query($query);
			if (!$result_obj) {
				throw new Exception($connection->error);
			} else {
				$item = $result_obj->fetch_object('Libro');
				if (!$item) {
					throw new Exception($connection->error);
				} else {
					return ($item);
				}
			}
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function getAutori() {
		$autori= '';
		$connection = Database::getConnection();
		$query = 'SELECT id_autore,nome_autore FROM autore';
		$result_obj='';
		$result_obj=$connection->query($query);
		try {
			while($result = $result_obj->fetch_object('Libro')) {
				$autori[]= $result;
			}
			// pass back the results
			return($autori);
		}
	
		catch(Exception $e) {
			return false; 
		}
	}
	
	public static function getAutore($id_autore) {
		$connection = Database::getConnection();
		$query = 'SELECT id_autore,nome_autore FROM autore
				WHERE autore.id_autore = "'. (int) $id_autore .'"';
		$result_obj ='';
		try {
			$result_obj = $connection->query($query);
			if (!$result_obj) {
				throw new Exception($connection->error);
			} else {
				$item = $result_obj->fetch_object('Libro');
				if (!$item) {
					throw new Exception($connection->error);
				} else {
					return ($item);
				}
			}
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function getCategorie() {
		$categorie= '';
		$connection = Database::getConnection();
		$query = 'SELECT id_categoria,descrizione FROM categoria';
		$result_obj='';
		$result_obj=$connection->query($query);
		try {
			while($result = $result_obj->fetch_object('Libro')) {
				$categorie[]= $result;
			}
			// pass back the results
			return($categorie);
		}
		
		catch(Exception $e) {
			return false;
		}
		}
	
	public static function getCategoria($id_categoria) {
		$connection = Database::getConnection();
		$query = 'SELECT id_categoria,descrizione FROM categoria
				WHERE categoria.id_categoria = "'. (int) $id_categoria .'"';
		$result_obj ='';
		try {
			$result_obj = $connection->query($query);
			if (!$result_obj) {
				throw new Exception($connection->error);
			} else {
				$item = $result_obj->fetch_object('Libro');
				if (!$item) {
					throw new Exception($connection->error);
				} else {
					return ($item);
				}
			}
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}
	
	public static function getUtenti() {
		$utenti= '';
		$connection = Database::getConnection();
		$query = 'SELECT id_utente,nome_utente FROM utente';
		$result_obj='';
		$result_obj=$connection->query($query);
		try {
			while($result = $result_obj->fetch_object('Libro')) {
				$utenti[]= $result;
			}
			// pass back the results
			return($utenti);
		}
		
		catch(Exception $e) {
			return false;
		}
		}
	
	public static function getUtente($id_utente) {
		$connection = Database::getConnection();
		$query = 'SELECT id_utente,nome_utente FROM utente
				WHERE utente.id_utente = "'. (int) $id_utente .'"';
		$result_obj ='';
		try {
			$result_obj = $connection->query($query);
			if (!$result_obj) {
				throw new Exception($connection->error);
			} else {
				$item = $result_obj->fetch_object('Libro');
				if (!$item) {
					throw new Exception($connection->error);
				} else {
					return ($item);
				}
			}
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}

	
	public static function getSearchlibro() {
		if(!empty($_POST['author'])) {
    	$post = $_POST['author'];
    	$where ="autore.nome_autore";
		} elseif (!empty($_POST['title'])) {
   		$post = $_POST['title'];
   		$where ="libro.titolo";
		} elseif (!empty($_POST['category'])) {
   		$post = $_POST['category'];
   		$where ="categoria.descrizione";
		} elseif (!empty($_POST['user'])) {
   		$post = $_POST['user'];
   		$where ="utente.nome_utente";
		}
		$items = '';
		// Get the connection
		$connection = Database::getConnection();
		// Set up query
		$query = 'SELECT * FROM libro JOIN autore_libro ON libro.id_libro=
				autore_libro.id_libro JOIN autore ON
				autore_libro.id_autore=autore.id_autore
				JOIN categoria_libro ON libro.id_libro =
				categoria_libro.id_libro JOIN categoria ON
				categoria_libro.id_categoria = categoria.id_categoria
                JOIN libro_letto ON libro.id_libro = libro_letto.id_libro
                JOIN utente ON utente.id_utente = libro_letto.id_utente
				WHERE ' . $where . ' LIKE "%' . $post . '%" ';
		// Run the query
		$result_obj = '';
		$result_obj = $connection->query($query);
		// Loop through the results,
		// passing them to a new version of this class,
		// and making a regular array of the objects
		try {
			while($result = $result_obj->fetch_object('Libro')) {
				$items[]= $result;
			}
			// pass back the results
			return($items);
		}
	
		catch(Exception $e) {
			return false;
		}
	}
	
	public function aggiungiAutore(){
		if ($this->_verifyInputAutore()) {
		$connection = Database::getConnection();
		$query = "INSERT INTO autore(nome_autore)
				VALUES ('" . Database::prep($this->nome_autore) . "')";
		
		if($connection->query($query)) {
			$return = array('', 'Autore aggiunto correttamente. ', '');
			return $return;
		} else {
			$return = array('autadd', 'Autore non aggiunto. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('autadd', 'Autore non aggiunto. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}
	
	public function aggiungiCategoria(){
		if ($this->_verifyInputCategoria()) {
		$connection = Database::getConnection();
		$query = "INSERT INTO categoria(descrizione)
				VALUES ('" . Database::prep($this->descrizione) . "')";
		
		if($connection->query($query)) {
			$return = array('', 'Categoria aggiunta correttamente. ', '');
			return $return;
		} else {
			$return = array('catadd', 'Categoria non aggiunto. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('catadd', 'Categoria non aggiunto. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}
	
	public function aggiungiUtente(){
		if ($this->_verifyInputUtente()) {
		$connection = Database::getConnection();
		$query = "INSERT INTO utente(nome_utente)
				VALUES ('" . Database::prep($this->nome_utente) . "')";
		
		if($connection->query($query)) {
			$return = array('', 'Utente aggiunto correttamente. ', '');
			return $return;
		} else {
			$return = array('useradd', 'Utente non aggiunto. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('useradd', 'Utente non aggiunto. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}
	
	public function aggiungiLibro() {
		if ($this->_verifyInputLibro()) {
		$connection = Database::getConnection();
		$autore = $_POST['nome_autore'];
		$categoria =$_POST['descrizione'];
		$utente = $_POST['nome_utente'];
		$query ="BEGIN;
				INSERT INTO libro (titolo,isbn,editore,numero_pagine,collocazione,argomenti)
					VALUES ('" . Database::prep($this->titolo) ."',
							'" . Database::prep($this->isbn) ."',
							'" . Database::prep($this->editore) ."',
							'" . Database::prep($this->numero_pagine) ."',
							'" . Database::prep($this->collocazione) ."',
							'" . Database::prep($this->argomenti) ."');
				INSERT INTO autore_libro(id_autore,id_libro)
					VALUES ((SELECT id_autore FROM autore
					WHERE nome_autore = '$autore'),
					(SELECT MAX(id_libro) FROM libro));
				INSERT INTO categoria_libro(id_categoria,id_libro)
					VALUES ((SELECT id_categoria FROM categoria
					WHERE descrizione = '$categoria'),
					(SELECT MAX(id_libro)FROM libro));
				INSERT INTO libro_letto(id_libro,id_utente,
						num_pag_lette,data_inizio_lettura,data_fine_lettura,note)
					VALUES ((SELECT MAX(id_libro) FROM libro),
						(SELECT id_utente FROM utente 
						WHERE nome_utente = '$utente'),
						'" . Database::prep($this->num_pag_lette) ."',
						'" . Database::prep($this->data_inizio_lettura) ."',
						'" . Database::prep($this->data_fine_lettura) ."',
						'" . Database::prep($this->note) ."');
				COMMIT;";
	if($connection->multi_query($query)) {
			$return = array('', 'Libro aggiunto correttamente. ', '');
			return $return;
		 } else {
			$return = array('bookmaint', 'Libro non aggiunto. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('bookmaint', 'Libro non aggiunto. Informazioni mancanti. ', '0');
			return $return;
		} 
		
	}
	
	public static function eliminaLibro($id) {
		$connection = Database::getConnection();
		$query = 'BEGIN;
				DELETE FROM libro WHERE id_libro ="' .(int) $id.'";
				DELETE FROM autore_libro WHERE id_libro ="' .(int) $id.'";
				DELETE FROM categoria_libro WHERE id_libro ="' .(int) $id.'";
				DELETE FROM libro_letto WHERE id_libro ="' .(int) $id.'";
				COMMIT;
		';
		if($result = $connection->multi_query($query)) 
		{
			$return = array('', 'Libro eliminato.', '');
        return $return;
      } else {
        $return = array('bookdelete', 'Impossibile eliminare il libro.', (int) $id);
        return $return; 
      }
		
	}
	
	public static function eliminaAutore($id) {
		$connection = Database::getConnection();
		$query = 'SELECT * FROM libro JOIN autore_libro ON libro.id_libro=
				autore_libro.id_libro JOIN autore ON
				autore_libro.id_autore=autore.id_autore 
				WHERE autore.id_autore = "' .(int) $id.'"';
		if ($result = $connection->query($query)) {
			$res_num = mysqli_num_rows($result);
			if ($res_num != 0) {
				$return = array ('autdelete', "Impossibile eliminare. Ci sono libri associati all' autore.", (int) $id);
				return $return;
			};
			$query = 'DELETE FROM autore WHERE id_autore ="' .(int) $id.'"';
			if($result = $connection->query($query)) {
				$return = array('', 'Autore eliminato.', '');
	        	return $return;
	      	} else {
	        	$return = array('autdelete', 'Impossibile eliminare autore.', (int) $id);
	        	return $return; 
	      	}
		}
		$return = array('autdelete', 'Impossibile eliminare autore.', (int) $id);
		return $return; 	
	}
		
	public static function eliminaCategoria($id) {
		$connection = Database::getConnection();
		$query = 'SELECT * FROM libro JOIN categoria_libro ON libro.id_libro =
				categoria_libro.id_libro JOIN categoria ON
				categoria_libro.id_categoria = categoria.id_categoria
				WHERE categoria.id_categoria = "' .(int) $id. '"';
	    if ($result = $connection->query($query)) {
			$res_num = mysqli_num_rows($result);
			if ($res_num != 0) {
				$return = array ('catdelete', "Impossibile eliminare. Ci sono libri associati alla categoria.", (int) $id);
				return $return;
			};
		$query = 'DELETE FROM categoria WHERE id_categoria ="' .(int) $id.'"';
			if($result = $connection->query($query)) {
				$return = array('', 'Categoria eliminata.', '');
        		return $return;
        	} else {
        		$return = array('catdelete', 'Impossibile eliminare la categoria.', (int) $id);
        		return $return; 
        	}
   		}
   		$return = array('catdelete', 'Impossibile eliminare la categoria.', (int) $id);
        return $return; 
		
	}
	
	public static function eliminaUtente($id) {
		$connection = Database::getConnection();
        $query = 'SELECT * FROM libro JOIN libro_letto ON libro.id_libro = libro_letto.id_libro
                JOIN utente ON utente.id_utente = libro_letto.id_utente
				WHERE utente.id_utente = "' .(int) $id. '"';
		if ($result = $connection->query($query)) {
			$res_num = mysqli_num_rows($result);
			if ($res_num != 0) {
				$return = array ('userdelete', "Impossibile eliminare. Ci sono libri associati all' utente.", (int) $id);
				return $return;
			};		
		$query = 'DELETE FROM utente WHERE id_utente ="' .(int) $id.'"';
			if($result = $connection->query($query)) {
				$return = array('', 'Utente eliminato.', '');
	       		return $return;
	        } else {
	        	$return = array('userdelete', 'Impossibile eliminare utente.', (int) $id);
	        	return $return; 
	        }
	    }
	    $return = array('userdelete', 'Impossibile eliminare utente.', (int) $id);
    	return $return;
		
	}

	public function modificaLibro() {
		if ($this->_verifyInputLibro()) {
		$connection = Database::getConnection();
		$autore = $_POST['nome_autore'];
		$categoria = $_POST['descrizione'];
		$utente = $_POST['nome_utente'];
		$data_inizio = date_create(Database::prep($this->data_inizio_lettura));
		$data_inizio_format = date_format($data_inizio, 'Y-m-d');
		$data_fine = date_create(Database::prep($this->data_fine_lettura));
		$data_fine_format = date_format($data_inizio, 'Y-m-d');


		$query = "BEGIN;
				UPDATE libro 
				SET titolo='" . Database::prep($this->titolo) ."',
					isbn='" . Database::prep($this->isbn) ."',
					editore='" . Database::prep($this->editore) ."',
					numero_pagine='" . Database::prep($this->numero_pagine) ."',
					collocazione='" . Database::prep($this->collocazione) ."',
					argomenti='" . Database::prep($this->argomenti) ."'
				WHERE id_libro='" . Database::prep($this->id_libro) ."';
				UPDATE autore_libro
					SET id_autore=(SELECT id_autore FROM autore WHERE nome_autore = '$autore')
					WHERE autore_libro.id_libro='" . Database::prep($this->id_libro) ."';
				UPDATE categoria_libro
					SET id_categoria=(SELECT id_categoria FROM categoria WHERE descrizione = '$categoria')
					WHERE categoria_libro.id_libro='" . Database::prep($this->id_libro) ."';
				UPDATE libro_letto 
				SET id_utente=(SELECT id_utente FROM utente WHERE nome_utente = '$utente'),
					num_pag_lette='" . Database::prep($this->num_pag_lette) ."',
					data_inizio_lettura='$data_inizio_format',
					data_fine_lettura='$data_fine_format',   
					note='" . Database::prep($this->note) ."'
				 	WHERE libro_letto.id_libro='" . Database::prep($this->id_libro) ."';
				COMMIT;
				";
		//$return = array('', $query, '');
		//return $return;	
		if($connection->multi_query($query)) {
					$return = array('', 'Libro modificato correttamente. ', '');
			return $return;
		} else {
			$return = array('bookmaint', 'Libro non modificato. Impossibile creare il record. ', (int) $this->id_libro);
			return $return; 
		} 
		} else {
			$return = array('bookmaint', 'Libro non modificato. Informazioni mancanti. ', (int) $this->id_libro);
			return $return;
		}    
		
	}    

	
	public function modificaAutore(){
		if ($this->_verifyInputAutore()) {
		$connection = Database::getConnection();
		$query = "UPDATE autore SET nome_autore ='" . Database::prep($this->nome_autore) . "' WHERE autore.id_autore = '" . Database::prep($this->id_autore) ."'";
		
		if($connection->query($query)) {
			$return = array('', 'Autore modificato correttamente. ', '');
			return $return;
		} else {
			$return = array('autmaint', 'Autore non modificato. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('autmaint', 'Autore non modificato. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}

	public function modificaCategoria(){
		if ($this->_verifyInputCategoria()) {
		$connection = Database::getConnection();
		$query = "UPDATE categoria SET descrizione ='" . Database::prep($this->descrizione) . "' WHERE categoria.id_categoria = '" . Database::prep($this->id_categoria) ."'";
		
		if($connection->query($query)) {
			$return = array('', 'Categoria modificata correttamente. ', '');
			return $return;
		} else {
			$return = array('catmaint', 'Categoria non modificata. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('catmaint', 'Categoria non modificata. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}
	
	public function modificaUtente(){
		if ($this->_verifyInputUtente()) {
		$connection = Database::getConnection();
		$query = "UPDATE utente SET nome_utente ='" . Database::prep($this->nome_utente) . "' WHERE utente.id_utente = '" . Database::prep($this->id_utente) ."'";
		
		if($connection->query($query)) {
			$return = array('', 'Utente modificato correttamente. ', '');
			return $return;
		} else {
			$return = array('usermaint', 'Utente non modificato. Impossibile creare il record. ', '');
			return $return;
		}
		} else {
			$return = array('usermaint', 'Utente non modificato. Informazioni mancanti. ', '0');
			return $return;
		}
		
	}
	
	
}