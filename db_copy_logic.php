<?php
function cloneDatabase($dbName, $newDbName){
    global $admin;
    $db_check = @mysql_select_db ( $dbName );
    $getTables  =   $admin->query("SHOW TABLES");   
    $tables =   array();
    while($row = mysql_fetch_row($getTables)){
        $tables[]   =   $row[0];
    }
    $createTable    =   mysql_query("CREATE DATABASE `$newDbName` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;") or die(mysql_error());
    foreach($tables as $cTable){
        $db_check   =   @mysql_select_db ( $newDbName );
        $create     =   $admin->query("CREATE TABLE $cTable LIKE ".$dbName.".".$cTable);
        if(!$create) {
            $error  =   true;
        }
        $insert     =   $admin->query("INSERT INTO $cTable SELECT * FROM ".$dbName.".".$cTable);
    }
    return !isset($error);
}


// usage
$clone  = cloneDatabase('dbname','newdbname');  // first: toCopy, second: new database

?>