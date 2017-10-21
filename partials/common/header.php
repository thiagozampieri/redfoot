<!doctype html>
<html>
<head>
    <title>Redfoot Community</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="language" content="pt-BR" />
    <meta name="author" content="Redfoot Community" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="rating" content="General" />
    <meta name="robots" content="index,follow" />
    <meta name="MSSmartTagsPreventParsing" content="TRUE" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="all" href="<?=Config::getUrlBase()?>bower_components/bootstrap/dist/css/bootstrap.min.css"/>

    <link rel="stylesheet" type="text/css" media="all" href="<?=Config::getUrlBase()?>css/redfoot.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?=Config::getUrlBase()?>bower_components/popper.js/docs/css/font-awesome.min.css"/>
    <script type="text/javascript" src="<?=Config::getUrlBase()?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=Config::getUrlBase()?>bower_components/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?=Config::getUrlBase()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=Config::getUrlBase()?>bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>

    <script type="text/javascript" src="<?=Config::getUrlBase()?>js/redfoot.js"></script>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=<?=Config::getGoogleMapsKey()?>&callback=initMap">
    </script>

    <script type="text/javascript">
        _rf = new Redfoot();
        $(document).ready(function(){
            $("input[type=tel]").mask("(99) 9999-9999?9");
            $(".date").mask("99/99/9999");
            $(".cep").mask("99999-999");
            $(".cnpj").mask("99.999.999/9999-99");
            $(".cpf").mask("999.999.999-99");
        });
    </script>
</head>
<body>
    <div id="header" class="page-header"><a href="<?=Config::getUrlBase()?>" class="col"><h1><span>Redfoot Community</span></h1></a></div>