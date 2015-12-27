<?php
	include("./model/model.php");
	include("./model/user.php");
	include("./model/news.php");
	include('./control/bd.php');
	
	$user = new User();
	$news = new News();
	
    session_start(); 
	if(isset($_SESSION['auth']) && $_SESSION['auth'] == true)
				if(isset($_SESSION['admin']) && $_SESSION['admin'])
					require_once "./layouts/header_admin.php";
				else
					require_once "./layouts/header_auth.php";
			else
				require_once "./layouts/header.php";
				
    if (isset($_GET['action']) &&  ($_GET['action'] == 'login' || $_GET['action'] == 'save_user' || $_GET['action'] == 'logout' || $_GET['action'] == 'news_add') )
		require_once('./control/'.$_GET['action'].'.php');
    else {
    if (isset($_GET['action']) && file_exists('./view/'.$_GET['action'].'.php'))
				require_once('./view/'.$_GET['action'].'.php');
			else
				require_once("./view/start.php");
    }
    require_once"./layouts/footer.php";
?>