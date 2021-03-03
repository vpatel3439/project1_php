<?php

//database access information

define('DB_USER', 'root');
define('DB_PASSWORD','');
define('DB_HOST', 'localhost');
define('DB_NAME', 'books');

// connection

$mysqli = new MySQLi(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME);

if($mysqli->connect_error){
  echo $mysqli->connect_error;
  unset($mysqli);
}
else {
//echo "Connection has been made successfully";
$mysqli->set_charset('utf8');
}

 ?>


