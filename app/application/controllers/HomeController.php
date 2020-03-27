<?php
//Контроллер Домашний
namespace application\controllers;

use application\core\Controller;

class HomeController extends Controller {
	//Действие Задачи
	public function indexAction() {
		$data = $this->model->getTasks();
		$vars = [
			'list' => $data,
		];
		$this->view->render('Home Tasks', $vars);
	}

}