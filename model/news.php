<?php
class News extends Model {
	//these fields are in 'news' table
	private $id;
	private $author_id;
	private $published;
	private $title;
	private $text;
	
	protected static function table_name() {
		return "news";
	}
	
	/**
	 * universal getter for all fields.
	 * @param string $field_name field name
	 * @return mixed null, if there is no such field
	 */
	public function __get($field_name)
	{	
		if(property_exists($this, $field_name))
		{	
			return $this->$field_name;
		}
		return null;
	}
	
	/**
	 * Find record by any fields or its part.
	 * @param array $fields associative array. Keys - fields in database,
	 * @return resulting array of appropriate records
	 */
	public static function find($fields = []) {
		global $link;
		$class = get_called_class();
		$table = $class::table_name();
		$user_table = User::table_name();
		$where = "";
		foreach($fields as $key => $value) {
			if (property_exists($class, $key)) {
				//die($key);
				$where = $where . "AND " . "$key" . " Like('%$value%') ";
			}
		}
		$where = trim($where, "AND");
		$where = trim($where);
		$query = "SELECT $table.*," . $user_table . ".name" . " FROM " . "`$table` INNER JOIN `$user_table` ON 
		`$table`.`author_id` = `$user_table`.`id`" . " WHERE $where";
		if ($where == ""){
			$query = trim($query);
			$query = trim($query, "WHERE");
		}
		$res = $link->query($query);
		//die($query);
		$result = [];
		while ($row = mysqli_fetch_array($res)) {
			$result[] = $row;
		}
		return $result;
	}

	/**
	 * Find mews by title.
	 * @param string $title title
	 * @return mixed false, if there is no such news, otherwise - object of News class
	 */
	public static function findByTitle($title)
	{
		global $link;
		$res = $link->query("SELECT * FROM `jas467dg_news` WHERE `title`='$title'");
		$mas = $res->fetch_assoc();
		if(count($mas)==0)
		{
			return false; // there is no such news
		}
		// $mas contains all fields of appropriate news, e.g., $mas["author_id"]
		$result = new News;
		$result->author_id = $mas['author_id'];
		$result->published = $mas['published'];
		$result->title = $mas['title'];
		$result->text = $mas['text'];
		return $result;
	}
}
?>