<?php 
	ob_start();
    require_once "./control/bd.php";
	$login = $_POST['login'];
	
	$mysqli = mysqli_connect("localhost", "root", "", "porshe");
	if (mysqli_connect_errno()) {
			echo "Database error <br>";
			echo "Connect failed: <br>".$mysqli->connect_error;
			
			exit();
		}
	
	$query = "SELECT * FROM `users` WHERE name='$login'";
	$result = mysqli_query($mysqli,$query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$_SESSION['name'] = $row['name'];
	if (isset($row['name'])) {
		/*$options = [
					'cost' => 12,
					'salt' => 'qwertyuiop[]qwertyuiop[]',
					];
			$password = password_hash($_POST['password'],  CRYPT_BLOWFISH, $options); //pw wer 
			if($password == $row['password']) */
			if (password_verify($_POST['password'], $row['password'])){
				$_SESSION['auth'] = true;
				$_SESSION['name'] = $row['name'];
				ob_end_flush();
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
				//header("Location: ./index.php?action=index");
				//exit;
			}
			else{
				ob_end_flush();
				echo "Некоректний логін або пароль. Спробуйте ще раз.";
				include"./view/Erlogin.php";
			}
	}
	else{
		ob_end_flush();
		echo "Некоректний логін або пароль. Спробуйте ще раз.";
		include"./view/Erlogin.php";
		}
?>