<?php

namespace task\Controllers;

use task\Components\Redirect;
use task\Models\Admin;

class AdminController
{
    private $admin;
    private $redirect;

    public function __construct(Admin $admin, Redirect $redirect)
    {
       $this->redirect = $redirect;
       $this->admin = $admin;
    }

    public function checkTask($id)
    {
        $this->admin->checkTask($id);
        header("Location: ".$this->redirect->referer());
    }

    public function changeTask($id)
    {
        $taskId = $id;
        if (isset($_POST['submit'])) {
            $task = $_POST['task'];
            if (!empty($task)) {
                $this->admin->changeTask($id, $task);
                header("Location: ".$this->redirect->main());
            } else {
                header("Location: ".$this->redirect->referer());
            }
        }
        return require_once ('view/admin/change-task.php');
    }
}