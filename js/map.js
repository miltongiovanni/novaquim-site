// Initialize and add the map 4.587357491415826, -74.12100161405188
function initMap() {
    var center_map = { lat: 4.587357491415826, lng: -74.12100161405188 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: center_map,
    });
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                map.setCenter(pos);
                            },
        );
    }
    for (let i = 0; i < distribuidores.length; i++) {
        const latLng = new google.maps.LatLng(distribuidores[i].latitud, distribuidores[i].longitud);

        new google.maps.Marker({
            position: latLng,
            map: map,
            title: distribuidores[i].distribuidor,
            label: distribuidores[i].id,
        });
    }
}

window.initMap = initMap;