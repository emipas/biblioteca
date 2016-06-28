<?php
$id = (int) $_GET['id_autore'];
  // Get the existing information for an existing item
  $item = Libro::getAutore($id);
?>

<h2>Elimina autore</h2>
<form action="index.php?content=home" method="post"
    name="delete" id="delete">
    <h2>Sei sicuro di voler eliminare l'autore 
    <?php echo htmlspecialchars($item->getNome_autore()); ?> ?</h2>
     <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id_autore" id="id_autore" value="<?php echo $item->getId_autore(); ?>" />
    <input type="hidden" name="task" id="task" value="aut.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="elimina" value="Elimina" />
    <a class="cancel" href="index.php?content=home">Annulla</a>
</form>