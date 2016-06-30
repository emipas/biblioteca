<h2><a href="index.php?content=autadd">Aggiungi nuovo autore</a><br />
<a href="index.php?content=catadd">Aggiungi nuova categoria</a><br />
<a href="index.php?content=useradd">Aggiungi nuovo utente</a><br /></h2>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="JS/newAuthor.js"></script>

<h1>Aggiungi nuovo libro</h1>
<?php $autori = Libro::getAutori() ;
$categorie = Libro::getCategorie(); 
$utenti = Libro::getUtenti() ;?>

<form action="index.php?content=home" method="post"
	name="maint" id="maint">
	<fieldset>
	<ul>
		<li><label for="titolo" class="required">Titolo</label><br />
			<input type="text" name="titolo" id="titolo" class="required"/></li>
		<li><label for="isbn">Isbn</label><br />
			<input type="number" min="1" step="1" name="isbn" id="isbn"/></li>
		<li><label for="nome_autore">Autore</label><br />
			<select id="selectAutore" name="nome_autore" > 
   			<?php foreach($autori as $autore){ ?>
                    <option><?php echo $autore->getNome_autore();} ?></option> 
        	</select>
        <li><label for="descrizione">Categoria</label><br />
   			<?php foreach($categorie as $categoria){ ?>
                    <input type="checkbox" name="descrizione[]" value=
                    "<?php echo htmlspecialchars($categoria->getDescrizione()); ?>">
                    <?php echo $categoria->getDescrizione();} ?></input> 
        	</li>
		<li><label for="editore">Editore</label><br />
			<input type="text" name="editore" id="editore"/></li>
		<li><label for="numero_pagine">Numero pagine</label><br />
			<input type="number" min="1" step="1" name="numero_pagine" id="numero_pagine"/></li>
		<li><label for="collocazione">Collocazione</label><br />
			<input type="text" name="collocazione" id="collocazione"/></li>
		<li><label for="argomenti">Argomenti</label><br />
			<input type="text" name="argomenti" id="argomenti"/></li>
		<li><label for="nome_utente">Utente</label><br />
			<select name="nome_utente" > 
   			<?php foreach($utenti as $utente){ ?>
                    <option><?php echo $utente->getNome_utente();} ?></option> 
        	</select></li>
		<li><label for="num_pag_lette">Pagine lette</label><br />
			<input type="number" min="1" step="1" name="num_pag_lette" id="num_pag_lette"/></li>
		<li><label for="data_inizio_lettura">Data inizio lettura</label><br />
			<input type="date" name="data_inizio_lettura" id="data_inizio_lettura"/></li>
		<li><label for="data_fine_lettura">Data fine lettura</label><br />
			<input type="date" name="data_fine_lettura" id="data_fine_lettura"/></li>
		<li><label for="note">Note</label><br />
			<input type="text" name="note" id="note"/></li>
	</ul></fieldset>
		<?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="task" id="task" value="book.add" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
    <a class="cancel" href="index.php?content=home">Cancella</a>
</form>
