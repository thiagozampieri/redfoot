<?php

$servername = "localhost";
$dbname = "redfoot";
$username = "root";
$password = "";

$con = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);

TORM\Connection::setConnection($con);

TORM\Connection::setDriver("mysql");

