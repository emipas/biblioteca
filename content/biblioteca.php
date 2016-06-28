<?php
$items = Libro::getLibri();

$unique_items= array();

foreach ($items as $book) {
  $aggr_cat = ['id'=>($book->getId_categoria()) , 'categoria'=>($book->getDescrizione())];

  $group_key = ($book->getId_libro().'-'.$book->getId_utente());
  //print_r($group_key.' ;');
  if(array_key_exists($group_key,$unique_items)){
    //il libro e' gia' inserito nella lista
    
    array_push($unique_items[$group_key]->categories,$aggr_cat);
  } else {
    
    $book->categories = [$aggr_cat];
    $unique_items[$group_key] = $book;
    //$unique_items[$book->getId_libro()]->categories = 'ss' 
  }
}

?>

<ul>
<?php foreach ($unique_items as $key => $item) : ?>
    <li> 
      <h2><?php echo htmlspecialchars($item->getTitolo()); ?> 
      <a href="index.php?content=bookmaint&id_libro=<?php echo $item->getId_libro(); ?>">Modifica</a>
      <a href="index.php?content=bookdelete&id_libro=<?php echo $item->getId_libro(); ?>">Elimina</a>
      </h2>
      <p>Editore: <?php echo htmlspecialchars($item->getEditore()); ?><br />
      Isbn: <?php echo htmlspecialchars($item->getIsbn()); ?><br />
      Num pag: <?php echo htmlspecialchars($item->getNumero_pagine()); ?><br />
      Collocazione: <?php echo htmlspecialchars($item->getCollocazione()); ?><br />
      Argomenti: <?php echo htmlspecialchars($item->getArgomenti()); ?><br />
      Autore: <?php echo htmlspecialchars($item->getNome_autore()); ?><br />
      Categoria: <?php
      $cat_array = array();
      foreach ($item->categories as $value) {
        array_push($cat_array, $value['categoria']);
      }
      echo implode(", ", $cat_array); ?><br />
      Nome utente: <?php echo htmlspecialchars($item->getNome_utente()); ?><br />
      Numero pagine lette: <?php echo htmlspecialchars($item->getNum_pag_lette()); ?><br />
      Data inizio lettura: <?php echo htmlspecialchars($item->getData_inizio_lettura()); ?><br />
      Data fine lettura: <?php echo htmlspecialchars($item->getData_fine_lettura()); ?><br />
      Note: <?php echo htmlspecialchars($item->getNote()); ?><br /></p>
    </li>
  <?php endforeach; ?>
</ul>