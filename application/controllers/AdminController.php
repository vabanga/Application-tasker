<?php


namespace application\controllers;

use application\core\Controller;
use application\lib\Pagination;
use application\models\Main;

class AdminController extends Controller
{
    public function loginAction()
    {
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/tasks');
        }
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['admin'] = true;
            $this->view->location('admin/tasks');
        }
        $this->view->render('login', [], ['/public/styles/signin.css'], ['/public/scripts/form.js']);
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }

    public function editAction()
    {
        if (isset($_SESSION['admin'])) {
            if (!$this->model->isTasksExists($this->route['id'])) {
                $this->view->errorCode(404);
            }
            if (!empty($_POST))
            {
                if($_POST['status'] == 'Done' || $_POST['status'] == 'Performed')
                {
                    $this->model->taskEdit($_POST, $this->route['id']);
                    $this->view->redirect('admin/tasks');
                }
            }

            $vars = [
                'data' => $this->model->taskData($this->route['id'])[0],
            ];
            $this->view->render('edit', $vars, ['/public/styles/signin.css', '/public/styles/createTask.css'], []);
        }
        else
        {
            $this->view->redirect('admin/login/');
        }
    }

    public function tasksAction()
    {
        if (isset($_SESSION['admin'])) {
            $mainModel = new Main;
            $pagination = new Pagination($this->route, $mainModel->cardCount());
            $vars = [
                'pagination' => $pagination->get(),
                'list' => $mainModel->cardList($this->route),
            ];
            $this->view->render('login', $vars, ['/public/styles/dashboard.css'], []);
        }
        else
        {
            $this->view->redirect('admin/login/');
        }
    }
}