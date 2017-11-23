<?php include "app/autoload.php"; ?>

<?php Template::getHeader(); ?>
<?php
    $filename = str_replace($_SERVER['QUERY_STRING'], "", $_SERVER['REQUEST_URI']);
    $filename = str_replace("?", "", $filename);
    $filename = 'partials/'.$filename.'.php';
    if(is_file($filename))  include_once($filename); else include_once('partials/index.php');
?>
<?php Template::getFooter(); ?>