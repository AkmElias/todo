<?php

require 'vendor\autoload.php';

use Elias\Todo\DB\Config;
use Elias\Todo\Classes\TaskHandler;

class IndexMe {

    protected $model;

    public function __construct()
    {
        $this->model = new TaskHandler();
    }

    public function get_todos() {
        return $this->model->get_tasks();
    }

    public function get_done_todos(){
        return $this->model->get_done_tasks();
    }

}

$obj = new IndexMe();

$list = ["Fist one", "Second One", "Third Todo...."];
$config = new Config();

?>

<html>
<head>
    <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo CSS_PATH; ?><!--main.css">-->
    <!--    <script type="text/javascript" src="--><?php //echo JS_PATH; ?><!--main.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css"/>
    <script src="assets/js/custom.js"></script>

</head>
<body>
<div class="container">
    <p class="title">TODO'S</p>
    <form id="add-form">
        <div class="input-group">
            <input id="task-input" class="task-input" type="text" name="task" placeholder="Enter a task..."/>
            <button id="add-button" class="add-button">Add Task</button>
        </div>
    </form>

    <div id="todo-lists" class="todo-lists">
        <?php $obj->get_todos(); ?>
    </div>
    <div class="done-section" style="margin-top: 10px;">
        <p class="done-title">DONE</p>
        <div id="done-lists" class="todo-lists">
            <?php $obj->get_done_todos() ?>

        </div>
    </div
</div>
</body>
</html>


