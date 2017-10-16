<?php include "app/autoload.php"; ?>

<?php Template::getHeader(); ?>
<?php
    $filename = 'partials/'.$_SERVER['REQUEST_URI'].'.php';
    if(is_file($filename))  include_once($filename); else include_once('partials/index.html');

?>
<?php Template::getFooter(); ?>