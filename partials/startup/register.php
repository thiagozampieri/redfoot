<?php
/**
 * Created by PhpStorm.
 * User: thiagozampieri
 * Date: 16/10/17
 * Time: 15:15
 */
?>

<?php include "../../app/autoload.php"; ?>
<?php
if(isset($_POST['action']) && $_POST['action'] != ''){
    new RegisterStartupController();
}

?>

<div id="contanier">
    <?php  Message::showMessage(); ?>

    <form class="col-sm-12 register-form center-align" enctype="multipart/form-data" method="POST" action="">
        <input type="hidden" name="action" value="save" />

        <div class="col-sm-4 inline-block "><input type="text" name="name" placeholder="Nome da Startup" class="form-control"/></div>
        <div class="col-sm-3 inline-block "><input type="file" name="file" placeholder="Logo da Startup" class="form-control"/></div>



        <div class="col-sm-4 inline-block "><button class="btn btn-info" type="submit">Enviar</button></div>
    </form>

</div>
