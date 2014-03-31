google.maps.event.addDomListener(window, 'load', init);
var map;
function init() {
var mapOptions = {
    center: new google.maps.LatLng(40.697299,-73.809815),
    zoom: 2,
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.DEFAULT,
    },
    disableDoubleClickZoom: true,
    mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
    },
    scaleControl: false,
    scrollwheel: false,
    streetViewControl: false,
    draggable : true,
    overviewMapControl: true,
    overviewMapControlOptions: {
        opened: false,
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP,


}

var mapElement = document.getElementById('map');
var map = new google.maps.Map(mapElement, mapOptions);
var locations = [
    
];

for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        icon: '',
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
    });
}
}