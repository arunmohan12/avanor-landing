document.addEventListener("DOMContentLoaded", function () {
    const mapElement = document.getElementById("custom-map");
    if (!mapElement) return;

    // Read attributes from HTML
    const apiKey = mapElement.dataset.apiKey;
    const lat = parseFloat(mapElement.dataset.lat || "25.008860");
    const lng = parseFloat(mapElement.dataset.lng || "54.987102");

    // Silver-Grey map styling
    const mapStyle = [
        { "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }] },
        { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] },
        { "elementType": "labels.text.fill", "stylers": [{ "color": "#616161" }] },
        { "elementType": "road", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }] },
        { "featureType": "road.highway", "elementType": "geometry", "stylers": [{ "color": "#dadada" }] },
        { "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#d4d4d4" }] }
    ];

    window.initCustomMap = function () {
        const location = { lat, lng };
        const map = new google.maps.Map(mapElement, {
            center: location,
            zoom: 11,
            styles: mapStyle,
            disableDefaultUI: true,
            zoomControl: true,
        });

        new google.maps.Marker({
            position: location,
            map: map,
            title: mapElement.dataset.title || "Location"
        });
    };

    // Dynamically load Google Maps SDK
    if (apiKey) {
        const script = document.createElement("script");
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initCustomMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }
});
