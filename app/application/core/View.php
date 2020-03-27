<?php
//Главный Вид
namespace application\core;

class View {

	public $path;
	public $route;
	public $layout = 'default';

	public function __construct($route) {
		//Конструктор
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];
	}

	public function render($title, $vars = []) {
		// Смотрит action и controller и после этого ищет файл и показывает вид
		extract($vars);
		$path = 'application/views/'.$this->path.'.php';
	
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}
	}

	public function redirect($url) {
		//Функция редирект
		header('location: /'.$url);
		exit;
	}

	public static function errorCode($code) {
		//Функция ошибки
		http_response_code($code);
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $message) {
		//Функция сообщение
		exit(json_encode(['status' => $status, 'message' => $message]));
	}

	public function location($url) {
		//Функция локация
		exit(json_encode(['url' => $url]));
	}

}	