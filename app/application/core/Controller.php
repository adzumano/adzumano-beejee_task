<?php
//Главный Контроллер
namespace application\core;

use application\core\View;

abstract class Controller {

	public $route;
	public $view;
	public $acl;

	public function __construct($route) {
		//Конструктор 
		$this->route = $route;
		if (!$this->checkAcl()) {
			View::errorCode(403);
		}
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($name) {
		//Загрузка Модель пути
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)) {
			return new $path;
		}
	}

	public function checkAcl() {
		//Проверка на админ или пользователь в папке acl
		$this->acl = require 'application/acl/'.$this->route['controller'].'.php';
		if ($this->isAcl('all')) {
			return true;
		}
		elseif (isset($_SESSION['admin']) and $this->isAcl('admin')) {
			return true;
		}
		return false;
	}

	public function isAcl($key) {
		//Возвращает админа или пользователя
		return in_array($this->route['action'], $this->acl[$key]);
	}

}