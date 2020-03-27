<?php
//Модель Домашний
namespace application\models;

use application\core\Model;

class Home extends Model {

	public function getTasks() {
		//Получает данные из бд
		$result = $this->db->row('SELECT `id`,`name`,`email`,`text`,`task_status` FROM tasks');
		return $result;
	}

}