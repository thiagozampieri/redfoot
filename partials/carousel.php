<?php
/**
 * Created by PhpStorm.
 * User: thiagozampieri
 * Date: 26/03/18
 * Time: 15:48
 */

?>
<link rel="stylesheet" type="text/css" media="all" href="<?=Config::getUrlBase()?>bower_components/jcarousel/examples/data-attributes/jcarousel.data-attributes.css"/>
<script type="text/javascript" src="<?=Config::getUrlBase()?>bower_components/jcarousel/dist/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?=Config::getUrlBase()?>bower_components/jcarousel/examples/data-attributes/jcarousel.data-attributes.js"></script>

<style>
    .jcarousel-wrapper {
        border: 0px !important;
        width: 100%!important;
        height: 100%!important;
        -webkit-border-radius: 0px !important;
        -moz-border-radius: 5px !important;
        border-radius: 5px !important;
        -webkit-box-shadow: 0 !important;
        -moz-box-shadow: 0 !important;
        box-shadow: 0 !important;
        margin-bottom: 0px;
        margin-top: 0px;
    }

    .jcarousel-control-prev { left: 10px; }
    .jcarousel-control-next { right: 10px; }
</style>

<script>
    $(document).ready(function(){
        $('.jcarousel').jcarouselAutoscroll({
            autostart: true,
            interval: 4000,
        });
        $('.jcarousel ul li img').width($(document).width());
    });
</script>

<div class="wrapper">
    <div class="jcarousel-wrapper">
        <div data-jcarousel="true" data-wrap="circular" class="jcarousel">
            <ul>
                <li><img src="images/banner/DEVbanner.png" align="middle" alt=""></li>
                <li><img src="images/banner/FEELbanner.png" align="middle" alt=""></li>
                <li><img src="images/banner/MAGALDIevento.png" align="middle" alt=""></li>
                <li><img src="images/banner/MARKETING4BANNER.png" align="middle" alt=""></li>
                <li><img src="images/banner/MEETUPbanner.png" align="middle" alt=""></li>
            </ul>
        </div>
        <a data-jcarousel-control="true" data-target="-=1" href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a data-jcarousel-control="true" data-target="+=1" href="#" class="jcarousel-control-next">&rsaquo;</a>
    </div>
</div>
