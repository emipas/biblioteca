<?php
$id = (int) $_GET['id_libro'];
  // Get the existing information for an existing item
  $item = Libro::getLibro($id);
  $autori = Libro::getAutori() ;
  $categorie = Libro::getCategorie();
  $utenti = Libro::getUtenti() ;
  $autore_selezionato = $item->getNome_autore();
  $categoria_selezionata = $item->getDescrizione();
  $utente_selezionato = $item->getNome_utente();
  ?>

<h2>Modifica Libro</h2>
<form action="index.php?content=home" method="post"
	name="maint" id="maint">
	<ul>
		<li><label for="titolo" class="required">Titolo</label><br />
			<input type="text" name="titolo" id="titolo" class="required" 
       		value="<?php echo htmlspecialchars($item->getTitolo()); ?>"/></li>
		<li><label for="isbn">Isbn</label><br />
			<input type="number" min="1" step="1" name="isbn" id="isbn" 
			value="<?php echo htmlspecialchars($item->getIsbn()); ?>"/></li>
		<li><label for="nome_autore" class="required">Autore</label><br />
			<select name="nome_autore" > 
			<option class="selected"><?php echo $autore_selezionato; ?></option>
   			<?php foreach($autori as $autore){ 
   				if ($autore_selezionato != $autore->getNome_autore()) { ?>
                    <option><?php echo $autore->getNome_autore();}} ?></option> 
        	</select></li>
		<li><label for="descrizione">Categoria</label><br />
			<select name="descrizione" > 
			<option class="selected"><?php echo $categoria_selezionata; ?></option>
   			<?php foreach($categorie as $categoria){ 
                    if ($categoria_selezionata != $categoria->getDescrizione()) { ?>
                    <option><?php echo $categoria->getDescrizione();}} ?></option> 
        	</select></li>
		<li><label for="editore">Editore</label><br />
			<input type="text" name="editore" id="editore" 
			value="<?php echo htmlspecialchars($item->getEditore()); ?>"/></li>
		<li><label for="numero_pagine">Numero pagine</label><br />
			<input type="number" min="1" step="1" name="numero_pagine" id="numero_pagine" 
			value="<?php echo htmlspecialchars($item->getNumero_pagine()); ?>"/></li>
		<li><label for="collocazione">Collocazione</label><br />
			<input type="text" name="collocazione" id="collocazione" 
			value="<?php echo htmlspecialchars($item->getCollocazione()); ?>"/></li>
		<li><label for="argomenti">Argomenti</label><br />
			<input type="text" name="argomenti" id="argomenti" 
			value="<?php echo htmlspecialchars($item->getArgomenti()); ?>"/></li>
		<li><label for="nome_utente">Utente</label><br />
			<select name="nome_utente" >
			<option class="selected"><?php echo $utente_selezionato; ?></option> 
   			<?php foreach($utenti as $utente){ 
                    if ($utente_selezionato != $utente->getNome_utente()) { ?>
                    <option><?php echo $utente->getNome_utente();}} ?></option> 
        	</select></li>
		<li><label for="num_pag_lette">Pagine lette</label><br />
			<input type="number" min="1" step="1" name="num_pag_lette" id="num_pag_lette" 
			value="<?php echo htmlspecialchars($item->getNum_pag_lette()); ?>"/></li>
		<li><label for="data_inizio_lettura">Data inizio lettura</label><br />
			<input type="date" name="data_inizio_lettura" id="data_inizio_lettura" 
			value="<?php echo htmlspecialchars($item->getData_inizio_lettura()); ?>"/></li>
		<li><label for="data_fine_lettura">Data fine lettura</label><br />
			<input type="date" name="data_fine_lettura" id="data_fine_lettura" 
			value="<?php echo htmlspecialchars($item->getData_fine_lettura()); ?>"/></li>
		<li><label for="note">Note</label><br />
			<input type="text" name="note" id="note" 
			value="<?php echo htmlspecialchars($item->getNote()); ?>"/></li>
	</ul>
	    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id_libro" id="id_libro" value="<?php echo $item->getId_libro(); ?>" />
    <input type="hidden" name="task" id="task" value="book.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
    <a class="cancel" href="index.php?content=home">Cancella</a>
</form>
