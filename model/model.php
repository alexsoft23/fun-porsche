<?php
/**
 * Абстрактний клас для роботи з таблицями бази даних.
 * Кожна таблиця матиме свій клас для роботи з нею,
 * який буде нащадком даного базового класу.
 */
abstract class Model
{
	/**
	 * Абстрактний метод, який повертатиме назву таблиці БД.
	 * Для кожної моделі буде своя назва таблиці.
	 */
	abstract protected static function table_name();
	
	/**
	 * Універсальний getter для всіх полів.
	 * @param string $field_name назва поля
	 * @return mixed null, якщо такого поля в класі не існує
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
	 * Створення запису.
	 * @param array $fields асоціативний масив. Ключі - це назви полів у БД,
	 * значення - нові значення
	 * @return boolean true, якщо запит успішно вдався, false в іншому випадку
	 */
	/*public function create($fields = [])
	{
		// ТУТ МОЖЕ БУТИ ВАШ КОД :)
	}*/
	
	/**
	 * Пошук запису за будь-яким полем.
	 * @param array $fields асоціативний масив. Ключі - це назви полів у БД,
	 * значення - шукані значення
	 * @return mixed масив знайдених записів або false, якщо нічого не знайдено
	 */
	/*public function find($fields = [])
	{
		// ТУТ МОЖЕ БУТИ ВАШ КОД :)
	}*/
	
	/**
	 * Редагування запису.
	 * @param array $fields асоціативний масив. Ключі - це назви полів у БД,
	 * значення - нові значення
	 * @return boolean true, якщо запис успішно відредаговано або
	 * не вказано полів для оновлення
	 */
	public function update($fields = [])
	{
		global $link;
		foreach($fields as $key=>$value)
		{
			// якщо такого поля не існує в базі даних
			if(!property_exists($this, $key))
			{
				// вилучаємо його з масиву
				unset($fields[$key]);
			}
		}
		if(empty($fields)==true)
		{
			return true;
		}
		// зараз у масиві $fields лише елементи з тими ключами, які точно є в БД
		$string = "";
		foreach($fields as $key=>$value)
		{
			$string = $string . $key . "='" . $value . "',";
		}
		$string = substr($string,0,-1);
		$sql = "UPDATE `{$this->table_name}` SET $string WHERE `id`=".$this->id;
		$res = $link->query($sql);
		return $res;
	}
	
	/**
	 * Видалення вказаного запису.
	 * @param integer $id ID запису, який потрібно видалити
	 * @return boolean true, якщо запит успішно вдався, false в іншому випадку
	 */
	public static function delete($id)
	{
		global $link;
		$class = get_called_class(); // визначення, з якого саме дочірнього класу 
		// ми викликаємо метод delete
		return $link->query("DELETE FROM `".$class::table_name()."` WHERE `id`='$id'");
	}
}
