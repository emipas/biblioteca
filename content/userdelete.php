<?php
$id = (int) $_GET['id_utente'];
  // Get the existing information for an existing item
  $item = Libro::getUtente($id);
?>

<h2>Elimina utente</h2>
<form action="index.php?content=home" method="post"
	name="delete" id="delete">
	<h2>Sei sicuro di voler eliminare l'utente 
	<?php echo htmlspecialchars($item->getNome_utente()); ?> ?</h2>
	 <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?> 
    <input type="hidden" name="id_utente" id="id_utente" value="<?php echo $item->getId_utente(); ?>" />
    <input type="hidden" name="task" id="task" value="user.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="elimina" value="Elimina" />
    <a class="cancel" href="index.php?content=home">Annulla</a>
</form>