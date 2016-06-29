-Nr libri suddivisi per categoria :

SELECT categoria.descrizione,COUNT(libro.titolo) AS numero_libri FROM libro JOIN categoria_libroON libro.id_libro = categoria_libro.id_libro JOIN categoria ON categoria_libro.id_categoria =categoria.id_categoria GROUP BY categoria.descrizione

-Elenco autori ordine alfabeti con num libri scritti da ciascuno :

SELECT autore.nome_autore,COUNT(libro.titolo) FROM libro JOIN autore_libro ON libro.id_libro =autore_libro.id_libro JOIN autore ON autore_libro.id_autore = autore.id_autore GROUP BY autore.nome_autore ORDER BY autore.nome_autore ASC

-Elenco libri di una categoria che appartiene ad un determinato autore :

SELECT libro.titolo FROM libro JOIN autore_libro ON libro.id_libro= autore_libro.id_libro JOIN autore ON autore_libro.id_autore=autore.id_autore JOIN categoria_libro ON libro.id_libro =categoria_libro.id_libro JOIN categoria ON categoria_libro.id_categoria = categoria.id_categoriaWHERE categoria.descrizione LIKE ‘%letteratura%’ AND autore.nome_autore LIKE ‘%verga%’

-Categoria di libri più letti dagli utenti :

SELECT categoria.descrizione,COUNT(utente.nome_utente) AS numero_utenti FROM libro JOINcategoria_libro ON libro.id_libro = categoria_libro.id_libro JOIN categoria ONcategoria_libro.id_categoria = categoria.id_categoria JOIN libro_letto ON libro.id_libro =libro_letto.id_libro JOIN utente ON utente.id_utente = libro_letto.id_utente GROUP BYcategoria.descrizione ORDER BY `numero_utenti` DESC LIMIT 1

-Autore più letto dagli utenti :



