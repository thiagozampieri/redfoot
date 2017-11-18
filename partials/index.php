<?php include "../../app/autoload.php"; ?>

<?php
$ic = new IndexController();
?>

<script type="application/javascript">

    function initMap() {
        var local = {lat: -23.2927, lng: -51.1732};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: local
        });

        var bounds = new google.maps.LatLngBounds();
        var infoWindow = new google.maps.InfoWindow();

        var markers = locations.map(function (location, i) {

            console.log(location.coordinates);
            var marker = new google.maps.Marker({
                position: location.coordinates,
                //icon: location.icon,
                image: location.icon,
                label: location.label,
                title: location.label
            });

            //extend the bounds to include each marker's position
            bounds.extend(marker.position);

            marker.addListener('click', function() {
                var markerContent = '<div id="content"><div class="col-sm-2"><img src="'+this.image+'" width="100"/></div><label class="col-sm-10">'+this.title+'</label><div class="col-sm-12"></div></div>';
                infoWindow.setContent(markerContent);
                infoWindow.open(map, this);
            });

            return marker;
        });

        //now fit the map to the newly inclusive bounds
        map.fitBounds(bounds);

        //(optional) restore the zoom level after the map is done scaling
        var listener = google.maps.event.addListener(map, "idle", function () {
            map.setZoom(13);
            google.maps.event.removeListener(listener);
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }
    var locations = <?=json_encode($ic->getCoordinates())?>;


</script>
<div id="map"></div>

<div id="counter">
    <ul class="row col-sm-12">
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
            <label class="col-sm-12">Meetups</label>
            <span class="col-sm-12">organizados</span>
            <div class="col-sm-12"><?php echo $ic->getCounters()->meetups?></div>
        </li>
    </ul>
</div>

<div id="contanier">
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
