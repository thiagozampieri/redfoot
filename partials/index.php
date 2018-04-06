<?php include "../../app/autoload.php"; ?>

<?php
$ic = new IndexController();
$_categories = $ic->getCategories();
?>

<script type="application/javascript">
    var locations = <?=json_encode($ic->getCoordinates(), JSON_UNESCAPED_UNICODE)?>;
    $(document).ready(function(){
        initMap('map');
    })
</script>

<?php include_once "carousel.php"; ?>

<div id="map"></div>

<div id="counter" class="background-red">
    <div class="contanier text-center">
        <ul class="row">
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Profissionais</label>
                <span class="col-sm-12">participando</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->entrepreneurs?></div>
            </li>
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Startups</label>
                <span class="col-sm-12">cadastradas</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->startups?></div>
            </li>
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Empresas</label>
                <span class="col-sm-12">no ecossistema</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->companies?></div>
            </li>
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Cidades</label>
                <span class="col-sm-12">atuantes</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->cities?></div>
            </li>
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Mercados</label>
                <span class="col-sm-12">atingidos</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->markets?></div>
            </li>
            <li class="col-sm-2 col-4">
                <label class="col-sm-12">Eventos</label>
                <span class="col-sm-12">realizados</span>
                <div class="col-sm-12"><?php echo $ic->getCounters()->meetups?></div>
            </li>
        </ul>
    </div>
</div>

<div id="filter">
    <div class="container">
        <?foreach ($_categories as $category){?>
        <div class="flip-container vertical" ontouchstart="this.classList.toggle('hover');">
            <div class="flipper">
                <div class="front" style="background-color: <?=Util::getColor()?>">
                    <span class="name"><?=$category->name?></span>
                </div>
                <div class="back">
                    <div class="name"><?=$category->name?></div>
                    <hr/>
                    <div class="col-xs-12">Quantidade de Startups: </div>
                    <div class="col-xs-12"><strong><?=$category->quantity?></strong></div>
                    <div class="col-xs-12">% Representa: </div>
                    <div class="col-xs-12"><strong><?=number_format($category->percentual, 2, ',', '.')?></strong></div>
                    <div class="text-center"><a class="btn btn-success" href="map?category=<?=$category->id?>">Quero Ver</a></div>
                </div>
            </div>
        </div>
        <?}?>

<!--
        <div class="row h-100 text-center">
            <div class="row col-sm-4"><a class="col-sm-12 rfbox img-responsive healthtech" href="map?category=5,33"><div class="rf-align-baseline">healthtech</div></a></div>
            <div class="row col-sm-8">
            <a class="col-sm-6 rfbox img-responsive adtech" href="map?category=1,4,41"><div class="rf-align-baseline">adtech</div></a>
            <a class="col-sm-3 rfbox img-responsive fintech" href="map?category=18,36"><div class="rf-align-baseline">fintech</div></a>
            <a class="col-sm-3 rfbox img-responsive retailtech" href="map?category=1,2,3"><div class="rf-align-baseline">retailtech</div></a>
            <a class="col-sm-3 rfbox img-responsive agritech" href="map?category=2,26"><div class="rf-align-baseline">agritech</div></a>
            <a class="col-sm-3 rfbox img-responsive lawtech" href="map?category=11"><div class="rf-align-baseline">lawtech</div></a>
            <a class="col-sm-3 rfbox img-responsive smartcity" href="map?category=25,27,35"><div class="rf-align-baseline">smartcity</div></a>
            <a class="col-sm-3 rfbox img-responsive proptech" href="map?category=9,21"><div class="rf-align-baseline">proptech</div></a>
            </div>
        </div>
-->
    </div>

</div>

<div id="contanier" class="background-red">
    <div class="container">
        <div class="alert alert-info" id="status" style="display: none"></div>

        <h2 class="col-sm-3 text-white">Manifesto Redfoot</h2>

        <div class="row col-sm-12">
            <div class="row col-sm-6" style="padding-top: 35px;">
                <label class="col-sm-12">Somos uma comunidade</label>
                <label class="col-sm-12 text-white">horizontal, integradora, inovadora e orgânica, feita de empreendedores das cidades da região norte do Paraná.</label>
            </div>
            <div class="row col-sm-6">
                <div class="col-sm-12">
                    <p class="text-justify text-white">Nosso objetivo é potencializar a inovação da nossa região contribuindo e atuando com todos os atores da economia local e nacional, assim, gerando mais oportunidades para as empresas e impactando positivamente a sociedade onde cada startup atua.</p>
                    <p class="text-justify text-white">Se você possui um modelo de negócios inovador, repetível, escalável ou quer fortalecer o ecossistema de startups da região, queremos contar com você.</p>
                </div>
                <div class="col-sm-12">
                    <center><a class="btn btn-info" href="<?php echo Config::getUrlBase() ?>startup/register"><h5 class="text-nowrap">Clique e faça parte!</h5></a></center>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<div style="margin: 20px 0px 20px 0px;">
    <div class="container">
        <h2>Nossos últimos eventos</h2>
        <ul class="row">
            <?php foreach ($ic->getEvents() as $event) { $start_time = new DateTime($event->start_time);?>
            <div class="row list-group-item col-sm-6 inline-block">
                <div class="row col-sm-12 inline-block"><span class="col-sm-12"><label><?=$start_time->format('d')?></label>/<label><?=$start_time->format('m')?></label>/<label><?=$start_time->format('Y')?></label> <small><?=$start_time->format('H:i')?>h</small></span></div>
                <div class="row col-sm-12">
                    <label class="col-sm-12" style="font-size: 15px; font-weight: bold;"><a href="https://www.facebook.com/events/<?=$event->id?>" target="_blank" style="color: #000"><?=$event->name?></a></label>
                    <span class="col-sm-12"><?=$event->place->name?></span>
                    <small class="col-sm-12"><?=Util::textLimiterCaracter(strip_tags(mountLink($event->description)),200, '...')?></small>
                </div>
            </div>
            <?php }?>
        </ul>
    </div>
</div>


<div id="contact" class="background-red">
    <div class="container">

        <h2 class="col-sm-7 text-white">Entre em contato como quiser:</h2>

        <div class="container">
            <div class="col-sm-12">
                <a href="mailto:contato@redfootbrasil.org"><p class="text-white"><i class="fa fa-envelope"></i> contato@redfootbrasil.org</p></a>
            </div>
            <div class="col-sm-2 inline-block socials-form">

                <a href="https://www.facebook.com/RedfootStartups/" title="Facebook" target="_blank"><label class="text-white"><i class="fa fa-facebook-square"></i></label></a>
                <a href="https://www.facebook.com/groups/redfoot/"  title="Facebook Group" target="_blank"><label class="text-white"><i class="fa fa-facebook"></i></label></a>
                <a href="https://www.instagram.com/redfootbrazil/" title="Instagram" target="_blank"><label class="text-white"><i class="fa fa-instagram"></i></label></a>
                <a href="https://chat.whatsapp.com/9X20O6HohvdDOpfFsq8qHZ" title="Whatsapp" target="_blank"><label class="text-white"><i class="fa fa-whatsapp"></i></label></a>

            </div>
        </div>

        <div id="fh5co-contact" data-section="contact">
            <div class="container">
                <form method="post" id="form" action="app/forms/mail.php" role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nome" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-control phone" placeholder="Telefone" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                    <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                              placeholder="Mensagem" required></textarea>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="button" class=" hvr-push btn btn-primary btn-outline" onclick="_rf.contact();"><span>Enviar</span></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>
