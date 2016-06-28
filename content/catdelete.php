<?php
$id = (int) $_GET['id_categoria'];
  // Get the existing information for an existing item
  $item = Libro::getCategoria($id);
?>

<h2>Elimina categoria</h2>
<form action="index.php?content=home" method="post"
	name="delete" id="delete">
	<h2>Sei sicuro di voler eliminare la categoria 
	<?php echo htmlspecialchars($item->getDescrizione()); ?> ?</h2>
	 <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $item->getId_categoria(); ?>" />
    <input type="hidden" name="task" id="task" value="cat.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="elimina" value="Elimina" />
    <a class="cancel" href="index.php?content=home">Annulla</a>
</form>