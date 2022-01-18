<?php

require 'vendor\autoload.php';

use Elias\Todo\DB;

class index{

    protected $list = [];
    protected $dbConnect;

    public function __construct($list){
        $this->list = $list;

        $this->dbConnect = new DB\Config('localhost', 'root', '', 'to-do');

    }


    public function getList(){
        return $this->list;
    }

    public function removeItem($item){
        $this->list = array_diff($this->list, array($item));
    }
}

$toDo = new index(["Fist one", "Second One", "Third Todo...."]);

$list = $toDo->getList();


?>

<html>
<head>
    <!--    <link rel="stylesheet" type="text/css" href="--><?php //echo CSS_PATH; ?><!--main.css">-->
    <!--    <script type="text/javascript" src="--><?php //echo JS_PATH; ?><!--main.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <p class="title">TODO'S</p>
    <div class="todo-lists">
        <p class="add-item">Add Item</p>
        <?php foreach($list as $item): ?>
            <div class="todo-item">
                <p><?php echo $item ?> </p>
                <div class="todo-item-actions">
                    <span><i class="fa fa-check done" style="color: green;"></i></span>
                    <span class="delete-item"><i class="fa fa-times remove" style="color: red;"></i></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }
    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 100vh;
        background: #789;
    }

    .title{
        padding: 5px;
        color: darkorange;
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 10px;
    }

    .todo-lists{
        position: relative;
        width: 450px;
        display: flex;
        background: #bbb;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px;
        border-radius: 5px;
    }

    .add-item{
        position: absolute;
        top: -35px;
        left: 83%;
        color: green;
        background-color: #FFF;
        padding: 5px;
        border-radius: 3px;
        text-align: center;
        cursor: pointer;
    }

    .add-item:hover{
        background-color: yellowgreen;
        transition: 0.2s all linear;
        color: #FFF;
    }

    .todo-item{
        width: 98%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        position: relative;
        background: #FFF;
        color: yellowgreen;
        padding: 8px;
        border-radius: 3px;
        margin: 2.5px 0 2.5px 0;
        cursor: pointer;
    }

    .todo-item:hover{
        transform: scale3d(1.03,1,1);
        /*transform: translateZ(100px);*/
        transition: 0.3s all ease-in;
        color: #FFF;
        background-color: yellowgreen;
        z-index: 999;
    }
    .todo-item span{
        text-align: start;
        font-weight: bold;
        margin: 3px;
    }

    .done:hover{
        transform: scale3d(1.5, 1.05,1);
        transition: 0.3s all linear;
    }

    .remove:hover{
        transform: scale3d(1.5, 1.05,1);
        transition: 0.3s all linear;
    }

</style>

