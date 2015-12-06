<?php
    session_start(); 
	if(isset($_SESSION['auth']) && $_SESSION['auth'] == true)
				require_once "./layouts/header_auth.php";
			else
				require_once "./layouts/header.php";
				
    if (isset($_GET['action']) &&  ($_GET['action'] == 'login' || $_GET['action'] == 'save_user') || $_GET['action'] == 'logout' )
		require_once('./control/'.$_GET['action'].'.php');
    else {
    if (isset($_GET['action']) && file_exists('./view/'.$_GET['action'].'.php'))
				require_once('./view/'.$_GET['action'].'.php');
			else
				require_once("./view/start.php");
			
			/*if(isset($_SESSION['auth']) && $_SESSION['auth'] == true)
				require_once("./view/logout.php");
			else
				require_once("./view/login.php");*/
    }
    require_once"./layouts/footer.php";
?>