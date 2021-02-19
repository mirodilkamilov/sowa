// When the window has finished loading create our google map below
google.maps.event.addDomListener(window, 'load', init);
        
function init() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 12,
		scrollwheel: true,
		disableDefaultUI: true,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(40.6700, -73.9400), // New York

        // How you would like to style the map. 
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":34},{"color":"#000000"},{"lightness":38}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":14}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":15},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":15}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":27},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":14}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":15}]}]
    };

    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var image = {
        url: 'http://netgon.net/artstyles/artem/assets/images/icon-map-pic.svg',
        scaledSize: new google.maps.Size(100, 100),
    }

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(40.6700, -73.9400),
        map: map,
        optimized: false,
        icon: image
    });	
				
	// Construct a new InfoWindow.
    var infoWindow = new google.maps.InfoWindow({
        content: 
		'<h1 class="popover-map-title">Sowa.</h1>'+
		'<div class="popover-map-caption">756 Livingston Street, Brooklyn, NY 11201</div>'
    });
				
	// Opens the InfoWindow when marker is clicked.
    marker.addListener('click', function() {
        infoWindow.open(map, marker);
    });
}
