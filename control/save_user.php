<center>
<?php
	$correct = true;
	if (!isset ($_POST['name']) || strlen($_POST['name']) == 0) {
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Поле нікнейм незаповнене</div>";
		$correct = false;
	}
	if (!isset ($_POST['email']) || strlen($_POST['email']) == 0) {
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Поле електрона пошта незаповнене</div>";
		$correct = false;
	}
	else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
		$correct = false;
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Некоректна електрона пошта</div>";
	}
	if (!isset ($_POST['password']) || strlen($_POST['password']) < 3) {
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Пароль закороткий</div>";
		$correct = false;
	}
	else if (!isset ($_POST['password_again']) || ($_POST['password']) != $_POST['password_again']) {
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Паролі неспівпадають</div>";
		$correct = false;
	}
	
	if ($correct) {

		//require_once ('./control/bd.php');
		
			$arr ['name'] = $_POST['name'];
			$arr['email'] = $_POST['email'];
			$options = [
				'cost' => 12,
				'salt' => 'qwertyuiop[]qwertyuiop[]',
			];
			$arr['password'] = password_hash($_POST['password'],  CRYPT_BLOWFISH, $options);
			$arr['sex'] = ($_POST['gender'] == "man")?true:false;
			$user->create($arr);
			if ($link->errno == 0) {
				if ($correct)
					echo "<div class='alert alert-success col-sm-10 col-sm-offset-1'><strong>Успіх!</strong> Ви успішно зареєстровані</div>";
					echo "<img src='./sys_img/success.jpg ?>' class='img-thumbnail' alt='PORSCHE' width='600' height='420'>" ;
			}
			else {
				if ($link->errno == 1062) {
					echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Юзер з даним іменем або поштою вже зареєстрований виберіть інше і повторіть спробу.</div>";
					$correct = false;
				}
				else{
					echo 'Database error'.(string)$link->errno;
					$correct = false;
					die();
				}
			}	
		
		//else{
			/*($name = $_POST['name'];
			$email = $_POST['email'];
			$options = [
				'cost' => 12,
				'salt' => 'qwertyuiop[]qwertyuiop[]',
			];
			$password = password_hash($_POST['password'],  CRYPT_BLOWFISH, $options);
			$sex = ($_POST['gender'] == "man")?true:false;
			$query = "INSERT INTO users (email, password, name, sex) VALUES('$email', '$password', '$name', '$sex')";
			$mysqli->query($query);
			if ($mysqli->errno == 0) {
				if ($correct){
						echo "<div class='alert alert-success col-sm-10 col-sm-offset-1'><strong>Успіх!</strong> Ви успішно зареєстровані</div>";
						echo "<img src='./sys_img/success.jpg ?>' class='img-thumbnail' alt='PORSCHE' width='600' height='420'>" ;
					}
			}
			else {
				if ($mysqli->errno == 1062) {
					echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Юзер з даним і менем вже зареєстрований виберіть інше і повторіть спробу.</div>";
					$correct = false;
				}
				else{
					echo 'Database error'.(string)$mysqli->errno;
					$correct = false;
					die();
				}
			}*/	
		//}
	}
	else{
		echo "<div class='alert alert-danger col-sm-10 col-sm-offset-1'><strong>Увага!</strong> Деякі поля некоректні. Повторвть спробу.</div>";
		echo "<img src='./sys_img/Incorrect.jpg ?>' class='img-thumbnail' alt='PORSCHE' width='600' height='420'>" ;
	}
	
?>
</center>


