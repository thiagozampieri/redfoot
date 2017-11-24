/**
 * Created by thiagozampieri on 06/10/17.
 */

var initMap = function(map_id) {
     var local = {lat: -23.2927, lng: -51.1732};
     var map = new google.maps.Map(document.getElementById(map_id), {
     zoom: 6,
     center: local
     });

     var bounds = new google.maps.LatLngBounds();
     var infoWindow = new google.maps.InfoWindow();

     var markers = locations.map(function (location, i) {

     //console.log(location.coordinates);

     var icon = {
     url: 'images/pin-map.png',
     //url: location.icon, // url
     scaledSize: new google.maps.Size(50, 50), // scaled size
     origin: new google.maps.Point(0,0), // origin
     anchor: new google.maps.Point(0, 0) // anchor
     };


     var marker = new google.maps.Marker({
         position: location.coordinates,
         icon: icon,
         image: location.icon,
         //label: location.label,
         title: location.label,
         category: location.category,
         address: location.address,
     });

     //extend the bounds to include each marker's position
     bounds.extend(marker.position);

     marker.addListener('click', function() {
     var markerContent = '<div id="content" class="row">' +
         '<div class="col-sm-2"><img src="'+this.image+'" width="100"/></div>' +
         '<div class="col-sm-10">' +
         '<div class="col-sm-12"><div class="badge badge-danger">'+_categories[this.category]+'</div></div>' +
         '<div class="row col-sm-12"><label class="col-sm-12">'+this.title+'</label></div>' +
         '<div class="col-sm-12">'+this.address+'</div>' +
         '</div>'+
         '</div>';
     infoWindow.setContent(markerContent);
     infoWindow.open(map, this);
     });

     return marker;
     });

     //now fit the map to the newly inclusive bounds
     map.fitBounds(bounds);

     //(optional) restore the zoom level after the map is done scaling
     var listener = google.maps.event.addListener(map, "idle", function () {
     map.setZoom(8);
     google.maps.event.removeListener(listener);
     });

     // Add a marker clusterer to manage the markers.
     var markerCluster = new MarkerClusterer(map, markers,
     {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}


var Redfoot = function(){

    this.contact = function(){
        var name = $("input[name=name]").val();
        var email = $("input[name=email]").val();
        var phone = $("input[name=phone]").val();
        var message = $("textarea[name=message]").val();

        $("#status").html("");

        if(name != '' & email != '' & phone != '') {
            window.scrollTo(0, 0);
            jQuery.post('app/forms/mail.php', {
                name: name,
                email: email,
                phone: phone,
                message: message
            }, function (response) {
                $("#status").html(response).show();
            });
        }
        else
        {
            alert('Todos os campos são importantes');
        }
    }
}