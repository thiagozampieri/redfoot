<?php

/**
 * Exemplo do local.xml

<?xml version="1.0" encoding="UTF-8" ?>
<connector>
<host>localhost</host>
<username>root</username>
<password>root</password>
<dbname>redfoot</dbname>
</connector>

 */

$connector = simplexml_load_file(getcwd().'/app/config/local.xml');
$host     = $connector->host;
$dbname   = $connector->dbname;
$username = $connector->username;
$password = $connector->password;

$con = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $username, $password);

TORM\Connection::setConnection($con);

TORM\Connection::setDriver("mysql");

