<?php
session_start();


//print_r($_SESSION);

ini_set('display_errors', 1);
error_reporting(E_ERROR);

include "lib/torm/torm.php";
include "config/database.php";
include "controller/IndexController.php";
include "controller/RegisterStartupController.php";
include "models/Config.php";
include "models/Startup.php";
include "models/Business.php";
include "models/Investment.php";
include "models/Address.php";
include "models/Entrepreneur.php";


include "helpers/Geolocation.php";
include "helpers/Util.php";
include "helpers/Template.php";
include "helpers/Message.php";
include "helpers/Redirect.php";


$_SERVER['REQUEST_URI'] = str_replace("/redfoot/", "", $_SERVER['REQUEST_URI']);

