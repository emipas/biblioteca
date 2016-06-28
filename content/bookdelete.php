<?php
$id = (int) $_GET['id_libro'];
  // Get the existing information for an existing item
  $item = Libro::getLibro($id);
?>

<h2>Elimina libro</h2>
<form action="index.php?content=home" method="post"
	name="delete" id="delete">
	<h2>Sei sicuro di voler eliminare il libro 
	<?php echo htmlspecialchars($item->getTitolo($id)); ?> ?</h2>
	 <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id_libro" id="id_libro" value="<?php echo $item->getId_libro(); ?>" />
    <input type="hidden" name="task" id="task" value="book.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="elimina" value="Elimina" />
    <a class="cancel" href="index.php?content=home">Annulla</a>
</form>