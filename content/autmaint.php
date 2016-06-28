<?php
$id = $_GET['id_autore'];
$autore = Libro::getAutore($id);
?>
<h2>Modifica</h2>
<form action="index.php?content=home" method="post"
		name="maint" id="maint">
		<fieldset>
		<legend>Modifica autore</legend>
		<ul>
		<li><label for="nome_autore">Autore</label><br />
		<input type="text" name="nome_autore" id="nome_autore" class="required" value="<?php echo htmlspecialchars($autore->getNome_autore());?>"/></li>
		</ul>
		</fieldset>
		<?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="task" id="task" value="aut.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
    <a class="cancel" href="index.php?content=home">Cancella</a>
</form>
