<?php 
	ob_start();
	
    require_once ('./control/bd.php');
	
	$login = $_POST['login'];
	
	$row = User::findByName($login);
	if ($row){
		$_SESSION['name'] = $row->__get('$login');
			if (password_verify($_POST['password'], $row->__get('password'))){
				$_SESSION['auth'] = true;
				$_SESSION['email'] = $row->__get('email');
				$_SESSION['name'] = $row->__get('name');
				$_SESSION['id'] = $row->__get('id');
				$_SESSION['admin'] = $row->__get('admin');
				ob_end_flush();
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
				//header("Location: ./index.php?action=index");
				//exit;
			}
			else{
				ob_end_flush();
				echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Некоректний логін або пароль. Спробуйте ще раз.</div>";
				echo "<img src='./sys_img/Incorrect.jpg ?>' class='img-thumbnail col-sm-offset-3' alt='PORSCHE' width='600' height='420'>" ;
			}
	}
	else{
		ob_end_flush();
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Некоректний логін або пароль. Спробуйте ще раз.</div>";
		echo "<img src='./sys_img/Incorrect.jpg ?>' class='img-thumbnail' alt='PORSCHE' width='600' height='420'>" ;
	}
	
	/*$query = "SELECT * FROM `users` WHERE name='$login'";
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
			/*if (password_verify($_POST['password'], $row['password'])){
				$_SESSION['auth'] = true;
				$_SESSION['name'] = $row['name'];
				ob_end_flush();
				exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
				//header("Location: ./index.php?action=index");
				//exit;
			}
			else{
				ob_end_flush();
				echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Некоректний логін або пароль. Спробуйте ще раз.</div>";
				echo "<img src='./sys_img/Incorrect.jpg ?>' class='img-thumbnail col-sm-offset-3' alt='PORSCHE' width='600' height='420'>" ;
			}
	}
	else{
		ob_end_flush();
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Некоректний логін або пароль. Спробуйте ще раз.</div>";
		echo "<img src='./sys_img/Incorrect.jpg ?>' class='img-thumbnail' alt='PORSCHE' width='600' height='420'>" ;
		}*/
?>