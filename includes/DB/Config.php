<?php

namespace Elias\Todo\DB;

class Config implements respondToDatabaseConnection
{
    protected $servername;
    protected $username;
    protected $password;
    protected $dbname;

    public function __construct($servername, $username, $password, $dbname){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->connectDatabase();

    }


    protected function connectDatabase(){

        $conn = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if($conn->connect_error){
            $this->failedResponse($conn);
        } else {
            $this->successResponse();
        }
    }

    public function successResponse()
    {
        // TODO: Implement successResponse() method.
        echo "Connected successfully";
    }

    public function failedResponse()
    {
        // TODO: Implement failedResponse() method.
        die("Connection failed: " . mysqli_connect_error());
    }

}