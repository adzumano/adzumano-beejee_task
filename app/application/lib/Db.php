<?php

namespace application\lib;

use PDO;

class Db {

	protected $db;
	
	public function __construct() {
		//Подключение к базе данных
		$config = require 'application/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['db_name'].'', $config['username'], $config['password']);
	}

	public function query($sql, $params = []) {
		//Запрос данных
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				if (is_int($val)) {
					$type = PDO::PARAM_INT;
				} else {
					$type = PDO::PARAM_STR;
				}
				$stmt->bindValue(':'.$key, $val, $type);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		//Вывод данных как row
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		//Вывод данных как column
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}

	public function lastInsertId() {
		//Последний id 
		return $this->db->lastInsertId();
	}

}