<?php 
require_once 'includes/init.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Biblioteca</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div>
		<h2><a href="index.php?content=home">Home</a><br />
		<a href="index.php?content=search">Cerca</a><br />
		<a href="index.php?content=biblioteca">Biblioteca</a><br />
		<a href="index.php?content=bookadd">Aggiungi libro</a><br />
		<a href="index.php?content=maint">Modifica</a><br /></h2>
	</div>

  <div>
    <?php echo $message; ?> 
  </div>

  <div>
    <?php loadContent('content', 'home'); ?>
  </div><!-- end content -->
  
</body>
</html>