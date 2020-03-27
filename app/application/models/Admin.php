<?php
//Модель Админа
namespace application\models;

use application\core\Model;

class Admin extends Model {

	public $error;

	public function getTasks() {
		//Получает данные из бд
		$result = $this->db->row('SELECT `id`,`name`,`email`,`text`,`task_status` FROM tasks');
		return $result;
	}

	public function loginValidate($post){
		//Проверка логина
		$config = require 'application/config/admin.php';
		
		if ($config['login'] != $post['login'] or $config['password'] != $post['password']){
			$this->error = 'Login or Password error';
			return false;
		}
		return true;
	}

	public function taskValidate($post, $type){
		//Проверка задачи

		$nameLen = iconv_strlen($post['name']);
		$email = $post['email'];
		$textLen = iconv_strlen($post['text']);
		$status = $post['task_status'];

		if ($nameLen < 3 or $nameLen > 100){
			$this->error = 'The name must contain from 3 to 100 characters.';
			return false;
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->error = 'Invalid format';
			return false;
		}
		elseif ($textLen < 3 or $textLen > 5000){
			$this->error = 'The text must contain from 3 to 100 characters.';
			return false;
		}
		elseif($status == NULL){
			$this->error = 'The status must contain from 3 to 100 characters.';
			return false;
		}
		return true;

	}

	public function addTask($post){
		//Добавляет данные который написал пользователь или админ
		$params = [
			'id' => '',
			'name' => $post['name'],
			'email' => $post['email'],
			'text' => $post['text'],
			'task_status' => $post['task_status'],
		];
		$this->db->query('INSERT INTO tasks VALUES(:id,:name,:email,:text,:task_status)',$params);
		return $this->db->lastInsertId();
	}

	public function editTask($post,$id){
		//Редактирует данные который написал пользователь или админ
		$params = [
			'id' => $id,
			'name' => $post['name'],
			'email' => $post['email'],
			'text' => $post['text'],
			'task_status' => $post['task_status']
		];
		return $this->db->row('UPDATE tasks SET name = :name,email = :email,text = :text,task_status = :task_status WHERE id = :id',$params);
	}

	public function deleteTask($id){
		//Удаляет данные который выбрал пользователь или админ
		$params = [
			'id' => $id,
		];
		$this->db->query('DELETE FROM tasks WHERE id = :id',$params);
	}

	public function isTaskExists($id){
		//Проверка если это задача
		$params = [
			'id' => $id,
		];
		return $this->db->column('SELECT `id` FROM tasks WHERE id =:id',$params);
	}

	public function taskData($id){
		//Получение id задч
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM tasks WHERE id = :id',$params);
	}
}