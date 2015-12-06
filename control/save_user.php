<center>
<?php
	$correct = true;
	if (!isset ($_POST['name']) || strlen($_POST['name']) == 0) {
		echo "<br><br>Поле нікнейм незаповнене<br><br>";
		$correct = false;
	}
	if (!isset ($_POST['email']) || strlen($_POST['email']) == 0) {
		echo "<br><br>Поле електрона пошта незаповнене<br><br>";
		$correct = false;
	}
	else if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $_POST['email'])){
		$correct = false;
		echo "<br><br>Некоректна електрона пошта<br><br>";
	}
	if (!isset ($_POST['password']) || strlen($_POST['password']) < 3) {
		echo "<br><br>Пароль закороткий<br><br>";
		$correct = false;
	}
	else if (!isset ($_POST['password_again']) || ($_POST['password']) != $_POST['password_again']) {
		echo "<br><br>Паролі неспівпадають<br><br>";
		$correct = false;
	}
	
	if ($correct) {

	$mysqli = new mysqli("localhost", "root", "", "porshe");
	if ($mysqli->connect_errno) {
			echo "Database error <br>";
			echo "Connect failed: <br>".$mysqli->connect_error;
			$correct = false;
			
			exit();
		}
		
		//require"./control/bd.php";
		
		else{
			$name = $_POST['name'];
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
				if ($correct)
					echo "<br><br>Ви успішно зареєстровані<br><br>";
			}
			else {
				if ($mysqli->errno == 1062) {
					echo "<br><br>Юзер з даним і менем вже зареєстрований виберіть інше і повторіть спробу.<br><br>";
					$correct = false;
				}
				else{
					echo 'Database error'.(string)$mysqli->errno;
					$correct = false;
					die();
				}
			}	
		}
	}
	else
		echo "<br><br>Деякі поля некоректні. Повторвть спробу.<br><br>";
	
?>
</center>


