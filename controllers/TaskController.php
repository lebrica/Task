<?php

namespace task\Controllers;

use task\Components\Redirect;
use  task\Models\Tasks;

class TaskController
{
    private $task;
    private $redirect;

    public function __construct(Tasks $tasks, Redirect $redirect)
    {
        $this->task = $tasks;
        $this->redirect = $redirect;
    }

    public function tasksView($id)
    {
        $tasksView = $this->task->viewTasks($id);
        $pagesCount = $this->task->pagesCountPaginate();
        $page = $id;

        return require_once (ROOT.'/view/tasks.php');
    }

    public function test($category, $id)
    {
            return $category;

    }

    public function addTask()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $task = $_POST['task'];
            if (empty($name) || empty($email) || empty($task)) {
                header("Location: ".$this->redirect->referer());
            } else {
                $addTask = $this->task->addTask($name, $email, $task);
                header("Location: ". $this->redirect->main());
            }
        }
    }
}