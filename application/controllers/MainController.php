<?php
namespace application\controllers;


use application\core\Controller;
use application\lib\Pagination;


class MainController extends Controller {

    public function indexAction() {
        $count = $this->model->cardCount();
        $pagination = new Pagination($this->route, $count, 3);
        $res = $this->model->cardList($this->route);


        $vars = [
            'pagination' => $pagination->get(),
            'list' => $res
        ];
        $link = ['/public/styles/main.css'];

        $this->view->render('main', $vars,$link);
    }

    public function createTaskAction()
    {
        if(isset($_POST['create']) && !empty($_FILES['file']['name']))
        {
            $this->cleanTMP();

            $file = $_FILES['file']['tmp_name'];
            $newfile = __DIR__.'/public/images/'.$_FILES['file']['name'];

            $newfile = str_replace('/application/controllers', '', $newfile);
            if (!copy($file, $newfile)) {
                echo "не удалось скопировать $file...\n";
            }
            $_POST['img'] = $_FILES['file']['name'];
            $this->model->taskAdd($_POST);
            $this->view->redirect('');
        }elseif (isset($_POST['create']) && empty($_FILES['file']['name']))
        {
            $this->cleanTMP();
            $this->model->taskAdd($_POST);
            $this->view->redirect('');
        }
        $link = ['/public/styles/main.css', '/public/styles/createTask.css'];

        $this->view->render('Create Task', [], $link);
    }

    //Проверка и отчистка tmp
    public function cleanTMP()
    {
        $dir = str_replace('application/controllers', '', __DIR__);
        $dirTpm = scandir($dir.'/public/images/tmp');

        if(isset($dirTpm[2]))
        {
            unset($dirTpm[0]);
            unset($dirTpm[1]);

            $count = count($dirTpm);
            $count++;

            for($i = 2; $i <= $count; $i++)
            {
                unlink($dir.'/public/images/tmp/'.$dirTpm[$i]);
            }
        }
    }

}