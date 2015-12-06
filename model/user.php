<?php
class User extends Model
{
	// Ці поля є в таблиці `users`. Вони всі повинні бути protected,
	// а не private, інакше універсальний getter з батьківського класу Model
	// не буде їх бачити.
	protected $id;
	protected $email;
	protected $password;
	protected $name;
	protected $sex;
	protected $admin;
	
	protected static function table_name()
	{
		return "users";
	}
	
	/**
	 * Додає до бази даних нового користувача.
	 * @param string $email електронна пошта
	 * @param string $password пароль
	 * @param string $name ім'я
	 * @param boolean $sex стать. 0 означає жіночу, 1 - чоловічу
	 * @return boolean true, якщо запит успішно вдався, false в іншому випадку
	 */
	public function create($email, $password, $name, $sex)
	{
		global $link;
		return $link->query("INSERT INTO `users` (`email`,`password`,`name`,`sex`) VALUES ('$email', '$password', '$name', '$sex')");
	}
	
	/**
	 * Пошук користувача за електронною поштою.
	 * @param string $email електронна пошта
	 * @return mixed false, якщо такого користувача не знайдено, інакше об'єкт
	 * класу User
	 */
	public static function findByEmail($email)
	{
		global $link;
		$res = $link->query("SELECT * FROM `users` WHERE `email`='$email'");
		$mas = $res->fetch_assoc();
		if(count($mas)==0)
		{
			return false; // такого користувача не знайдено
		}
		// $mas містить усі поля нашого користувача з БД, наприклад, $mas["id"]
		$user = new User;
		$user->id = $mas['id'];
		$user->email = $mas['email'];
		$user->password = $mas['password'];
		$user->name = $mas['name'];
		$user->sex = $mas['sex'];
		$user->admin = $mas['admin'];
		return $user;
	}
	
	/**
	 * Чи є поточний користувач адміністратором.
	 * @return boolean
	 */
	public static function isAdmin()
	{
		// УВАГА! '401_admin' потрібно замінити на вашу назву змінної в сесії
		return isset($_SESSION['401_admin']) && $_SESSION['401_admin'];
	}
	
	/**
	 * Чи є поточний користувач гостем.
	 * @return boolean
	 */
	public static function isGuest()
	{
		// УВАГА! '401_auth' потрібно замінити на вашу назву змінної в сесії
		return !isset($_SESSION['401_auth']) || !((bool)$_SESSION['401_auth']);
	}
}
