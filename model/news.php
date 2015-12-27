<?php
class News extends Model {
	// Ці поля є в таблиці 'news'. Вони всі повинні бути protected,
	// а не private, інакше універсальний getter з батьківського класу Model
	// не буде їх бачити.
	protected $id;
	protected $author_id;
	protected $published;
	protected $title;
	protected $text;
	
	protected static function table_name() {
		return "news";
	}
	
	/**
	 * Пошук запису за будь-яким полем з обмеженнями на сторінку та сортуванням по даті.
	 * @param array $fields асоціативний масив. Ключі - це назви полів у БД,
	 * значення - шукані значення.
	 * @return mixed масив знайдених записів.
	 */
	public static function find($fields = []) {
		global $link;
		global $shift, $count;
		$class = get_called_class();
		$table = $class::table_name();
		$user_table = User::table_name();
		$where = "";
		foreach($fields as $key => $value) {
			if (property_exists($class, $key)) {
				$where = $where . "AND " . "$key" . " Like('%$value%') ";
			}
		}
		$where = trim($where, "AND");
		$where = trim($where);
		$query = "SELECT $table.*," . $user_table . ".name" . " FROM " . "`$table` INNER JOIN `$user_table` ON 
		`$table`.`author_id` = `$user_table`.`id`" . " WHERE $where" . " ORDER BY `$table`.`date` DESC" . " LIMIT $shift, $count" ;
		if ($where == ""){
			$query = trim($query);
			$query = trim($query, "WHERE");
		}
		$res = $link->query($query);
		$result = [];
		while ($row = mysqli_fetch_array($res)) {
			$result[] = $row;
		}
		return $result;
	}

	/**
	 * Пошук кількості опублікованих новин.
	 * @return повертає кількість опублікованих новин.
	 */
	public static function countOfPublished() {
		global $link;
		$query = "SELECT COUNT(*) FROM `news` WHERE `published` = 1";
		$res = $link->query($query);
		$result = mysqli_fetch_array($res);
		return $result['COUNT(*)'];
	}
	
	/**
	 * Пошук новин за заголовком.
	 * @param string $title тема новин.
	 * @return mixed false якщо такого заголовку нема, обєкт класу News якщо 
	 * такий заголовок знайдено.
	 */
	public static function findByTitle($title)
	{
		global $link;
		$res = $link->query("SELECT * FROM `news` WHERE `title`='$title'");
		$mas = $res->fetch_assoc();
		if(count($mas)==0)
		{
			return false; // немає таких новин.
		}
		// $mas містить всі поля із таблиці news що задовільнило пошук.
		$result = new News;
		$result->author_id = $mas['author_id'];
		$result->published = $mas['published'];
		$result->title = $mas['title'];
		$result->text = $mas['text'];
		return $result;
	}
}
?>