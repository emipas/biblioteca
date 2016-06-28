<?php 
session_start(); // starts new or resumes existing session
define('MAGIC_QUOTES_ACTIVE', get_magic_quotes_gpc());
// include required files
require_once 'includes/functions.php';

// Initialize message coming in
$message = '';
if (isset($_SESSION['message'])) {
	$message = htmlentities($_SESSION['message']);
	unset($_SESSION['message']);
}
// Process based on the task. Default to display
$task = filter_input(INPUT_POST,'task', FILTER_SANITIZE_STRING);
switch ($task) {
	
	case 'book.add' :
	// process the maint
	$results = addLibro();
	$message .= $results[1];
	// If there is redirect information
	// redirect to that page
	if ($results[0] == 'bookadd') {
		// pass on new messages
		if ($results[1]) {
			$_SESSION['message'] = $results[1];
		}
		header("Location: index.php?content=bookadd");
		exit;
	}
	break;
	
	case 'book.maint' :
    // process the maint
    $results = maintLibro();
    $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'bookmaint') {
      // pass on new messages
      if ($results[1]) {
        $_SESSION['message'] = $results[1];
      }
      header("Location: index.php?content=bookmaint&id_libro=$results[2]");
      exit;
    }
    break;

    case 'book.delete' :
    // process the maint
    $results = deleteLibro();
    $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'bookdelete') {
        // pass on new messages
        if ($results[1]) {
            $_SESSION['message'] = $results[1];
        }
        header("Location: index.php?content=bookdelete&id=$results[2]");
        exit;
    }
    break;
    
    case 'aut.add' :
	// process the login
	$results = addAutore();
	$message .= $results[1];
	// If there is redirect information
	// redirect to that page
	// pass on new messages
	if ($results[0] == 'autadd') {
		// pass on new messages
		if ($results[1]) {
			$_SESSION['message'] = $results[1];
		}
		header("Location: index.php?content=bookadd");
		exit;
	}
    break;

    case 'aut.maint' :
        $results = maintAutore();
        $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'autmaint') {
      // pass on new messages
      if ($results[1]) {
        $_SESSION['message'] = $results[1];
      }
      header("Location: index.php?content=autmaint&id_autore=$results[2]");
      exit;
    }
    break;

    case 'aut.delete' :
    // process the maint
    $results = deleteAutore();
    $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'autdelete') {
        // pass on new messages
        if ($results[1]) {
            $_SESSION['message'] = $results[1];
        }
        header("Location: index.php?content=autdelete&id_autore=$results[2]");
        exit;
    }
    break;
        	
    case 'cat.add' :
	// process the login
	$results = addCategoria();
	$message .= $results[1];
	// If there is redirect information
	// redirect to that page
	// pass on new messages
	if ($results[0] == 'catadd') {
		// pass on new messages
		if ($results[1]) {
			$_SESSION['message'] = $results[1];
		}
		header("Location: index.php?content=bookadd");
		exit;
	}
    break;

    case 'cat.maint' :
        $results = maintCategoria();
        $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'catmaint') {
      // pass on new messages
      if ($results[1]) {
        $_SESSION['message'] = $results[1];
      }
      header("Location: index.php?content=catmaint&id_categoria=$results[2]");
      exit;
    }
    break;	

    case 'cat.delete' :
    // process the maint
    $results = deleteCategoria();
    $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'catdelete') {
        // pass on new messages
        if ($results[1]) {
            $_SESSION['message'] = $results[1];
        }
        header("Location: index.php?content=catdelete&id_categoria=$results[2]");
        exit;
    }
    break;
    
    case 'user.add' :
	// process the login
	$results = addUtente();
	$message .= $results[1];
	// If there is redirect information
	// redirect to that page
	// pass on new messages
	if ($results[0] == 'useradd') {
		// pass on new messages
		if ($results[1]) {
			$_SESSION['message'] = $results[1];
		}
		header("Location: index.php?content=bookadd");
		exit;
	}
	break;
    
    case 'user.maint' :
        $results = maintUtente();
        $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'usermaint') {
      // pass on new messages
      if ($results[1]) {
        $_SESSION['message'] = $results[1];
      }
      header("Location: index.php?content=usermaint&id_utente=$results[2]");
      exit;
    }
    break;

    case 'user.delete' :
    // process the maint
    $results = deleteUtente();
    $message .= $results[1];
    // If there is redirect information
    // redirect to that page
    if ($results[0] == 'userdelete') {
        // pass on new messages
        if ($results[1]) {
            $_SESSION['message'] = $results[1];
        }
        header("Location: index.php?content=userdelete&id_utente=$results[2]");
        exit;
    }
    break;
    
}

/**
 * Auto load the class files
 * @param string $class_name
 */
function __autoload($class_name) {
  try {
    $class_file = 'includes/classes/' . strtolower($class_name) . '.php';
    if (is_file($class_file)) {
      require_once $class_file;
    } else {
      throw new Exception("Unable to load class $class_name in file $class_file.");
    }
  } catch (Exception $e) {
    echo 'Exception caught: ',  $e->getMessage(), "\n";
  }
}