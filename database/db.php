<?php
    //this is our data layer!

    function getConnection(){
        $user = 'mkolmang_dummy';
        $pass = 'b5!3$?(K$*Uy';
        $host = 'localhost';
        $database = 'mkolmang_it328';

        $connection = mysqli_connect($host, $user, $pass, $database);

        //if we get a false value, something went wrong
        if (!$connection){
            echo 'Error connecting to DB: '.mysqli_connect_error();
            exit;
        }
        return $connection;
    }

    function insertMessage($message){

        $connection = getConnection();

        $query = "INSERT INTO messages (body) VALUES ('$message')";

        return mysqli_query($connection, $query);
    }

    function getMessages(){
        $connection = getConnection();

        //query for message records
        $query = 'SELECT id, body FROM messages';

        $result = mysqli_query($connection, $query);

        if(!$result){
            echo 'Error retrieving records';
            exit;
        }

        $records = array();
        while($row = mysqli_fetch_assoc($result)){
            $records[] = $row;
        }

        //free up server resources
        mysqli_free_result($result);

        return $records;
    }

