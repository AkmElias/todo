<?php

namespace Elias\Todo\Actions;
require '../../vendor/autoload.php';

use Elias\Todo\Classes\TaskHandler;

if(isset($_POST['action'])){

   $action = new Action();

    if($_POST['action'] == "load")
    {

         $action->model->get_tasks();
    }
    else if($_POST['action'] == "load_done_tasks")
    {

        $action->model->get_done_tasks();
    }
    else if($_POST['action'] === "insert")
    {

         $task_title = $_POST['task_title'];
         $task_status = $_POST['task_status'];

         $action->model->add_task($task_title, $task_status);
    }
    else if($_POST['action'] == "update")
    {

         $action->model->update_status($_POST['id']);
    }
    else if($_POST['action'] == "delete")
    {

         $action->model->delete_task($_POST['id']);
    }
}


class Action{

    public $model;

    public function __construct()
    {
        $this->model = new TaskHandler();
    }
}