<?php
$id = $_GET['id_utente'];
$utente = Libro::getUtente($id);
?>
<h2>Modifica</h2>
<form action="index.php?content=home" method="post"
		name="maint" id="maint">
		<fieldset>
		<legend>Modifica utente</legend>
		<ul>
		<li><label for="nome_utente">Utente</label><br />
		<input type="text" name="nome_utente" id="nome_utente" class="required" value="<?php echo htmlspecialchars($utente->getNome_utente());?>"/></li>
		</ul>
		</fieldset>
		<?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id_utente" id="id_utente" value="<?php echo $utente->getId_utente(); ?>" />
    <input type="hidden" name="task" id="task" value="user.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
    <a class="cancel" href="index.php?content=home">Cancella</a>
</form>
