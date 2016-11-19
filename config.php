<?php

$host ="localhost";
$username = "root";
$password = "" ;
$database = "Todolist" ;

$mysqli = mysqli_connect($host,
                        $username,
                        $password,
                        $database) or die ("not connect") ;