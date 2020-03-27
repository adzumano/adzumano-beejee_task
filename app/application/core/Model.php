<?php
//Главная Модель
namespace application\core;

use application\lib\Db;

abstract class Model {

	public $db;
	
	public function __construct() {
		//Вызов Базы Данных
		$this->db = new Db;
	}

}