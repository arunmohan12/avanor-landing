document.addEventListener("DOMContentLoaded", function () {
    const mapElement = document.getElementById("custom-map");
    if (!mapElement) return;

    const apiKey = mapElement.dataset.apiKey;
    const lat = parseFloat(mapElement.dataset.lat);
    const lng = parseFloat(mapElement.dataset.lng);

    window.initCustomMap = function () {
        const location = {
            lat: lat,
            lng: lng
        };

        const map = new google.maps.Map(mapElement, {
            center: location,
            zoom: 12,
            zoomControl: true
        });

        new google.maps.Marker({
            position: location,
            map: map,
            title: mapElement.dataset.title || "Location"
        });
    };

    if (apiKey) {
        const script = document.createElement("script");
        script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&callback=initCustomMap`;
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }
});