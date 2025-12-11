<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'web2024');
define('DB_PORT', '3307'); // OPSIONAL

class Connection
{
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new Mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        
        if($this->mysqli->connect_errno)
        {
            echo "Failed to connect to Mysqli ". $this->mysqli->connect_error;
        }
    }

    // public function __destruct()
    // {
    //     $this->mysqli->close();
    // }
}

//$conn = new Connection();