<?php
//Контроллер Админа
namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller {

	public function __construct($route) {
		parent::__construct($route);
		$this->view->layout = 'admin';
	}

	//Действие Войти
	public function loginAction() {
		if (isset($_SESSION['admin'])){
			$this->view->redirect('app/admin/tasks');
		}
		if (!empty($_POST)){
			if (!$this->model->loginValidate($_POST)){
				$this->view->message('error',$this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('app/admin/tasks');
		}
		$this->view->render('Home Tasks');
	}

	//Действие Выйти
	public function logoutAction() {
		unset($_SESSION['admin']);
		$this->view->redirect('app/admin/login');
	}

	//Действие Задачи
	public function tasksAction() {
		$data = $this->model->getTasks();
		$vars = [
			'list' => $data,
		];
		$this->view->render('Admin Tasks', $vars);
	}
	
	//Действие Добавление Задачи
	public function addAction() {
		if (!empty($_POST)){
			if (!$this->model->taskValidate($_POST, 'add')){
				$this->view->message('error',$this->model->error);
			}
			$id = $this->model->addTask($_POST);
			if (!$id){
				$this->view->message('error','Request processing error');
			}
			// $this->view->location('app/home');
			$this->view->message('success','Added');
		}
		$this->view->render('Add Task');
	}

	//Действие Редактирование Задачи
	public function editAction() {
		if(!$this->model->isTaskExists($this->route['id'])){
			$this->view->errorCode(404);
		}
		if (!empty($_POST)){
			if (!$this->model->taskValidate($_POST, 'edit')){
				$this->view->message('error',$this->model->error);
			}
			$this->model->editTask($_POST,$this->route['id']);
			$this->view->redirect('app/admin/tasks');
		}
		$result = $this->model->getTasks();
		$vars = [
			'tasks' => $result,
			'data' => $this->model->taskData($this->route['id'])[0],
		];
		$this->view->render('Edit Task',$vars);
	}
	
	//Действие Удаление Задачи
	public function deleteAction() {	
		if(!$this->model->isTaskExists($this->route['id'])){
			$this->view->errorCode(404);
		}
		$this->model->deleteTask($this->route['id']);
		$this->view->redirect('app/admin/tasks');
	}
}