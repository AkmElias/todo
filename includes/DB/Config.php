<?php

namespace Elias\Todo\DB;

use Elias\Todo\Classes;
use Elias\Todo\respondToDatabaseConnection;

class Config
{
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'to-do';
    public $conn;

    public function __construct(){

        $this->connectDatabase();

    }


    protected function connectDatabase(){

        $this->conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

//        $query = "SELECT * FROM tasks";
//        $results = mysqli_query($this->conn, $query);
//
//        var_dump($results);

        if($this->conn->connect_error){
            $this->failedResponseToDatabaseConnection();
        } else {
            $this->successResponseToDatabaseConnection();
        }
    }

    public function successResponseToDatabaseConnection()
    {
        // TODO: Implement successResponse() method.

//        $taskHandler = new Classes\ItemHandler($this->conn);
        $query = "CREATE TABLE IF NOT EXISTS tasks(
                 task_id INT AUTO_INCREMENT PRIMARY KEY,
                 task_title VARCHAR(100) NOT NULL,
                 task_status VARCHAR(30) NOT NULL,
                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
        $data = mysqli_query($this->conn, $query);

       if(!$data){
           echo "Table is not created";
       }
    }

    public function failedResponseToDatabaseConnection()
    {
        // TODO: Implement failedResponse() method.
        die("Connection failed: " . mysqli_connect_error());
    }

}