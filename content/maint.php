<?php 
  $autori = Libro::getAutori() ;
  $categorie = Libro::getCategorie();
  $utenti = Libro::getUtenti() ;
 ?>

 <ul>
 <h2>Modifica libro</h2><br/ >
 <a href="index.php?content=search">Modifica</a>
 <h2>Modifica autore</h2><br />
<?php foreach ($autori as $autore) : ?>
	<li><?php echo htmlspecialchars($autore->getNome_autore());?>
	<a href="index.php?content=autmaint&id_autore=<?php echo $autore->getId_autore(); ?>">Modifica</a>
	<a href="index.php?content=autdelete&id_autore=<?php echo $autore->getId_autore(); ?>"> Elimina</a>
	<?php endforeach; ?>

<h2>Modifica categoria</h2><br />
<?php foreach ($categorie as $categoria) : ?> 
	<li><?php echo htmlspecialchars($categoria->getDescrizione());?>
	<a href="index.php?content=catmaint&id_categoria=<?php echo $categoria->getId_categoria(); ?>">Modifica</a>
	<a href="index.php?content=catdelete&id_categoria=<?php echo $categoria->getId_categoria(); ?>"> Elimina</a>
	<?php endforeach; ?>

<h2>Modifica utente</h2><br />
<?php foreach ($utenti as $utente) : ?> 
	<li><?php echo htmlspecialchars($utente->getNome_utente());?>
	<a href="index.php?content=usermaint&id_utente=<?php echo $utente->getId_utente(); ?>">Modifica</a>
	<a href="index.php?content=userdelete&id_utente=<?php echo $utente->getId_utente(); ?>"> Elimina</a>
<?php endforeach; ?>

