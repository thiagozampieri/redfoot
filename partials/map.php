<?php include "../../app/autoload.php"; ?>

<?php
$ic = new IndexController();
$_categories = $ic->getCategory();
?>

<script type="application/javascript">

    function map_filter(data) {
        var field1 = $('*[name='+this.field1+']').val();
        if (field1 != undefined & field1 != ''){
            var field2 = data[this.field2];
            var test = false;
            if (field2 instanceof Array) {
                field2.forEach(function (field) {
                    if (field1 instanceof Array) {
                        field1.forEach(function (temp) {
                            if (temp == field) test = true;
                        });
                    } else {
                        test = field.search(new RegExp(field1, "i")) != -1;
                    }
                });
            } else {
                test = field2.search(new RegExp(field1, "i")) != -1;
            }
            if (test) {
                return data;
            }
        } else {
            return data;
        }
        return false;
    }

    var locs = <?=json_encode($ic->getCoordinates(),JSON_UNESCAPED_UNICODE)?>;
    var locations = [];
    function filterFilter(){
        locations = locs.filter(map_filter, {field1: 'main_market', field2: 'markets'}).filter(map_filter, {field1: 'name', field2: 'label'});
        console.log(locations, locs);
        if (locations.length > 0) {
            initMap('map2');
        } else {
            alert('Infelizmente não temos startups com essa busca');
        }
    }

    $(document).ready(function(){
        filterFilter();
    })
</script>

<div class="row background-red">
    <div class="col-sm-3">
        <div class="form-control">
            <div class="row">
                <div class="col-sm-12"><input type="text" name="name" placeholder="Nome da Startup"
                                                           class="form-control col-md-12"/></div>
            </div>
            <div class="row">
                <select id="main_market" multiple size="5" name="main_market" class="form-control select2 col-md-12">
                    <option value="">Selecione uma mercado principal</option>
                    <?php foreach(StartupHelper::getCategoryOptions() as $key => $option): ?>
                        <option value="<?= $key ?>" <?=($_categories[$key] == true) ? 'selected' : ''?> ><?= $option; ?> (<?=sizeof(array_filter($ic->getCoordinates(), 'countFilter'))?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br/>

            <div class="row">
                <button class="btn btn-info col-md-12" onclick="filterFilter();" type="button">Filtrar</button>
            </div>
        </div>
    </div>
    <div id="map2" class="col-sm-9" style="height: 700px;"></div>
</div>