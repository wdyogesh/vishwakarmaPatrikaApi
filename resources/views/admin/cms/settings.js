function initMap() {
    "use strict";
    create_map(parseFloat($('#lat').val()), parseFloat($('#lang').val()));
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        $('#lat').val(place.geometry.location.lat());
        $('#lang').val(place.geometry.location.lng());
        create_map(place.geometry.location.lat(), place.geometry.location.lng());
    });
}
function create_map(lat, lang) {
    var center = new google.maps.LatLng(lat, lang);
    var map = new google.maps.Map(document.getElementById('mymap'), {
        zoom: 16,
        center: center,
    });
    var myMarker = new google.maps.Marker({
        position: center,
        draggable: true,
        map: map
    });
    google.maps.event.addListener(myMarker, 'dragend', function () {
        map.setCenter(this.getPosition());
        $('#lat').val(this.getPosition().lat());
        $('#lang').val(this.getPosition().lng());
    });
    google.maps.event.addListener(map, 'dragend', function () {
        myMarker.setPosition(this.getCenter());
        $('#lat').val(this.getCenter().lat());
        $('#lang').val(this.getCenter().lng());
    });
}
$(document).ready(function () {
    setTimeout(function () {
        $('#address').prop('disabled', false);
    }, 1000);
});