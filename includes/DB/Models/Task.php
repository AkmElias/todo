<?php

namespace Elias\Todo\DB\Models;

require 'vendor/autoload.php';

class Task
{
    protected $dbname = 'to-do';
    protected $conn;

    public function tableStructure(){

        $query = "CREATE TABLE IF NOT EXISTS tasks(
                 task_id INT AUTO_INCREMENT PRIMARY KEY,
                 task_title VARCHAR(100) NOT NULL,
                 task_status VARCHAR(30) NOT NULL,
                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";

        return $query;
    }
}