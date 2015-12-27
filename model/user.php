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
	 * Пошук користувача за іменем.
	 * @param string $name електронна пошта
	 * @return mixed false, якщо такого користувача не знайдено, інакше об'єкт
	 * класу User
	 */
	public static function findByName($name)
	{
		global $link;
		$res = $link->query("SELECT * FROM `users` WHERE `name`='$name'");
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
		return isset($_SESSION['admin']) && $_SESSION['admin'];
	}
	
	/**
	 * Чи є поточний користувач гостем.
	 * @return boolean
	 */
	public static function isGuest()
	{
		// УВАГА! '401_auth' потрібно замінити на вашу назву змінної в сесії
		return !isset($_SESSION['auth']) || !((bool)$_SESSION['auth']);
	}
}