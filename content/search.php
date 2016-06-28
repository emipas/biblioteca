<?php ?>
<h2>Cerca Libro</h2>
<form method="post" action="index.php?content=searchresults" 
name="searchtitle" id="searchtitle">
	<fieldset>
	<legend>Ricerca per Titolo</legend>
    <input type="text" name="title" id="title"/><br  />
    <input type="submit" value="Cerca"  />
    </fieldset>
    <fieldset>
	<legend>Ricerca per Categoria</legend>
    <input type="text" name="category" id="category"/><br  />
    <input type="submit" value="Cerca"  />
    </fieldset> 
    <fieldset>
	<legend>Ricerca per Autore</legend>
    <input type="text" name="author" id="author"/><br  />
    <input type="submit" value="Cerca"  />
    </fieldset>
    <fieldset>
    <legend>Ricerca per Utente</legend>
    <input type="text" name="user" id="user"/><br  />
    <input type="submit" value="Cerca"  />
    </fieldset>
    </form>