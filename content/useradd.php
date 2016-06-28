<?php $item= new Libro;?>
<h2>Aggiungi</h2>
<form action="index.php?content=home" method="post"
		name="add" id="add">
		<fieldset>
		<legend>Aggiungi nuovo utente</legend>
		<ul>
		<li><label for="nome_utente">Nome utente</label><br />
		<input type="text" name="nome_utente" id="nome_utente"/></li>
		</ul>
		</fieldset>
		<?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="task" id="task" value="user.add" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="salva" value="Salva" />
	<a class="cancel" href="index.php?content=home">Cancella</a>
</form>
