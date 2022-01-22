<?php

namespace Elias\Todo\Classes;

use Elias\Todo\DB\Config;

class TaskHandler
    {

        protected $row;
        protected $config;
        public function __construct(){
            $this->config = new Config();
        }
       public function execute_query($query){

            return mysqli_query($this->config->conn, $query);
       }

       public function get_tasks(){
           // Perform query
           $query = "SELECT * FROM tasks WHERE task_status = 'in_progress'ORDER BY task_id DESC";

           $results = $this->execute_query($query);

           $html = $this->get_tasks_html($results);
           echo $html;
       }

       public function get_done_tasks(){

           $query = "SELECT * FROM tasks WHERE task_status != 'in_progress' ORDER BY task_id DESC";
           $results = $this->execute_query($query);

           $html = $this->get_done_tasks_html($results);

           echo $html;
       }

       public function get_tasks_html($results){

           $html = '';

           if(mysqli_num_rows($results)<=0){
               $html .= '<p class="todo-item"> No Completed Tasks found </p>';
           } else {
               while($task = $results->fetch_object()){
                   $html .= '<div class="todo-item">';
                   $html .= '<p>'. $task->task_title  .'</p>';
                   $html .= '<div class="todo-item-actions">';
                   $html .= '<span class="done-task" data-id="'.$task->task_id .'"><i class="fa fa-check done-icon" style="color: green;"></i></span>';
                   $html .= '<span class="delete-task" data-id="'.$task->task_id .'"><i class="fa fa-times remove" style="color: red;"></i></span>';
                   $html .= '</div>';
                   $html .= '</div>';
               }
           }

           return $html;
       }

    public function get_done_tasks_html($results){

        $html = '';

        if(mysqli_num_rows($results)<=0){
            $html .= '<p class="done-item"> No Completed Tasks found </p>';
        } else {
            while($task = $results->fetch_object()){
                $html .= '<div class="done-item">';
                $html .= '<p>'. $task->task_title  .'</p>';
                $html .= '<div class="todo-item-actions">';
                $html .= '<span class="done-delete-task" data-id="'.$task->task_id .'"><i class="fa fa-times done-remove" style="color: red;"></i></span>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }

        return $html;
    }

       public function add_task($task_title, $task_status){

           $query = "INSERT INTO tasks (task_title, task_status) VALUES ('$task_title', '$task_status')";

           $result = $this->execute_query($query);

           echo $result;
       }

       public function update_status($id){

           $query = "UPDATE tasks SET task_status = 'DONE' WHERE task_id = '$id'";

           $result = $this->execute_query($query);

           echo $result;
       }

       public function delete_task($id){

           $query = "DELETE FROM tasks WHERE task_id = '$id'";

           $result = $this->execute_query($query);

           echo $result;
    }
}