<?php
$id = $_GET['id_categoria'];
$categoria = Libro::getCategoria($id);
?>
<h2>Modifica</h2>
<form action="index.php?content=home" method="post"
		name="maint" id="maint">
		<fieldset>
		<legend>Modifica categoria</legend>
		<ul>
		<li><label for="descrizione">Categoria</label><br />
		<input type="text" name="descrizione" id="descrizione" class="required" value="<?php echo htmlspecialchars($categoria->getDescrizione());?>"/></li>
		</ul>
		</fieldset>
		<?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="task" id="task" value="cat.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
    <a class="cancel" href="index.php?content=home">Cancella</a>
</form>