<?php

function is_local() {
    $conn;
    if($_SERVER['HTTP_HOST'] == 'localhost' || substr($_SERVER['HTTP_HOST'],0,3) == '10.' || substr($_SERVER['HTTP_HOST'],0,7) == '192.168') {
        DEFINE("host","localhost");
        DEFINE("user","root");
        DEFINE("pass","");
        DEFINE('database', 'phptest');

        $conn = mysqli_connect(host, user, pass, database);

        // Check connection
        if($conn === false){
            die("LOCAL_ERROR: Could not connect. " . mysqli_connect_error());
        }else {
            echo 'Connected to local db';
        }
    } else {
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        //Get Heroku ClearDB connection information
        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $cleardb_server = $cleardb_url["host"];
        $cleardb_username = $cleardb_url["user"];
        $cleardb_password = $cleardb_url["pass"];
        $cleardb_db = substr($cleardb_url["path"], 1);
        $active_group = 'default';
        $query_builder = TRUE;

        // Connect to DB
        $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }else {
            echo 'Connected to production db';
        }
    }

    return $conn;

}

$conn = is_local();



?>